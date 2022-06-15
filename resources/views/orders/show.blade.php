@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between align-items-start m-4">
        <a href="{{ route('admin.orders.index-admin') }}" class="btn btn-outline-dark">
            Вернуться назад
        </a>
    </div>
    @include('inc.success')
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12">
            <div class="card-body text-black">
                <div class="row justify-content-center">
                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Заявка №{{$order->id}}</p>
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-calendar-alt fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label"> Дата поступления заявки
                                    - {{$order->date_order_humans}}</label>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label"> Имя - {{$order->user->name}}</label>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label"> Фамилия - {{$order->user->surname}}</label>
                            </div>
                        </div>


                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label"> Номер телефона владельца
                                    <p>{{$order->numberOfPhone}}</p></label>
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
                                <label class="form-label">Дата завершения заявки
                                    - {{ $order->dateEnd ? date("d.m.Y", strtotime($order->dateEnd)) : "Не завершено" }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
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
                            <div class="text-end">Итого:<strong id="totalPrice"> ₽</strong></div>

                            <div class="text-end">
                                <div class="row mt-3">
                                    @if($order->status->status != 'Завершено')
                                        <div class="col-sm-6">
                                            <a href="{{ route('admin.order-edit', $order->id) }}"
                                               class="btn btn-danger">Изменить
                                                заявку</a>
                                        </div>
                                        <div class="col-sm-6">
                                            <form method="post"
                                                  action="{{ route('admin.endOrder', $order) }}">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-primary">Завершить заявку</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @push('child-scripts')
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



