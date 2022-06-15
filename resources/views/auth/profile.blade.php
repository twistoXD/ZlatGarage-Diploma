@extends('layouts.app')
@section('title','profile')
@section('content')
    <div class="container mt-5">
        @include('inc.success')
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ asset('storage/comment.png') }}" alt="Admin" class="rounded-circle"
                                     width="120">
                                <div class="mt-3">
                                    <h4>{{ Auth::user()->full_name }}</h4>
                                    <p class="text-secondary mb-1">Дата регистрации</p>
                                    <p class="text-muted font-size-sm">{{ Auth::user()->date_user_humans }}</p>
                                    <a href="{{ route('orders.index') }}" class="btn btn-primary">Оформить заявку на
                                        обслуживание</a>
                                    <a href="{{ route('comments.create') }}" class="btn btn-outline-primary mt-1">Оставить
                                        отзыв о проделанной работе</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    Пароль
                                </h6>
                                <a class="btn btn-primary" href="{{ route('edit-password') }}">Изменить</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Имя</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->name }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Фамилия</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->surname }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Почта</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->email }}
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-primary" href="{{ route('edit-profile') }}">Изменить данные</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="h6">История ваших заявок на обслуживание автомобиля:</p>
                    <div class="card mb-3">
                        <div class="card-body">
                            @foreach($orders as $order)
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Заявка от {{$order->date_order_humans}}</h6>
                                    </div>
                                    <div class="col-sm-3 text-danger">
                                        {{ $order->status->status }}
                                    </div>
                                    <div class="col-sm-4">
                                        <a class="btn btn-primary" href="{{ route('order-history', $order) }}">История
                                            заявки</a>
                                    </div>
                                    <div class="col-sm-3">
                                        @if($order->status->status == 'На рассмотрении')
                                            <td>
                                                <form method="post" id="form"
                                                      action="{{ route('order.destroy', $order) }}">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="btn btn-danger">
                                                        Отменить заявку
                                                    </button>
                                                </form>
                                            </td>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


