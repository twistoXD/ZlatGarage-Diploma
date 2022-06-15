<?php

namespace App\Http\Requests\Auth\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password'=>['required','min:8'],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Поле <:attribute> обязательно для заполнения',
            'email' => 'Электронный адрес должен быть валидным',
            'password'=>'Неправильно заполнен <:attribute>',
            'min' => '<:attribute> должен содержать минимум 8 символов',
        ];
    }

    public function attributes()
    {
        return [
            'email'=>"Электронная почта",
            'password'=>'Пароль',

        ];
    }
}
