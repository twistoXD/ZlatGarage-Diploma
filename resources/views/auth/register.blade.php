@extends('layouts.app')
@section('title','auth')

@section('content')
    <div class="container h-100 mt-lg-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-12 col-xl-10">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Регистрация</p>

                                <form class="mx-1 mx-md-4" method="post" action="{{ route('register.store') }}">
                                    @csrf
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                   placeholder="Введите свое имя..." name="name" aria-label="name"
                                                   value="{{ old('name') }}"/>
                                            <label class="form-label">Имя</label>
                                            @error('name')
                                            <p><small class="text-danger text-center">{{ $message }}</small></p>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text"
                                                   class="form-control @error('surname') is-invalid @enderror"
                                                   placeholder="Введите свою фамилию..." name="surname"
                                                   aria-label="surname" value="{{ old('surname') }}"/>
                                            <label class="form-label">Фамилия</label>
                                            @error('surname')
                                            <p><small class="text-danger text-center">{{ $message }}</small></p>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   placeholder="Введите свою почту..." name="email" aria-label="email"
                                                   value="{{ old('email') }}"/>
                                            <label class="form-label">Электронная почта</label>
                                            @error('email')
                                            <p><small class="text-danger text-center">{{ $message }}</small></p>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   placeholder="Придумайте пароль..." name="password"
                                                   aria-label="password" value="{{ old('password') }}"/>
                                            <label class="form-label">Пароль</label>
                                            @error('password')
                                            <p><small class="text-danger text-center">{{ $message }}</small></p>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password"
                                                   class="form-control @error('password_confirmation') is-invalid @enderror"
                                                   placeholder="Повторите пароль..." name="password_confirmation"
                                                   aria-label="password_confirmation" id="password_confirmation"
                                                   value="{{ old('password') }}"/>
                                            <label class="form-label">Повторите пароль</label>
                                            @error('password_confirmation')
                                            <p><small class="text-danger text-center">{{ $message }}</small></p>
                                            @enderror
                                        </div>
                                    </div>

                                    @error("errorRegister")
                                    <p><small class="text-danger text-center">{{ $message }}</small></p>
                                    @enderror
                                    <div class="mb-3 text-decoration-none">
                                        <a href="{{ route('login') }}" class="registr">
                                            Уже есть аккаунт?
                                        </a>
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary btn-lg">Регистрация</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection






