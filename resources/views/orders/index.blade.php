@extends('layouts.app')
@section('title', 'orders-create')
@section('content')
    <div class="container orderIndex h-100 mt-lg-5">
        @include('inc.success')
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-12 col-xl-10">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Оформите заявку</p>

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
                                                <option value="0" selected disabled>--- Выберите марку машины ---</option>
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
                                            <select class="form-select @error('type') is-invalid @enderror" name="type" id="type">
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
