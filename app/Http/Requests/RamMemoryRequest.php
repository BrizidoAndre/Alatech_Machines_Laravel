<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RamMemoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'imageUrl' => ['required'],
            'brandId' => ['required', 'exists:brand'],
            'size' => ['required', 'integer'],
            'ramMemoryTypeId' => ['required', 'integer'],
            'frequency' => ['required', 'numeric'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
