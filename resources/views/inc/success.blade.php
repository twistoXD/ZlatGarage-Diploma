@if ($message = session()->get('success'))
    <div class="alert alert-success alert-dismissible fade show m-4" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert"
                aria-label="Close"></button>
    </div>
@endif

