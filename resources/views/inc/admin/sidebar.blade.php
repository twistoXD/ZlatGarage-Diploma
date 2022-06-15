<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse mt-lg-5">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('admin.users.index') }}">
                    <span>
                    Пользователи</span>
                </a>
                <a class="nav-link active" aria-current="page" href="{{ route('admin.stocks.index') }}">
                    <span>
                    Управление акциями</span>
                </a>
                <a class="nav-link active" aria-current="page" href="{{ route('admin.orders.index-admin') }}">
                    <span>
                    Управление заявками</span>
                </a>
                <a class="nav-link active" aria-current="page" href="{{ route('admin.categories.index') }}">
                    <span data-feather="home">
                    Управление категориями</span>
                </a>
                <a class="nav-link active" aria-current="page" href="{{ route('admin.works.index') }}">
                    <span data-feather="home">
                    Управление услугами</span>
                </a>
                <a class="nav-link active" aria-current="page" href="{{ route('admin.comments.index-admin') }}">
                    <span data-feather="home">
                    Управление отзывами</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

