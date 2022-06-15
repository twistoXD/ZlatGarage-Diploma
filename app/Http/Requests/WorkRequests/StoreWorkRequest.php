<?php

namespace App\Http\Requests\WorkRequests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'=> 'required',
            'price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле <:attribute> обязательно для заполнения...',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Услуга',
            'price' => 'Цена работы'
        ];
    }
}
