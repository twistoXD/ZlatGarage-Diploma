<?php

namespace App\Http\Requests\CommentRequests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{

    public function rules()
    {
        return [
            "content"=>'required|max:500',
        ];
    }

    public function messages()
    {
        return [
            'required'=>"Поле <:attribute> должно быть заполнено",
            'max'=>"Поле <:attribute> должно быть не более 500 символов",
        ];
    }

    public function attributes()
    {
        return [
            'content'=>"Отзыв"
        ];
    }

}
