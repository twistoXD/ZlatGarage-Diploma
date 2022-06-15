@extends('layouts.admin')
@section('content')
    @include('inc.errors')
    <div class="card mb-3">
        <form action="{{ route('admin.works.store') }}" method="post"
              enctype="multipart/form-data" class="row g-0">
            @csrf
            <div class="col-md-8 d-flex flex-column justify-content-between">
                <div class="card-body">
                    {{--Название статьи--}}
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
                        <label for="name" class="form-label">Напишите услугу</label>
                        <input type="text" class="form-control" id="name"
                               name="name" placeholder="введите услугу.."
                               value="{{ old('name') }}">
                        @error('name')
                        <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Цена за работу</label>
                        <input type="text" class="form-control" id="price"
                               name="price" placeholder="введите цену..."
                               value="{{ old('price') }}">
                        @error('price')
                        <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>
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
                <img src="{{ old('image', asset('/storage/work.jpg')) }}"
                     class="img-fluid rounded-start img-create" alt="work"
                     id="showImage">
            </div>
        </form>
    </div>
@endsection


