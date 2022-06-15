@extends('layouts.admin')
@section('content')
    @include('inc.success')
    <div class="d-flex justify-content-between align-items-start m-4">
        <a href="{{ route('admin.works.create') }}" class="btn btn-outline-dark">
            Добавить новую услугу
        </a>
    </div>
    <div class="d-grid justify-content-center align-items-center">
        <h2 class="m-2">Выберите категорию услуг:</h2>
    </div>
    <div class="d-grid  justify-content-center align-items-center">
        <form method="get" class="d-flex" action="{{route('admin.work.category-admin')}}">
            @csrf
            <select class="form-select" name="category">
                <option value="0" selected disabled>--- Выберите категорию---</option>
                @foreach($categories as $category)
                    <option
                        value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-lg btn-dark m-2">Найти</button>
        </form>
        <a href="{{ route('admin.works.index') }}" class="d-flex btn btn-outline-dark mt-3">Сбросить фильтр</a>
    </div>
    <div class="container-sm">
        <table class="table mt-5">
            <thead>
            <tr>
                <th scope="col">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Категория работ</span>
                    </div>
                </th>
                <th scope="col">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Услуга</span>
                    </div>
                </th>
                <th scope="col">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Цена за работу</span>
                    </div>
                <th scope="col">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Действие</span>
                    </div>
                </th>
            </tr>
            </thead>
            <tbody id="tablePrice">
            @foreach($works as $work)
                <tr>
                    <td>{{ $work->category->name }}</td>
                    <td>{{$work->name }}</td>
                    <td>{{$work->price}} ₽</td>
                    <td><a href="{{ route('admin.works.edit', $work->id) }}" class="btn btn-primary">Изменить</a></td>
                    <td>
                        <form action="{{ route('admin.works.destroy', $work) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
