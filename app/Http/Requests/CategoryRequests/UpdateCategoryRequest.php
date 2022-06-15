<?php

namespace App\Http\Requests\CategoryRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=> 'required',
            'content' => ['required', 'max:500'],
            'image'=> 'image',
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
            'name' => 'Название услуги',
            'content' => 'Описание услуги',

        ];
    }
}
