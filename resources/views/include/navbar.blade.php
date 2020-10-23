<nav class="navbar navbar-expand navbar-dark bg-dark justify-content-between">
    <ul class="navbar-nav flex-wrap">
        <li class="nav-item">
            <a href="/" class="nav-link">Главная</a>
        </li>

        <li class="nav-item">
            <a href="{{ route('front.categories.index') }}" class="nav-link">Категории</a>
        </li>

        <li class="nav-item">
            <a href="{{ route('front.shops.index') }}" class="nav-link">Все магазины</a>
        </li>


        @auth
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="btn btn-primary mx-1">Аккаунт</a>
            </li>

            <li class="nav-item">
                <form id="logout-form" action="{{ route('logout') }}" method="post">
                    @csrf
                </form>
                <input class="btn btn-danger mx-1" type="submit" value="Выйти"
                       form="logout-form">
            </li>
        @else
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">Войти</a>
            </li>

            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">Регистрация</a>
            </li>
        @endauth



        {{--        <li class="nav-item">--}}
        {{--            <a @click.prevent="addShop" href="#" class="nav-link add-shop-button">Добавить свой</a>--}}
        {{--        </li>--}}
    </ul>


    <div>
        {{--        @guest--}}
        {{--            <a class="btn btn-light" href="/login">Логин</a>--}}
        {{--            <a class="btn btn-light" href="/register">Регистрация</a>--}}
        {{--        @else--}}
        {{--            <a class="btn btn-light" href="/home">Аккаунт</a>--}}
        {{--            <input class="btn btn-light" type="submit" name="" id="" value="Выйти" form="logout">--}}

        {{--            <form id="logout" action="/logout" method="post">--}}
        {{--                @csrf--}}
        {{--            </form>--}}
        {{--        @endguest--}}
    </div>
</nav>
