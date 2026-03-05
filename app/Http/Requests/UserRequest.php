<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'username' => ['required'],
            'password' => ['required'],
            'accessToken' => ['required'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
