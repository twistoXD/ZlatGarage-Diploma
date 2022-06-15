 <div class="col">
        <div class="card h-100">
            <div class="card-header">
                {{ $stock->title }} от {{ date('d.m.Y', strtotime($stock->start_date)) }}
            </div>
            <img src="{{ $stock->image_url }}" class="card-img-top" style="height: 350px" alt="{{ $stock->image }}">
            <div class="card-body d-flex flex-column justify-content-between">

                <p class="card-text">{{ $stock->short_content }}</p>
                <a href="{{ route("admin.stocks.show", $stock->id) }}" class="btn btn-outline-dark">Подробнее</a>
            </div>
            <div class="card-footer">
                Действительна до {{ date('d.m.Y', strtotime($stock->end_date)) }}
            </div>
        </div>
 </div>
