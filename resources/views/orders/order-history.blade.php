@extends('layouts.app')
@section('title', 'order-history')
@section('content')
    <div class="container h-100 mt-lg-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-12 col-xl-10">
                <div class="card-body text-black">
                    <div class="row justify-content-center">
                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Заявка №{{$order->id}}</p>

                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                            <p class="text-center h4 fw-bold mb-5 mx-1 mx-md-4 mt-4">Детали заявки</p>
                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-calendar-alt fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label">Дата оформления заявки
                                        - {{ $order->date_order_humans }}</label>
                                </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-wrench fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label">Описание проблемы - {{$order->content}}</label>
                                </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-car fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label">Модель машины - {{ $order->type->name }}</label>
                                </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-circle-notch fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label">Статус заявки
                                        - {{ $order->status->status }}</label>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-calendar-alt fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label">Дата завершения
                                        - {{ $order->dateEnd ? date("d.m.Y", strtotime($order->dateEnd)) : "Не завершено" }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                            <p class="text-center h4 fw-bold mb-5 mx-1 mx-md-4 mt-4">Выполненная работа</p>
                            @if($order->reason != null)
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-window-close fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label">Причина отмены заявки
                                            - {{ $order->reason }}</label>
                                    </div>
                                </div>
                            @endif
                            @if($order->reason == null)
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span>Категория работ</span>
                                            </div>
                                        </th>
                                        <th scope="col">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span>Работы</span>
                                            </div>
                                        </th>
                                        <th scope="col">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span>Стоимость</span>
                                            </div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody id="tableOrder">
                                    @foreach($order->works as $work)
                                        <tr>
                                            <td>{{$work->category->name}}</td>
                                            <td>{{$work->name}}</td>
                                            <td id="price-{{$work->id}}">{{$work->price}} ₽</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="text-end">Итого:<strong id="totalPrice"></strong></div>
                            @endif
                        </div>
                    </div>
                    <a class="btn btn-primary justify-content-end align-items-end" style="float:right"
                       href="{{ route('profile') }}">Вернуться назад</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        let orderWork = @json($order->works);
        let totalPriceContainer = document.getElementById('totalPrice');

        function getTotalPrice(orderWork) {
            let totalPrice = orderWork.reduce((sum, item) => sum + parseInt(item.price), 0);

            totalPriceContainer.textContent = ` ${parseInt(totalPrice).toLocaleString()} ₽ `;
        }

        getTotalPrice(orderWork);
    </script>
@endpush
