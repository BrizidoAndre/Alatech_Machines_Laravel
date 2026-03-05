<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GraphicCardRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'imageUrl' => ['required'],
            'brandId' => ['required', 'exists:brand'],
            'memorySize' => ['required', 'integer'],
            'memoryType' => ['required'],
            'minimumPowerSupply' => ['required', 'integer'],
            'supportMultiGpu' => ['boolean'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
