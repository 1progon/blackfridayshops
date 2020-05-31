<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


    <title>Главная страница магазинов</title>
</head>
<body style="overflow-y: scroll">


<div class="row container-fluid">
    <aside class="col-12 col-md-2">@include('include.cats')</aside>

    <div class="col-12 col-md-9">
        <header>
            @include('include.navbar')

        </header>

        @yield('bread')




        <main>
            @yield('main')
        </main>

        <footer>
            @include('include.footer')
        </footer>
    </div>
</div>


</body>
</html>