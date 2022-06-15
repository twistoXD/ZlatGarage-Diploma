@extends('layouts.app')
@section('content')
    <main class="d-flex justify-content-center align-items-center mt-5">
        <form class="col col-md-8 col-lg-5 mt-5" method="post" action="{{ route('admin.login.check') }}">
            @csrf
            <img class="mb-4" src="{{ asset('storage/admin.png') }}" alt="" width="98" height="98">
            <h1 class="h3 mb-3 fw-normal">Вход для администратора</h1>

            <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                       id="email" placeholder="name@example.com">
                <label for="floatingInput">Email адрес</label>
            </div>
            @error("email")
            <p><small class="text-danger">{{ $message }}</small> </p>
            @enderror
            <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                       name="password" id="password" placeholder="пароль">
                <label for="floatingPassword">Пароль</label>
            </div>
            @error("password")
            <p><small class="text-danger">{{ $message }}</small> </p>
            @enderror

            @error("errorLogin")
            <p><small class="text-danger">{{ $message }}</small> </p>
            @enderror

            <button class="w-100 btn btn-lg btn-outline-dark" type="submit">Войти</button>
        </form>
    </main>
@endsection
