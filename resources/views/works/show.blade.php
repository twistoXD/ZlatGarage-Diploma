@extends('layouts.app')
@section('title', 'work-price')
@section('content')
    <div class="container mt-5">
        <div class="d-grid justify-content-center align-items-center">
            <h2 class="mt-5">Выберите категорию работ:</h2>
        </div>
        <div class="d-grid  justify-content-center align-items-center">
            <form method="GET" class="d-flex" action="{{ route('work.show') }}">
                @csrf
                <select class="form-select" name="category">
                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}" {{ old('category') && old('category') == $category->id ? 'selected':''}}>{{ $category->name }}</option>
                    @endforeach

                </select>
                <button type="submit" class="btn btn-dark m-2">Найти</button>
            </form>
        </div>
    </div>

    <div class="container-sm">
        <table class="table mt-5">
            <thead>
            <tr>
                <th scope="col">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Услуга</span>
                    </div>
                </th>
                <th scope="col">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Цена за работу</span>
                    </div>
                </th>
            </tr>
            </thead>
            <tbody id="tablePrice">
            @foreach($works as $work)
                <tr class="about-work" data-work="{{$work}}" data-toggle="modal"
                    data-target="#exampleModalCenter">
                    <td>{{$work->name }}</td>
                    <td>{{$work->price}} ₽</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @include('inc.modal-show-work')
@endsection
@push('script')
    <script type="text/javascript">
        function showModal(work) {
            $('#exampleModalLongTitle').text(work.name);
            str = '';
            $('.modal-price').html('Цена: ' + work.price + '₽');
            $('.modal-workId').html(`<input type=hidden name="workId" value="${work.id}" />`)
            $('.modal-img').attr('src', "{{asset('/storage/')}}" + '/' + work.image);
        }

        $('.about-work').click(function () {
            showModal(JSON.parse(this.dataset.work));
            $('#myModal').modal('show')

        });
        $('.close').click(function () {
            $('#myModal').modal('hide');
        });
    </script>
@endpush
