<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MotherboardRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'imageUrl' => ['required'],
            'brandId' => ['required', 'exists:brand'],
            'socketTypeId' => ['required', 'integer'],
            'ramMemoryTypeId' => ['required', 'integer'],
            'ramMemorySlots' => ['required', 'integer'],
            'maxTdp' => ['required', 'integer'],
            'sataSlots' => ['required', 'integer'],
            'm2Slots' => ['required', 'integer'],
            'pciSlots' => ['required', 'integer'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
