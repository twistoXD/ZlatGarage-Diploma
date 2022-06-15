@extends('layouts.app')
@section('title', 'comments')

@section('content')
    @include('inc.success')

    <div class="d-flex justify-content-between align-items-start m-4">
        <div class="mt-5"> {{ $comments->onEachSide(1)->links() }}</div>
        @auth
            <a href="{{ route('comments.create') }}" class="btn btn-primary mt-5">
                Оставить отзыв
            </a>
        @endauth
    </div>
    @if(count($comments)>0)
        <div
            class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-3 justify-content-center align-items-start">
            @foreach($comments as $comment)
                @if($comment->status != '0')
                    @include('inc.comment')
                @endif
            @endforeach
        </div>
    @else
        <h5 class="text-center mt-lg-5">Отзывов пока нет...</h5>
    @endif
@endsection
