@extends('layouts.admin')
@section('content')
    @include('inc.errors')
    <div class="card mb-3">
        <form action="{{ route('admin.stocks.store') }}" method="post"
              enctype="multipart/form-data" class="row g-0">
            @csrf
            <div class="col-md-8 d-flex flex-column justify-content-between">
                <div class="card-body">
                    {{--Название статьи--}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Название новой акции</label>
                        <input type="text" class="form-control" id="title"
                               name="title" placeholder="введите заголовок статьи..."
                               value="{{ old('title') }}">
                        @error('title')
                        <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{--Содержимое статьи--}}
                    <div class="mb-3">
                        <label for="content" class="form-label">Опишите акцию</label>
                        <textarea class="form-control" id="content" name="content"
                                  rows="3">{{ old('content') }}</textarea>
                        @error('content')
                        <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="start_date" class="form-label">Дата начала акции</label>
                        <input type="date" class="form-control" id="start_date"
                               name="start_date" placeholder="введите дату..."
                               value="{{ old('start_date') }}">
                        @error('start_date')
                        <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="end_date" class="form-label">Дата окончания акции</label>
                        <input type="date" class="form-control" id="end_date"
                               name="end_date" placeholder="введите дату..."
                               value="{{ old('end_date') }}">
                        @error('end_date')
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
                <img src="{{ old('image', asset('/storage/default.jpg')) }}"
                     class="img-fluid rounded-start img-create" alt="stock"
                     id="showImage">
            </div>
        </form>
    </div>
@endsection


