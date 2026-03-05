<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorageDeviceRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'imageUrl' => ['required'],
            'brandId' => ['required', 'exists:brand'],
            'storageDeviceType' => ['required'],
            'size' => ['required', 'integer'],
            'storageDeviceInterface' => ['required'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
