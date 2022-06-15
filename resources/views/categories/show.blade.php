@extends('layouts.admin')
@section('content')

    <div class="jumbotron bg-light px-5 py-3 my-3">
        <h6 class="display-6">{{$category->name}}</h6>
    </div>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{$category->image_url}}" class="img-fluid rounded-start" alt="{{ $category->image }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <p>{{$category->content}}</p>
                    <div class="text-end pt-5">
                        <a href="{{ route('admin.work.index', $category->id) }}" class="btn btn-primary">Просмотреть
                            работы</a>
                        <a href="{{route('admin.categories.edit', $category)}}" class="btn btn-warning">Изменить</a>
                        <button type="button" class="btn btn-danger"
                                id="deleteCategory" data-bs-toggle="modal" data-bs-target="#modalDestroy">Удалить
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('inc.modal-destroy-category')
@endsection


