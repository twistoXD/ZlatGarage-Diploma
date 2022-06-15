@extends('layouts.admin')
@section('content')
    @include('inc.success')

    <div class="d-flex justify-content-between align-items-start m-4">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-dark">
            Добавить новую категорию услуг
        </a>
    </div>
    @if(count($categories)>0)
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-3">
            @foreach($categories as $category)
                @include('inc.category')
            @endforeach
        </div>
    @else
        <p>Список услуг пуст...</p>
    @endif
@endsection
