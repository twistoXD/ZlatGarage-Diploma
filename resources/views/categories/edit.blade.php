@extends('layouts.admin')
@section('content')
    <div class="card mb-3">
        <form action="{{ route('admin.categories.update', ['category'=> $category]) }}" method="post"
              enctype="multipart/form-data" class="row g-0">
            @csrf
            @method('PATCH')
            <div class="col-md-8 d-flex flex-column justify-content-between">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Название категории услуг</label>
                        <input type="text" class="form-control" id="name"
                               name="name" placeholder="Введите название.."
                               value="{{ old('name', $category->name) }}">
                        @error('name')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Опишите услугу</label>
                        <textarea class="form-control" id="content" name="content"
                                  rows="3">{{ old('content', $category->content) }}</textarea>
                        @error('content')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Выберите файл</label>
                        <input class="form-control" type="file" id="image" name="image">
                        @error('image')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="text-end">
                        <button class="btn btn-sm btn-outline-primary">Изменить</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <img src="{{ old('image', $category->image_url) }}"
                     class="img-fluid rounded-start img-create"
                     alt="category" id="showImage">
            </div>
        </form>
    </div>
@endsection
