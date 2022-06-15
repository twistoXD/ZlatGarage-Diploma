<?php

namespace App\Http\Requests\ProfileRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequests extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|string|min:3|max:30',
            'surname'=>'required|string|min:3|max:50',
            'email'=>'required|email|',
        ];
    }

    public function messages()
    {
        return [
            'required'=>'поле <:attribute> обязательно для заполнения',
            'email' => 'электронный адрес должен быть валидным',
            'min' => 'В поле должно быть не менее :min символов',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'email' => 'Электронная почта'
        ];
    }
}
