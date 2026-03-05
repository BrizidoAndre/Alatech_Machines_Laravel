<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyMachineRequest extends MachineRequest
{
    public function rules()
    {
        return [
            'name' => ['nullable'],
            'description' => ['nullable'],
            'imageUrl' => ['nullable'],
            'motherboardId' => ['required', 'exists:motherboard,id'],
            'processorId' => ['nullable', 'exists:processor,id'],
            'memoryId' => ['nullable', 'exists:ramMemory,id'],
            'memoryAmount' => ['nullable', 'integer'],
            'graphicCardId' => ['nullable', 'exists:graphicCard,id'],
            'graphicCardAmount' => ['nullable', 'integer'],
            'powerSupplyId' => ['required', 'exists:powerSupply,id'],
            'storageDevices' => ['nullable', 'array', 'min:0'],
            'storageDevices.*.storageDeviceId' => ['nullable', 'exists:storageDevice,id'],
            'storageDevices.*.amount' => ['nullable', 'integer', 'min:0']
        ];
    }
}
