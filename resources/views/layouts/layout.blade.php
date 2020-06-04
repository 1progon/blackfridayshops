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
<body style="overflow-y: scroll">


<header class="bg-dark">
    @include('include.navbar')
</header>

<div id="wrapper" class="d-flex flex-wrap">

    <aside id="sidebar" class="col-12 col-sm-2 p-0">
        @include('include.cats')
    </aside>


    <main class="my-3 col-sm">
        @yield('bread')
        @yield('main')

        <footer>
            @include('include.footer')
        </footer>
    </main>


</div>




<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>


@yield('script')


</body>
</html>