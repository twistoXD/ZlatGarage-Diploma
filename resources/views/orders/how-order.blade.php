@extends('layouts.app')
@section('title', 'how-order')
@section('content')

    <div class="container mt-5">
        <h1 class="text-center pt-4">Как оформить заявку?</h1>
        <hr>
        <div class="row">
            <div class="col-sm-12 text-center" id="contact">
                <h4 class="pt-2">1) Вы можете приехать по адресу</h4>
                <i class="fas fa-globe"></i> Енесейская 12, Челябинск, Челябинская обл., 454135
                <br>
                <h4 class="pt-2">2) Вы можете позвонить по номеру телефона:</h4>
                <i class="fas fa-phone"></i> <a href="tel:+79124700257" class="text-decoration-none text-black">+7 (912) 470 0257</a><br>
                <i class="fas fa-phone"></i> <a href="tel:+79823350022" class="text-decoration-none text-black">+7 (982) 335 0022</a><br>
                <h4 class="pt-2">3) Для оформления заявки на сайте - </h4>
                <a href="{{ route('register.index') }}" class="btn btn-primary">Зарегистрируйтесь</a>
                <h4 class="pt-2">4) После регистрации у вас есть 3 варианта оформления заявки:</h4>
                4.1) Через личный кабинет<br>
                4.2) Через боковую кнопку "Оставьте заявку"<br>
                4.3) Через главную страницу нашего сайта<br>
            </div>
        </div>
    </div>

@endsection
