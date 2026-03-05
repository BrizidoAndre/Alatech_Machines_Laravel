<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessorRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'imageUrl' => ['required'],
            'brandId' => ['required', 'exists:brand'],
            'socketTypeId' => ['required', 'integer'],
            'cores' => ['required', 'integer'],
            'baseFrequency' => ['required', 'numeric'],
            'maxFrequency' => ['required', 'numeric'],
            'cacheMemory' => ['required', 'numeric'],
            'tdp' => ['required', 'integer'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
