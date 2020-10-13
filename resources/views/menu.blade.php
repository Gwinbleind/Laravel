<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="/">Главная</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ request()->routeIs('about')?'active':'' }}">
                    <a class="nav-link" href="{{route('about')}}">О наc</a>
                </li>
                <li class="nav-item {{ request()->routeIs('news.all')?'active':'' }}">
                    <a class="nav-link" href="{{route('news.all')}}">Новости</a>
                </li>
                <li class="nav-item {{ request()->routeIs('news.categories')?'active':'' }}">
                    <a class="nav-link" href="{{route('news.categories')}}">Категории новостей</a>
                </li>
                <li class="nav-item {{ request()->routeIs('vue')?'active':'' }}">
                    <a class="nav-link" href="{{route('vue')}}">Vue</a>
                </li>
                <li class="nav-item {{ request()->routeIs('auth')?'active':'' }}">
                    <a class="nav-link" href="{{route('auth')}}">Войти</a>
                </li>
            </ul>
{{--            <form class="form-inline mt-2 mt-md-0">--}}
{{--                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">--}}
{{--                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
{{--            </form>--}}
        </div>
    </nav>
</header>
