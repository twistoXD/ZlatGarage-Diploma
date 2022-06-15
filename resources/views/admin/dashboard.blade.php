@extends('layouts.admin')

@section('content')
    <h1 class="h2">Администратор {{ Auth::user()->name }} </h1>
    <br>
    <div class="row row-cols-1 row-cols-sm-2 m-4">
        <div class="cardAdmin">
            <a href="{{ route('admin.users.index') }}" class="card-link"></a>
            <div class="card text-white bg-primary mb-3 text-center" style="max-width: 18rem;">
                <div class="card-header">Пользователи</div>
                <div class="card-body">
                    <h5 class="card-title">{{$user->count()}}</h5>
                </div>
            </div>
        </div>

        <div class="cardAdmin">
            <a href="{{ route('admin.comments.index-admin') }}" class="card-link"></a>
            <div class="card text-white bg-primary mb-3 text-center" style="max-width: 18rem;">
                <div class="card-header">Отзывы</div>
                <div class="card-body">
                    <h5 class="card-title">{{$comment->where('status', '=', 0)->count()}}</h5>
                </div>
            </div>
        </div>

        <div class="cardAdmin">
            <a href="{{ route('admin.orders.index-admin') }}" class="card-link"></a>
            <div class="card text-white bg-primary mb-3 text-center" style="max-width: 18rem;">
                <div class="card-header">Заявки</div>
                <div class="card-body">
                    <h5 class="card-title">{{$order->count()}}</h5>
                </div>
            </div>
        </div>

        <div class="cardAdmin">
            <a href="{{ route('admin.stocks.index') }}" class="card-link"></a>
            <div class="card text-white bg-primary mb-3 text-center" style="max-width: 18rem;">
                <div class="card-header">Акции</div>
                <div class="card-body">
                    <h5 class="card-title">{{$stock->count()}}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection

