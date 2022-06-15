<?php

namespace App\Http\Requests\ProfileRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdatePasswordRequests extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password'=>[
                'required',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols(),
                'confirmed'
            ],
            'password_confirmation'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'required'=>'поле <:attribute> обязательно для заполнения',
            'min' => '<:attribute> должен содержать минимум 8 символов',
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'Пароль',
            'password_confirmation' => 'Повторите пароль'
        ];
    }
}
