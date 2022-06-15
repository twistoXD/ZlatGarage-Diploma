@extends('layouts.app')
@section('title','stock')
@section('content')
    <div class="container">
        <div class="mt-5"> {{ $stocks->onEachSide(1)->links() }}</div>
        @if(count($stocks)>0)
            <main>
                <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">

                    <div
                        class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-3 g-3 justify-content-center align-content-center">
                        @foreach($stocks as $stock)
                            <div class="col">
                                <div class="card h-100 shadow-sm">
                                    <img src="{{ $stock->image_url }}" alt="{{ $stock->image }}"
                                         class="card-img-stock"/>
                                    <div class="card-body">
                                        <div class="clearfix mb-3"><span
                                                class="float-start badge rounded-pill bg-primary">от {{ date('d.m.Y', strtotime($stock->start_date)) }}</span>
                                            <span
                                                class="float-end badge rounded-pill bg-primary">до {{ date('d.m.Y', strtotime($stock->end_date)) }}</span>
                                        </div>
                                        <h5 class="card-title text-center">{{ $stock->title }}</h5>
                                        <div class="card-text text-center">
                                            {{ $stock->short_content }}
                                        </div>

                                    </div>
                                    <div class="text-center my-3"><a
                                            href="{{ Route('stock.show-stock', $stock->id) }}"
                                            class="btn btn-primary">Читать подробнее</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </main>
        @else
            <h5 class="text-center mt-lg-5">Список акций пока пуст...</h5>
        @endif
    </div>
@endsection

