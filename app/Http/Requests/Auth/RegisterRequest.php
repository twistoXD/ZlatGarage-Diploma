<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'=>'required|string|min:3|Max:30',
            'surname'=>'required|string|min:3|Max:50',
            'email'=>'required|email|unique:users,email',
            'password'=>[
                'required',
                'min:8',
                'confirmed'
            ],
            'password_confirmation'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'required'=>'поле <:attribute> обязательно для заполнения',
            'email' => 'электронный адрес должен быть валидным',
            'min' => '<:attribute> должен содержать минимум 8 символов',
            'unique' => 'Пользователь с такими данными <:attribute> уже зарегистрирован',
            'password.confirmed' => 'Пароли должны совпадать',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'email'=> "Электронная почта",
            'password'=> 'Пароль',
            'password_confirmation' => 'Повторите пароль'
        ];
    }
}
