<nav class="navbar navbar-expand navbar-dark bg-dark justify-content-between flex-wrap">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="/" class="nav-link">Главная</a>
        </li>

        <li class="nav-item">
            <a href="/categories" class="nav-link">Категории</a>
        </li>

        <li class="nav-item">
            <a href="/shops" class="nav-link">Все магазины</a>
        </li>

        <li class="nav-item">
            <a @click.prevent="addShop" href="#" class="nav-link add-shop-button">Добавить свой</a>
        </li>
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
