@extends('layouts.admin')
@section('title','users')
@section('content')
    <div class="d-flex justify-content-start mb-3">
        <h4 class="me-4 role-link">
            <a href="{{route('admin.users.index')}}" class="text-decoration-none text-primary me-2">
                Все пользователи
            </a>
        </h4>

        <select class="form-select" id="roleSelector" aria-label="Default select example">
            <option selected value="0">Все пользователи</option>
            @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->role}}</option>
            @endforeach
        </select>

    </div>
    <p id="countUsers"></p>
    <table class="table table-striped table-hover table-bordered">
        <thead class="table-light text-center">
        <th class="col-4">
            <div class="d-flex justify-content-between align-items-center">
                <span>Полное имя</span>
                <button class="btn btn-outline-dark" id="orderName">Sort &uarr;</button>
            </div>
        </th>
        <th class="col-3">
            <div class="d-flex justify-content-between align-items-center">
                <span>Роль</span>
                <button class="btn btn-outline-dark" id="orderRole">Sort &uarr;</button>
            </div>
        </th>
        <th class="col-3">
            <div class="d-flex justify-content-between align-items-center">
                <span>Отзывы</span>
                <button class="btn btn-outline-dark" id="orderComment">Sort &uarr;</button>
            </div>
        </th>
        <th class="col-3">Действия</th>
        </thead>
        <tbody id="tableUsers">

        </tbody>
    </table>


@endsection

@push('child-scripts')
<script src="{{asset('/js/workWithUsers.js')}}"></script>
@endpush
