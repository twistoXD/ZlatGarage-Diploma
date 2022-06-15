@extends('layouts.admin')
@section('content')
    <a href="{{ route('admin.orders.index-admin') }}" class="btn btn-sm btn-outline-dark">
        Вернуться назад
    </a>
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-12 col-xl-10">
                <div class="card-body text-black">
                    <div class="row justify-content-center">
                        <h4 class="text-center mb-2 mx-1 mx-md-4">Заявка №{{$order->id}}</h4>
                        <form class="mx-1 mx-md-4 form-work" method="post"
                              action="{{ route('admin.update-order', ['order'=>$order]) }}">
                            @csrf
                            @method('PATCH')
                            {{--Статус--}}
                            <div class="d-flex flex-column align-items-center mb-4">
                                <div class="w-50 form-outline flex-fill mb-0">
                                    <p class="text-center">Измените статус заявки</p>
                                    <select class="form-select" name="status" id="status" required>
                                        @foreach($statuses as $status)
                                            <option
                                                value="{{ $status->id }}" {{($status->id == $order->status_id) ? 'selected' : ''}}>{{ $status->status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="status {{ $order->status->id === 3 ? '':'d-none' }} w-100">
                                    <label for="reason">Причина отказа</label>
                                    <textarea name="reason" id="reason"
                                              class="form-control w-100">{{ old('reason') ?? $order->reason }}</textarea>
                                </div>
                            </div>

                            <hr>
                            {{--Виды работ в заказе--}}
                            @if(count($order->works) > 0)
                                <table class="table">
                                    <thead>
                                    <tr class="text-center">
                                        <th scope="col">Категория работ</th>
                                        <th scope="col">Работы</th>
                                        <th scope="col">Стоимость</th>
                                        <th scope="col">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tableOrder">
                                    @foreach($order->works as $work)
                                        <tr>
                                            <td class="text-center">{{$work->category->name}}</td>
                                            <td class="text-center">{{$work->name}}</td>
                                            <td class="text-center">{{$work->price}} ₽</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.orders.detachWork', [$order, $work]) }}"
                                                   class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-minus fa-sm me-3 fa-fw"></i>убрать работу
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-center">Работы пока не прикреплены...</p>
                            @endif
                            {{--Добавление работы--}}
                            <div class="d-flex flex-column align-items-center mb-4">
                                <div class="col-md-10 col-lg-6 col-xl-5">
                                    <div class="border mb-2 plus card-work">
                                        <button type="button" class="form-control" id="btnAddWork"
                                                onclick="addCardWork(this)">
                                            <i class="fas fa-plus fa-lg me-3 fa-fw"></i>
                                            Добавить работу
                                        </button>
                                    </div>


                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4 mt-lg-2 div-change">
                                        <button type="submit" class="btn btn-primary">
                                            Обновить
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @if($order->status->status != 'Завершено')
                            <form method="post"
                                  action="{{ route('admin.endOrder', $order) }}" class=" text-end">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger">Завершить заявку</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('child-scripts')
    <script>
        let categories = @json($categories);
        let buttonCreate = document.getElementById('plus');

        function addCardWork(target) {
            let card = `
            <div class="card text-black additional-work" style="padding: 25px;">
                <div class="d-flex align-items-center mb-4">
                    <i class="fas fa-tools fa-lg me-3 fa-fw"></i>
                    <select class="form-select"
                            onchange="addElementWork(this)" required>
                        <option value="0" selected disabled class="text-center">
                            -- Выберите категорию --
                        </option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ ucfirst($category->name) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex align-items-center mb-4">
                    <i class="fas fa-tools fa-lg me-3 fa-fw"></i>
                    <select class="form-select element-work" name="works[]">
                        <option class="text-center" value="0" selected disabled>
                            -- Выберите работу --
                        </option>
                    </select>
                </div>
                <button type="button" class="form-control" id="btnAddWork" onclick="removeCardWork(this)">
                    <i class="fas fa-minus fa-lg me-3 fa-fw"></i>
                    Удалить работу
                </button>
            </div>
            `;
            let btnAdd = `
               <div class="border mb-4 plus card-work">
                    <button type="button" class="form-control" id="btnAddWork" onclick="addCardWork(this)">
                        <i class="fas fa-plus fa-lg me-3 fa-fw"></i>
                        Добавить работу
                    </button>
                </div>`;
            target.disabled = true;
            target.closest('.card-work').insertAdjacentHTML('beforeend', card);
            target.closest('.card-work').insertAdjacentHTML('afterend', btnAdd);
        }

        async function addElementWork(target) {
            let response = await fetch(`/admin/orders/getWorks/${target.value}`);
            let works = await response.json();

            let elementWork = target.closest('.additional-work').querySelector('.element-work');
            fillElementWork(elementWork, works)
        }

        function fillElementWork(element, works) {
            element.innerHTML = '';
            works.forEach(item => {
                let option = document.createElement('option');
                option.value = item.id;
                option.textContent = item.name;
                element.append(option)
            });

        }

        function removeCardWork(target) {
            target.closest('.card-work').remove();
        }

        let status = document.querySelector('#status')
        status.addEventListener('change', function (e) {

            if (e.target.value == 3) {
                document.querySelector('.status').classList.remove('d-none');
            } else {
                document.querySelector('.status').classList.add('d-none');
            }
        });
    </script>
@endpush
