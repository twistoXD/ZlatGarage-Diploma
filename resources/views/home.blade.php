@extends('layouts.app')
@section('title','home')
@section('content')

    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                    aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('storage/slider1.jpg') }}" alt="slider1">
                <div class="container">
                    <div class="carousel-caption text-start ">
                        <h1>Мы - компания талантливых инженеров-механиков</h1>
                        <p>Сотрудники нашей компании являются сертифицированными специалистами.</p>
                        <p><a class="btn btn-lg btn-warning" href="{{ route('orders.index') }}">Записаться на
                                обслуживание</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/slider2.jpg') }}" alt="slider2">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Мы лучшие по ремонту автомобилей в нашем городе</h1>
                        <p>Можем выполнить заказ различной сложности</p>
                        <p><a class="btn btn-lg btn-warning" href="{{ route('category.index') }}">Наши услуги</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/slider3.jpg') }}" alt="slider3">
                <div class="container">
                    <div class="carousel-caption text-end">
                        <h1>Опыт. Ответственность. Высокая производительность.</h1>
                        <p>Мы оказываем широкий спектр услуг по ремонту и обслуживанию автомобилей</p>
                        <p><a class="btn btn-lg btn-warning" href="{{ route('orders.index') }}">Записаться на
                                обслуживание</a></p>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div class="container marketing">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-lg-4">
                    <img src="{{$category->image_url}}" class="rounded-circle p-2" width="350" height="250" alt="{{$category->name}}">
                    <h2>{{$category->name }}</h2>
                    <p>{{ $category->short_content }}</p>
                    <p><a class="btn btn-warning" href="{{ route('category.index') }}#{{$category->id}}">Подробнее
                            &raquo;</a></p>
                </div>
            @endforeach
        </div>
        <hr class="featurette-divider">
        @include('inc.success')
        <div class="container h-100 mt-lg-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-12 col-xl-10">
                    <div class="card-body text-black">
                        <div class="row justify-content-center">
                            <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Оформите заявку</p>
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <form class="mx-1 mx-md-4" method="post" action="{{ route('orders.store') }}">
                                    @csrf
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text"
                                                   class="form-control tel @error('numberOfPhone') is-invalid @enderror"
                                                   placeholder="Введите ваш номер телефона.." name="numberOfPhone"
                                                   aria-label="number"
                                                   value="{{ old('numberOfPhone') }}"/>
                                            <label class="form-label">Номер телефона</label>
                                            @error('numberOfPhone')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-car fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <select class="form-select" name="mark" id="mark" required>
                                                <option value="0" selected disabled>--- Выберите марку машины ---
                                                </option>
                                                @foreach($marks as $mark)
                                                    <option
                                                        value="{{ $mark->id }}" {{$mark->id==old('mark')?'selected':''}}>{{ ucfirst($mark->name) }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-car fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <select class="form-select @error('type') is-invalid @enderror" name="type"
                                                    id="type">
                                                <option value="">--- Выберите модель машины ---</option>
                                            </select>
                                            @error('type')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-wrench fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <textarea class="form-control @error('content') is-invalid @enderror"
                                                      id="content" name="content"
                                                      rows="3">{{ old('content') }}</textarea>
                                            <label class="form-label">Ваша проблема</label>
                                            @error('content')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>


                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary btn-lg">Отправить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="featurette-divider">
        <main>
            <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
                <div
                    class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-3 g-3 justify-content-center align-content-center">
                    @foreach($stocks as $stock)
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <img src="{{ $stock->image_url }}" alt="{{ $stock->image }}"
                                     class="card-img-stock"/>
                                <div class="card-body">
                                    <div class="clearfix mb-3"><span
                                            class="float-start badge rounded-pill bg-primary">от {{ date('d.m.Y', strtotime($stock->start_date)) }}</span>
                                        <span
                                            class="float-end badge rounded-pill bg-primary">до {{ date('d.m.Y', strtotime($stock->end_date)) }}</span>
                                    </div>
                                    <h5 class="card-title text-center">{{ $stock->title }}</h5>
                                    <div class="card-text text-center">
                                        {{ $stock->short_content }}
                                    </div>
                                </div>
                                <div class="text-center my-3"><a
                                        href="{{ Route('stock.show-stock', $stock->id) }}"
                                        class="btn btn-primary">Читать подробнее</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>
        <hr class="featurette-divider">
        <p class="text-center text-black h2 fw-bold mb-5 mx-1 mx-md-4 mt-4">Отзывы о нашей работе</p>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-3 justify-content-center">
            @foreach($comments as $comment)
                @if($comment->status != '0')
                    <section class="container m-4">
                        <div class="row">
                            <div class="col-10 w-100">
                                <div class="quote dark">
                                    <blockquote>
                                        <p class="comment-p">{{ $comment->short_content}}</p>
                                        <a href="{{ route("comments.show", $comment->id) }}"
                                           class="btn bg- btn-primary m-2">Подробнее</a>
                                        <i class='fas <?= $comment->like ? 'fa-thumbs-up text-success' : 'fa-thumbs-down text-danger' ?> like-comment m-2'></i>
                                    </blockquote>
                                </div>
                                <div class="quote-footer text-right">
                                    <div class="quote-author-img">
                                        <img src="{{ asset('storage/comment.png') }}" alt="Аватар пользователя">
                                    </div>
                                    <h4>{{ $comment->user->full_name }}
                                    </h4>
                                    <p>
                                        <strong>{{$comment->date_comment_humans}}
                                        </strong>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </section>
                @endif
            @endforeach
        </div>

        <hr class="featurette-divider">
        <div class="row align-items-center justify-content-center">
            <div class="col-sm-4">
                <iframe title="GoogleMap"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6450.286827985119!2d61.457687727670006!3d55.139164968761065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43c5f2bc64ffffff%3A0x43f56250cf9cd4fa!2z0JDQstGC0L7RgdC10YDQstC40YE!5e0!3m2!1sru!2sru!4v1647790771654!5m2!1sru!2sru"
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-sm-4" id="contact">
                <h3 class="text-black">Наши данные для связи</h3>
                <hr align="left" width="50%">
                <h4 class="pt-2">Адрес</h4>
                <i class="fas fa-globe"></i> Енесейская 12, Челябинск, Челябинская обл., 454135
                <br>
                <h4 class="pt-2">Номера телефонов</h4>
                <i class="fas fa-phone"></i> <a href="tel:+79124700257" class="text-decoration-none text-black">+7 (912)
                    470 0257</a><br>
                <i class="fas fa-phone"></i> <a href="tel:+79823350022" class="text-decoration-none text-black">+7 (982)
                    335 0022</a><br>

                <h4 class="pt-2">Электронная почта</h4>
                <i class="fa fa-envelope"></i> avtoservis@mail.ru<br>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script>
        $(document).ready(function () {
            $('#mark').on('change', function () {
                let id = $(this).val();
                $('#type').empty();
                $('#type').append(`<option value="0" disabled selected>В процессе..</option>`);
                $.ajax({
                    type: 'GET',
                    url: '/getTypes/' + id,
                    success: function (response) {
                        var response = JSON.parse(response);
                        console.log(response);
                        $('#type').empty();
                        $('#type').append(`<option value="0" disabled selected>--- Выберите модель машины ---</option>`);
                        response.forEach(element => {
                            $('#type').append(`<option value="${element['id']}">${element['name']}</option>`);
                        });
                    }
                });
            });
        });
    </script>
@endpush
