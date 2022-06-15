@extends('layouts.app')
@section('title', 'comments')
@section('content')
    <section class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-10">
                <div class="quote dark mt-5">
                    <blockquote>
                        <p>{{ $comment->content}}</p>
                        <br>
                        @canany(['delete-comment'], $comment)
                            <button type="button" class="btn btn-danger m-2"
                                    id="deleteComment" data-bs-toggle="modal" data-bs-target="#modalDestroy">Удалить свой отзыв
                            </button>
                        @endcanany
                        <a href="{{ route('comments.index') }}" class="btn btn-primary m-2">Перейти к отзывам</a>
                        <i class='fas <?= $comment->like ? 'fa-thumbs-up text-success' : 'fa-thumbs-down text-danger' ?> like-comment m-2'></i>
                    </blockquote>
                </div>
                <div class="quote-footer text-right">
                    <div class="quote-author-img">
                        <img src="{{ asset('storage/comment.png') }}" alt="Аватар пользователя">
                    </div>
                    <h4>{{ $comment->user->name }}
                    </h4>
                    <p>
                        <strong>{{$comment->date_comment_humans}}
                        </strong>
                    </p>
                </div>
            </div>
        </div>
    </section>
    @include('inc.modal_destroy')
@endsection



