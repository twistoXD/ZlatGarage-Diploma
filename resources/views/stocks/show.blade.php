@extends('layouts.admin')
@section('content')

    <div class="jumbotron bg-light px-5 py-3 my-3">
        <h6 class="display-6">{{$stock->title}} от {{ date('d.m.Y', strtotime($stock->start_date)) }}</h6>
    </div>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{$stock->image_url}}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <p>{{$stock->content}}</p>

                    <div class="text-end pt-5">
                        @canany(['edit-stock','delete-stock'], $stock)
                            <a href="{{route('admin.stocks.edit', $stock)}}" class="btn btn-warning">Изменить</a>
                            <button type="button" class="btn btn-danger"
                                    id="deleteStock" data-bs-toggle="modal" data-bs-target="#modalDestroy">Удалить
                            </button>
                            <p class="card-text"><small class="text-muted"></small></p>
                        @endcanany
                    </div>
                </div>
                <div class="card-footer">
                    Дата окончания акции {{ date('d.m.Y', strtotime($stock->end_date)) }}
                </div>

            </div>
        </div>
    </div>
    @include('inc.modal-destroy-stock')
@endsection

