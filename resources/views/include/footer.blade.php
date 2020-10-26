<div class="bg-dark text-light">
    <div class="container">
        <div class="row py-3">
            <div class="col-12 col-md-4 mb-2 mb-sm-0">
                <div><a href="{{ route('page.about') }}">О сайте</a></div>
                <div><a href="{{ route('page.contact') }}">Контакты</a></div>
{{--                @auth--}}

{{--                    <input class="btn btn-link" type="submit" name="" id="" value="Выйти" form="logout">--}}

{{--                    <form id="logout" action="/logout" method="post">--}}
{{--                        @csrf--}}
{{--                    </form>--}}

{{--                    <div><a href="/home">Аккаунт</a></div>--}}
{{--                @else--}}
{{--                    <div><a href="/login">Вход</a></div>--}}
{{--                    <div><a href="/register">Регистрация</a></div>--}}
{{--                @endauth--}}

            </div>

            <div class="col-12 col-md-4 mb-2 mb-sm-0">
                <div><a href="/">Популярные магазины</a></div>
                <div><a href="{{ route('front.shops.index') }}">Все магазины</a></div>
                <div><a href="{{ route('front.categories.index') }}">Главные категории</a></div>
                <div></div>
            </div>

            <div class="col-12 col-md-4 mb-2 mb-sm-0">
                <div>Купоны</div>
                <div>Кешбек</div>

                <div><a href="/blog">Блог</a></div>

            </div>
        </div>
    </div>
</div>
