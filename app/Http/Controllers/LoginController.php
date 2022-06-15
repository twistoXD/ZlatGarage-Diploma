<?php

namespace App\Http\Controllers;


use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\ProfileRequests\UpdatePasswordRequests;
use App\Http\Requests\ProfileRequests\UpdateProfileRequests;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginCheck(LoginRequest $request)
    {
        if (Auth::attempt(
            $request->only(['email', 'password']),
            $request->get('remember') == 'on')

        ) {
            $request->session()->regenerate();
            return redirect()->intended('profile');
        }

        return back()->withErrors([
            'errorLogin' => 'Ошибка входа...'
        ]);
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function profile()
    {
        $orders = Order::getOrder();
        return view('auth.profile', compact('orders'));
    }


    public function edit(User $user)
    {
        return view('auth.edit-profile', ['user' => $user]);
    }


    public function update(UpdateProfileRequests $request, User $user)
    {
        Auth::user()->update([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'email' => $request->get('email'),
        ]);

        return redirect()->route('edit-profile', $user)
            ->with('success', 'Данные успешно изменены...');
    }

    public function editPassword(User $user)
    {
        return view('auth.edit-password', ['user' => $user]);
    }

    public function updatePassword(UpdatePasswordRequests $request, User $user)
    {
        Auth::user()->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('edit-password', $user)
            ->with('success', 'Пароль успешно изменен...');
    }
}
