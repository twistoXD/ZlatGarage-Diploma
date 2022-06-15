<div class="col">
    <div class="card h-100">
        <div class="card-header">
            {{ $category->name }}
        </div>
        <img src="{{ $category->image_url }}" class="card-img-top" style="height: 350px" alt="{{ $category->image }}">
        <div class="card-body d-flex flex-column justify-content-between">
            <p class="card-text">{{ $category->short_content }}</p>
            <a href="{{ route("admin.categories.show", $category->id) }}" class="btn btn-outline-dark">Подробнее</a>
        </div>
    </div>
</div>

