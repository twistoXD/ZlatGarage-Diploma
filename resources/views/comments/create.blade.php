@extends('layouts.app')
@section('title', 'comment.create')

@section('content')
    <div class="container h-100 mt-lg-5">
        @include('inc.errors')
        <div class="row d-flex justify-content-center align-items-center mt-lg-5">
            <div class="col-lg-12 col-xl-10">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Оставьте отзыв</p>
                                <form action="{{ route('comments.store') }}" method="post"
                                      enctype="multipart/form-data" class="mx-1 mx-md-4">
                                    @csrf
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <i class="fas fa-heart fa-lg me-3 fa-fw"></i>
                                            <label for="content" class="form-label">Оцените обслуживание
                                                автосервиса</label>
                                            <div class="row mt-3">
                                                <div class="col-6">
                                                    <div class="form-check-comment">
                                                        <input class="form-check-input" type="radio"
                                                               name="likes"
                                                               id="likes" checked value="1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            <i class="fas fa-thumbs-up text-success like"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check-comment">
                                                        <input class="form-check-input" type="radio"
                                                               name="likes"
                                                               id="likes" value="0">
                                                        <label class="form-check-label">
                                                            <i class="fas fa-thumbs-down text-danger like"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label for="content" class="form-label">Напишите свой отзыв</label>
                                            <textarea class="form-control" id="content" name="content"
                                                      rows="3">{{ old('content') }}</textarea>
                                            @error('content')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button class="btn btn-outline-dark">Отправить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

