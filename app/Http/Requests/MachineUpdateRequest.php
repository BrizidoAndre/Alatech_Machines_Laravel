<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MachineUpdateRequest extends MachineRequest
{

    public function rules()
    {
        return [
            'name' => ['nullable'],
            'description' => ['nullable'],
            'imageUrl' => ['nullable'],
            'motherboardId' => ['nullable', 'exists:motherboard,id'],
            'processorId' => ['nullable', 'exists:processor,id'],
            'memoryId' => ['nullable', 'exists:ramMemory,id'],
            'memoryAmount' => ['nullable', 'integer'],
            'graphicCardId' => ['nullable', 'exists:graphicCard,id'],
            'graphicCardAmount' => ['nullable', 'integer'],
            'powerSupplyId' => ['nullable', 'exists:powerSupply,id'],
            'storageDevices' => ['nullable', 'array', 'min:0'],
            'storageDevices.*.storageDeviceId' => ['required', 'exists:storageDevice,id'],
            'storageDevices.*.amount' => ['required', 'integer', 'min:0']
        ];
    }
}
