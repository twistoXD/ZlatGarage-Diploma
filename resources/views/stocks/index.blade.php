@extends('layouts.admin')
@section('content')
    @include('inc.success')


    <div class="d-flex justify-content-between align-items-start m-4">
        <a href="{{ route('admin.stocks.create') }}" class="btn btn-outline-dark">
            Добавить акцию
        </a>
    </div>

    <div class="d-grid  justify-content-center align-items-center">
        <form class="d-flex" action="{{ route('admin.stocks.valid') }}" method="get">
            @csrf
            <select class="form-select" name="stock">
                @foreach(['0' => ' Действующие акции' , '1' => 'Недействительные акции'] as $key=>$value)
                <option value="{{ $key }}" {{ old('stock') && old('stock') == $key ? 'selected' : '' }}>{{$value}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-lg btn-dark m-2">Найти</button>
        </form>
    </div>
    @if(count($stocks)>0)
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-3 pt-5">
            @foreach($stocks as $stock)
                @include('inc.stock')
            @endforeach
        </div>
    @else
        <p>Список акций пока пуст...</p>
    @endif
@endsection

