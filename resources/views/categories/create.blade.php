@extends('layouts.admin')
@section('content')
    @include('inc.errors')
    <div class="card mb-3">
        <form action="{{ route('admin.categories.store') }}" method="post"
              enctype="multipart/form-data" class="row g-0">
            @csrf
            <div class="col-md-8 d-flex flex-column justify-content-between">
                <div class="card-body">

                    <div class="mb-3">
                        <label for="name" class="form-label">Название категории услуг</label>
                        <input type="text" class="form-control" id="name"
                               name="name" placeholder="введите название.."
                               value="{{ old('name') }}">
                        @error('name')
                        <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Опишите услугу</label>
                        <textarea class="form-control" id="content" name="content"
                                  rows="3">{{ old('content') }}</textarea>
                        @error('content')
                        <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    {{--Изображение--}}
                    <div class="mb-3">
                        <label for="image" class="form-label">Выберите файл</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>


                    <div class="text-end">
                        <button class="btn btn-primary">Создать</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <img src="{{ old('image', asset('/storage/category.jpg')) }}"
                     class="img-fluid rounded-start img-create" alt="categories"
                     id="showImage">
            </div>

        </form>
    </div>

@endsection

