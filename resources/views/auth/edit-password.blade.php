@extends('layouts.app')
@section('title', 'update-password')
@section('content')
    @include('inc.success')
    <div class="card mb-3 mt-5">
        <form action="{{ route('update-password', ['user' => $user]) }}" method="post"
              enctype="multipart/form-data" class="row g-0">
            @csrf
            @method('PATCH')
            <div class="col-md-8 d-flex flex-column justify-content-between">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="password" class="form-label">Пароль</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               id="password"
                               name="password" placeholder="Введите новый пароль"
                               value="{{ old('password', $user->password) }}">
                        @error('password')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Повторите пароль</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                               id="password_confirmation"
                               name="password_confirmation" placeholder="Повторите новый пароль"
                               value="{{ old('password', $user->password) }}">
                        @error('password_confirmation')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="text-end">
                        <a href="{{ route('profile') }}" class="btn btn-sm btn-outline-dark">Вернуться назад</a>
                        <button class="btn btn-sm btn-outline-primary">Изменить пароль</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
