@extends('layouts.admin')
@section('content')

    <div class="d-grid  justify-content-center align-items-center">
        <form method="GET" class="d-flex" action="{{ route('admin.orders.index-select') }}">
            @csrf
            <select class="form-select" name="status">
                <option value="0" selected disabled>--- Выберите статус заявки ---</option>
                @foreach($statuses as $status)
                    <option
                        value="{{ $status->id }}" {{$status->id==request('status')?'selected':''}}>{{ $status->status }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-lg btn-dark m-2">Найти</button>
        </form>
        <a href="{{ route('admin.orders.index-admin') }}" class="d-flex btn btn-outline-dark mt-3">Сбросить фильтр</a>
    </div>
    @include('inc.success')
    <div class="container-sm">
        <table class="table mt-5">
            <thead>
            <tr>
                <th scope="col">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>№</span>
                    </div>
                </th>
                <th scope="col">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Заказчик</span>
                    </div>
                </th>
                <th scope="col">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Модель машины</span>
                    </div>
                </th>
                <th scope="col">
                    <div class="d-flex justify-content-start align-items-center">
                        <span style="margin-right: 5px;">Дата поступления</span>

                        <form action="{{ route('admin.sort-order') }}" method="get">
                            <input type="text" id="typeSort" name="typeSort"
                                   value="{{ isset($typeSort) ? $typeSort : 'ASC' }}" hidden/>
                            <input type="submit" id="orderDate" name="orderDate"
                                   value="{{ isset($orderDate) ? $orderDate : 'Sort ↓' }}"/>

                        </form>
                    </div>
                </th>
                <th scope="col">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Статус заявки</span>
                    </div>
                </th>
            </tr>
            </thead>
            <tbody id="tableOrder">
            @foreach($orders as $order)
                <tr>
                    <th scope="col">{{$order->id}}</th>
                    <td>{{$order->user->full_name}}</td>
                    <td>{{$order->type->name}}</td>
                    <td>{{$order->date_order_humans}}</td>
                    <td>{{$order->status->status}}</td>
                    <td><a href="{{ route("orders.show", $order->id) }}" class="btn btn-primary">Подробнее</a></td>
                    <td>
                        <a href="{{ route('admin.order-edit', $order->id) }}" class="btn btn-danger">Изменить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

