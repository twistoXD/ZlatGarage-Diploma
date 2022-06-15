<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}"><img class="logo" src="{{ asset('storage/logo.png') }}"
                                                                    alt="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('category.index') }}">Услуги</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('stock.index') }}">Акции</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('comments.index') }}">Отзывы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">О нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('how-order') }}">Как оформить заявку?</a>
                    </li>
                </ul>

            </div>

            <span class="phone-org text-white m-3"><i class="fa fa-phone"></i><a href="tel:+79124700257"
                                                                                 class="text-decoration-none text-white"> +7 (912) 470 0257</a></span>

            <form>
                <div class="search-box">
                    <input type="search" class="search-txt" placeholder="Поиск.." name="search" aria-label="search"
                           value="{{ request('search') }}">
                    <a href="#" class="search-btn">
                        <i class="fas fa-search" aria-hidden="true"></i>
                    </a>
                </div>
            </form>

            @guest
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <a class="btn btn-outline-light me-2 m-1" href="{{ route('login') }}">Войти</a>
                    @endguest
                    @auth
                        <a href="{{route('profile')}}" class="nav-link px-2 text-white">
                            {{Auth::user()->name}}
                        </a>
                        <a class="btn btn-outline-light me-2" href="{{route('logout')}}">Выйти</a>
                </ul>
            @endauth
        </div>
    </nav>
</header>

