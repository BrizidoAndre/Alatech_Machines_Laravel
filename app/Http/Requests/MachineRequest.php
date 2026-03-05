<?php

namespace App\Http\Requests;

use App\Models\GraphicCard;
use App\Models\Motherboard;
use App\Models\PowerSupply;
use App\Models\Processor;
use App\Models\RamMemory;
use App\Models\StorageDevice;
use Exception;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MachineRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        $exception = $validator->getException();
        throw new HttpResponseException(response()->json($validator->errors(), 400));
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'description' => ['required'],
            'imageUrl' => ['required'],
            'motherboardId' => ['required', 'exists:motherboard,id'],
            'processorId' => ['required', 'exists:processor,id'],
            'memoryId' => ['required', 'exists:ramMemory,id'],
            'memoryAmount' => ['required', 'integer'],
            'graphicCardId' => ['required', 'exists:graphicCard,id'],
            'graphicCardAmount' => ['required', 'integer'],
            'powerSupplyId' => ['required', 'exists:powerSupply,id'],
            'storageDevices' => ['required', 'array', 'min:0'],
            'storageDevices.*.storageDeviceId' => ['required', 'exists:storageDevice,id'],
            'storageDevices.*.amount' => ['required', 'integer', 'min:0']
        ];
    }

    public function after()
    {
        return [
            function ($validator) {
                $board = Motherboard::find($this->input('motherboardId', 0));
                $processor = Processor::find($this->input('processorId', 0));
                $graphic = GraphicCard::find($this->input('graphicCardId', 0));
                $ram = RamMemory::find($this->input('memoryId', 0));
                $amountRam = $this->input('memoryAmount', '');
                $amountGraphic = $this->input('graphicCardAmount', '');
                $power = PowerSupply::find($this->input('powerSupplyId', 0));
                $storages = $this->input('storageDevices');
                if ($board && $processor) {
                    if ($board->socketTypeId !== $processor->socketTypeId) {
                        $validator->errors()->add('socketType', 'The board does not support the socket type');
                    }
                    if ($processor->tdp > $board->maxTdp) {
                        $validator->errors()->add('tdp', 'The board does not meet the minimum required for the tdp');
                    }
                }
                if ($board && $ram) {
                    if ($board->ramMemoryTypeId !== $ram->ramMemoryTypeId) {
                        $validator->errors()->add('ramType', 'The board does not support the memory type');
                    }
                }
                if ($board && $amountRam) {
                    if ($board->ramMemorySlots < $amountRam || $amountRam < 1) {
                        $validator->errors()->add('amountRam', 'The board does not support the amount of RAM');
                    }
                }
                if ($amountGraphic && $board) {
                    if ($board->pciSlots < $amountGraphic || $amountGraphic < 1) {
                        $validator->errors()->add('amountGraphic', 'The board does not support the amount of Graphic cards');
                    }
                }
                if ($amountGraphic && $graphic) {
                    if (!$graphic->supportMultiGpu && $amountGraphic > 1) {
                        $validator->errors()->add('graphicSupport', 'The graphic cards does not support multi gpu');
                    }
                }
                if ($graphic && $amountGraphic && $power) {
                    if ($power->potency < $graphic->minimumPowerSupply & $amountGraphic) {
                        $validator->errors()->add('powerSupply', 'The power supply does not support the amount necessary for the graphic card');
                    }
                }
                if ($storages && $board) {
                    $m2Amount = 0;
                    $sataAmount = 0;
                    foreach ($storages as $storage) {
                        $currentStorage = StorageDevice::find($storage['storageDeviceId']);
                        $amount = $storage['amount'];
                        if ($currentStorage->storageDeviceInterface === 'm2') {
                            $m2Amount += $amount;
                        } else {
                            $sataAmount += $amount;
                        }
                    }
                    if ($sataAmount + $m2Amount < 1) {
                        $validator->errors()->add('storageAmount', 'The must be at least 1 storage device');
                    }
                    if ($sataAmount > $board->sataSlots) {
                        $validator->errors()->add('sataAmount', 'The board does not support the amount of sata storage');
                    }
                    if ($m2Amount > $board->m2Slots) {
                        $validator->errors()->add('m2Amount', 'The board does not support the amount of m2 storage');
                    }
                }
            }
        ];
    }

    public function authorize()
    {
        return true;
    }
}
