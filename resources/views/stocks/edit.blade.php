@extends('layouts.admin')
@section('content')
    <div class="card mb-3">
        <form action="{{ route('admin.stocks.update', ['stock'=> $stock]) }}" method="post"
              enctype="multipart/form-data" class="row g-0">
            @csrf
            @method('PATCH')
            <div class="col-md-8 d-flex flex-column justify-content-between">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Название акции</label>
                        <input type="text" class="form-control" id="title"
                               name="title" placeholder="Введите заголовок статьи"
                               value="{{ old('title', $stock->title) }}">
                        @error('title')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Опишите акцию</label>
                        <textarea class="form-control" id="content" name="content"
                                  rows="3">{{ old('content', $stock->content) }}</textarea>
                        @error('content')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Дата начала акции</label>
                        <input type="date" class="form-control" id="start_date"
                               name="start_date" placeholder="Введите дату..."
                               value="{{ old('title', $stock->start_date) }}">
                        @error('start_date')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">Дата окончания акции</label>
                        <input type="date" class="form-control" id="end_date"
                               name="end_date" placeholder="Введите дату..."
                               value="{{ old('title', $stock->title) }}">
                        @error('end_date')
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
                <img src="{{ old('image', $stock->image_url) }}"
                     class="img-fluid rounded-start img-create"
                     alt="stock" id="showImage">
            </div>
        </form>
    </div>
@endsection
