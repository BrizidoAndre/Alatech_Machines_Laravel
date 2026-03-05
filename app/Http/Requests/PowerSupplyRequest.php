<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PowerSupplyRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'imageUrl' => ['required'],
            'brandId' => ['required', 'exists:brand'],
            'potency' => ['required', 'integer'],
            'badge80Plus' => ['required'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
