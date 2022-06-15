@extends('layouts.app')
@section('title', 'update-profile')
@section('content')
    @include('inc.success')
    <div class="card mb-3 mt-5">
        <form action="{{ route('update-profile', ['user'=> $user]) }}" method="post"
              enctype="multipart/form-data" class="row g-0">
            @csrf
            @method('PATCH')
            <div class="col-md-8 d-flex flex-column justify-content-between">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Имя</label>
                        <input type="text" class="form-control" id="name"
                               name="name" placeholder="Введите ваше имя"
                               value="{{ old('name', $user->name) }}">
                        @error('name')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="form-label">Фамилия</label>
                        <input type="text" class="form-control" id="surname"
                               name="surname" placeholder="Введите вашу фамилию..."
                               value="{{ old('surname', $user->surname) }}">
                        @error('surname')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Электронная почта</label>
                        <input type="email" class="form-control" id="email"
                               name="email" placeholder="Введите электронную почту..."
                               value="{{ old('email', $user->email) }}">
                        @error('email')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="text-end">
                        <a href="{{ route('profile') }}" class="btn btn-sm btn-outline-dark">Вернуться назад</a>
                        <button class="btn btn-sm btn-outline-primary">Изменить</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
