<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}"><img class="logoAdmin" src="{{ asset('storage/admin.png') }}"
                                                                    alt="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active text-danger" aria-current="page" href="{{ Route('admin.dashboard') }}">Админ панель</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.users.index') }}">Пользователи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.stocks.index') }}">Акции</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.orders.index-admin') }}">Заявки</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.categories.index') }}">Категории</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.works.index') }}">Услуги</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.comments.index-admin') }}">Отзывы</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <a class="nav-link px-3 text-white" href="{{ route('admin.logout-admin') }}">Выйти с админ панели</a>
                </form>

            </div>
        </div>
    </nav>
</header>
