<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Admin\LoginRequest;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class LoginController extends Controller
{
    //переходим на страницу авторизации
    public function login()
    {
        return view('admin.login');
    }

// выполняем проверку индентификации данных
    public function loginCheck(LoginRequest $request, User $user)
    {
        if (Auth::attempt($request->only(['email', 'password'])) && Gate::allows('admin')) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'errorLogin' => 'Электронная почта или пароль введены неверно'
        ]);
    }

    //выходим из аккаунта
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('home');
    }

    //показываем страницу личного кабинет
    public function dashboard()
    {
        $user = User::all()->where('role_id', '=', 1);
        $comment = Comment::all();
        $stock = Stock::all()->where("end_date", '>=', now());
        $order = Order::all()->where('status_id', '=', 1);
        return view('admin.dashboard', ['user' => $user, 'comment' => $comment, 'stock' => $stock, 'order' => $order]);
    }
}

