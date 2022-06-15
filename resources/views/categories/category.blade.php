@extends('layouts.app')
@section('title', 'category')
@section('content')
    <div class="container marketing">
        @if(count($categories)>0)
            @foreach($categories as $category)
                <hr class="featurette-divider" id="{{$category->id}}">
                <div class="row featurette">
                    <div class="col-md-6">
                        <h2 class="featurette-heading"><span class="text-muted">{{$category->name }}</span></h2>
                        <p class="lead mt-3">{{ $category->content }}</p>
                        <a class="btn btn-lg btn-warning" href="{{ route('work.show', $category->id) }}">Узнать цены</a>
                    </div>
                    <div class="col-md-5 mt-2">
                        <img src="{{ $category->image_url }}"
                             class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                             width="500"
                             height="500" xmlns="http://www.w3.org/2000/svg" role="img"
                             aria-label="Placeholder: 500x500"
                             preserveAspectRatio="xMidYMid slice" focusable="false">
                    </div>
                </div>
            @endforeach
            <hr class="featurette-divider">
        @else
            <h5 class="text-center mt-lg-5">Список услуг пуст..</h5>
        @endif
    </div>
@endsection
