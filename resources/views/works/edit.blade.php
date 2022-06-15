@extends('layouts.admin')
@section('content')
    <div class="card mb-3">
        <form action="{{ route('admin.works.update', ['work'=> $work]) }}" method="post"
              enctype="multipart/form-data" class="row g-0">
            @csrf
            @method('PATCH')
            <div class="col-md-8 d-flex flex-column justify-content-between">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Выберите категорию</label>
                        <select class="form-select" name="category" id="category">
                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->id }}" {{$category->id==old('category')?'selected':''}}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Название услуги</label>
                        <input type="text" class="form-control" id="name"
                               name="name" placeholder="Введите название.."
                               value="{{ old('name', $work->name) }}">
                        @error('name')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Цена за работу</label>
                        <textarea class="form-control" id="price" name="price"
                                  rows="3">{{ old('price', $work->price) }}</textarea>
                        @error('price')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Выберите файл</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>


                    <div class="text-end">
                        <button class="btn btn-sm btn-outline-primary">Изменить</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <img src="{{ old('image', $work->image_url) }}"
                     class="img-fluid rounded-start img-create"
                     alt="work" id="showImage">
            </div>
        </form>
    </div>
@endsection
