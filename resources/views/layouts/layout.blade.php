<!doctype html>
<html lang="ru">
<head>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
{{--            <script src="https://cdn.jsdelivr.net/npm/vue"></script>--}}


    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet"
          href="{{ asset('css/bootstrap.min.css') }}"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
          crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <title>@yield('title') | BlackFridayShops</title>

    <link rel="canonical" href="{{ secure_url('') }}/@yield('canonical_relative')"/>

    <meta name="description" content="@yield('meta_description')"/>
    <meta name="keywords" content="@yield('meta_keywords')"/>

    <meta name="google-site-verification" content="2uHOYJTZPbxvRo7fhHhtH0T3GouODLIooy2QZBKyx4g"/>
    <meta name="yandex-verification" content="f7b3d5353692cbf7"/>

    @yield('head')

</head>
<body style="overflow-y: scroll">

<div id="whole-page">
    <header class="bg-dark">
        @include('include.navbar')
    </header>

    <div id="wrapper" class="d-flex flex-wrap">


        {{--Mobile show category button--}}
        <button @click="(showCats = !showCats);scrollToActiveCategory()"
                id="show-sidebar-btn"
                type="button"
                class="btn btn-primary m-2 btn-block">
            Категории
            <img v-if="showCats" src="{{ asset('imgs/down-chevron.svg') }}" alt="" width="16" height="16">
            <img v-else src="{{ asset('imgs/up-chevron.svg') }}" alt="" width="16" height="16">
        </button>

        <aside v-bind:style="showCats ? 'display: unset' : ''" id="sidebar" class="col-12 col-sm-2 p-0">
            @include('include.cats')
        </aside>


        <main class="col-12 col-sm p-0 mt-3 mt-sm-0">
            <div v-if="showAddForm">
                @include('include.add-site')
            </div>
            @yield('bread')
            <div class="main-content">@yield('main')</div>

            <footer>
                @include('include.footer')
            </footer>
        </main>


    </div>
</div>


<script src="{{ asset('js/whole-page.js') }}"></script>


@yield('script')

@include('include.counters')
</body>
</html>
