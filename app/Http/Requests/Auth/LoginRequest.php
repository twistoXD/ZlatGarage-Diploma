<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function authorize()
    {
    return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password'=>['required','min:8'],
            'g-recaptcha-response' => 'required|captcha'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Поле <:attribute> обязательно для заполнения',
            'email' => 'Электронный адрес должен быть валидным',
            'password'=>'Неправильно заполнен <:attribute>',
            'min' => '<:attribute> должен содержать минимум 8 символов',
            'g-recaptcha-response.required' => 'Пожалуйста, подтвердите, что вы не робот.',
            'captcha' => 'Ошибка капчи! повторите попытку позже или обратитесь к администратору сайта.',
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
