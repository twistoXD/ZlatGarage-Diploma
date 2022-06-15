<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerStore(RegisterRequest $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            return back()->withErrors([
                'errorRegister' => 'Пользователь с такими данными уже существует!'
            ]);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            Auth::login($user);
            return redirect()->route('profile')->with('success', 'Спасибо за регистрацию,
            для новых пользователей у нас действует скидка 10% на первое посещение нашего автосервиса, скорее оформляйте заявку на обслуживание!');
        }

        return back()->withErrors([
            'errorRegister' => 'что-то пошло не так...'
        ]);
    }
}
