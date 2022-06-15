<?php

namespace App\Http\Requests\StockRequests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStockRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title'=> 'required|string|min:3|max:155',
            'content' => ['required', 'max:500'],
            'start_date' => 'required',
            'end_date' => 'required',
            'image'=> 'image',

        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле <:attribute> обязательно для заполнения...',
            'min' =>'В поле должно быть не менее :min символов'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Название акции',
            'content' => 'Описание акции',
            'start_date' => 'Дата начала акции',
            'end_date' => 'Дата окончания акции'
        ];
    }
}
