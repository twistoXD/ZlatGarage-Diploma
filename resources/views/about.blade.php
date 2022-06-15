@extends('layouts.app')
@section('title','about')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center pt-4">Информация о нас</h1>
        <hr>
        <div class="row">
            <div class="col-sm-4">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6450.286827985119!2d61.457687727670006!3d55.139164968761065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43c5f2bc64ffffff%3A0x43f56250cf9cd4fa!2z0JDQstGC0L7RgdC10YDQstC40YE!5e0!3m2!1sru!2sru!4v1647790771654!5m2!1sru!2sru"
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-sm-7" id="contact">
                <h4 class="pt-2">Адрес</h4>
                <i class="fas fa-globe"></i> Енесейская 12, Челябинск, Челябинская обл., 454135
                <br>
                <h4 class="pt-2">Номера телефонов</h4>
                <i class="fas fa-phone"></i> <a href="tel:+79124700257" class="text-decoration-none text-black">+7 (912) 470 0257</a><br>
                <i class="fas fa-phone"></i> <a href="tel:+79823350022" class="text-decoration-none text-black">+7 (982) 335 0022</a><br>
                <h4 class="pt-2">Электронная почта</h4>
                <i class="fa fa-envelope"></i> avtoservis@mail.ru<br>


            </div>
        </div>
    </div>
@endsection
