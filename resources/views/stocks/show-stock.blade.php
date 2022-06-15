@extends('layouts.app')
@section('title', 'show-stock')
@section('content')
    <div class="container py-3 mt-5">
        <div class="cardShow">
            <div class="row">
                <div class="col-md-7 px-3">
                    <div class="card-block-show px-6">
                        <h4 class="card-title">{{$stock->title}} от
                            {{ date('d.m.Y', strtotime($stock->start_date)) }}
                            до {{ date('d.m.Y', strtotime($stock->end_date)) }}</h4>

                        {{$stock->content}}
                        <p></p>
                        <br>
                        <a href="{{ route('stock.index') }}" class="btn btn-primary">Перейти к акциям</a>
                    </div>
                </div>

                <div class="col-md-5">
                    <img src="{{$stock->image_url}}" width="100%" height="auto">
                </div>

            </div>
        </div>
    </div>


@endsection
