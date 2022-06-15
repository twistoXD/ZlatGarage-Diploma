<?php

namespace App\Http\Requests\OrderRequests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'numberOfPhone' => 'required',
            'content' => 'required',
            'type' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'Выберите один из пунктов списка <:attribute>',
            'required' => 'Поле <:attribute> обязательно для заполнения...',
        ];
    }

    public function attributes()
    {
        return [
            'numberOfPhone' => 'Номер телефона',
            'content' => 'Описание проблемы',
            'type' => 'Модель машины'
        ];
    }
}
