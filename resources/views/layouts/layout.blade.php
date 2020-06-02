<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    @yield('head')


    <title>Главная страница магазинов</title>
</head>
<body style="overflow-y: hidden">


<div class="d-flex">
    <aside id="sidebar" class="col-12 col-md-2">
        @include('include.cats')
    </aside>

    <div class="col-12 col-md" style="max-height: 100vh; overflow-y: scroll">
        <header>
            @include('include.navbar')
        </header>

        @yield('bread')

        <main class="my-3">
            @yield('main')
        </main>

        <footer>
            @include('include.footer')
        </footer>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>


@yield('script')


</body>
</html>