<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MachineHasStorageDeviceRequest extends FormRequest
{
    public function rules()
    {
        return [
            'machineId' => ['required', 'exists:machine'],
            'storageDeviceId' => ['required', 'integer'],
            'amount' => ['required', 'integer'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
