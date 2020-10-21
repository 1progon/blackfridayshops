@extends('layouts.layout')

@section('title', 'Магазин - ' . $shop->name)

@section('canonical_relative', $shop->slug)

@section('bread')
    @include('include.breadcrumbs', ['shop' => $shop])
@endsection

@section('meta_description', 'Магазин товаров - ' . $shop->name . ', ' . $shop->description)
@section('meta_keywords', $shop->name . ', ' . $shop->slug . ', магазин, интернет магазин, онлайн магазин, из 
каталога магазинов, товары в магазине ' . $shop->name)

@section('head')
    <script data-ad-client="ca-pub-8481515375748477"
            async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
@endsection

@section('script')
    <script>
        let link = document.getElementById('linkToShop');

        function changeLink() {
            link.href = "{{ $shop->adm_gotolink}}";
            setTimeout(() => {
                link.href = 'javascript:void(0)';
            }, 0);
        }

        link.addEventListener('click', changeLink);
    </script>
@endsection

@section('main')
    <div class="p-2">
        <div>
            <h1 class="h1">{{$shop->name}}</h1>
            <img src="{{$shop->adm_image}}" alt="" width="143" height="59">
            <p>{{$shop->description}}</p>


            <div class="my-3">
                <img src="https://image.flaticon.com/icons/svg/2977/2977681.svg" alt="иконка рейтинга магазина"
                     width="59" height="59">
                {{ $shop->rating > 0 ? $shop->rating : 'Не определён'}}
            </div>

            <div class="my-3">
                <img src="https://image.flaticon.com/icons/svg/126/126509.svg" alt="телефонный аппарат иконка"
                     width="59" height="59">
                {{ $shop->phone ? $shop->phone : 'Не указан'}}
            </div>


            <div class="my-3">
                <img src="https://image.flaticon.com/icons/svg/1150/1150575.svg" width="59" height="59" alt="">
                {{$shop->website}}
            </div>

            <a id="linkToShop"
               rel="nofollow noopener"
               target="_blank"
               href="javascript:void(0)"
               class="btn btn-primary my-3">
                Открыть сайт {{$shop->name}}
            </a>

            <div class="d-flex flex-wrap bg-light my-4 py-2">
                <div class="col-12 col-sm-6 col-md-3 col-lg-2 font-weight-bold">Представлен в категориях:</div>

                <div class="col-12 col-sm d-flex flex-column">
                    @forelse( $cats as $cat )
                        <a href="{{ route('category', $cat )}}">{{ $cat->name}}</a>
                    @empty
                    @endforelse


                    @forelse( $subCats as $subCat)
                        <a href="{{ route('category', [$cat, $subCat]) }}">{{ $subCat->name }}</a>
                    @empty
                    @endforelse
                </div>

            </div>
        </div>


        <div class="dropdown-divider"></div>


        <div>
            <h3>Отзывы</h3>


            Нет отзывов

        </div>

        <div>
            <h4>Оставить отзыв</h4>
            <form action="/review" method="post" class="col-12 col-md-6">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="">
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" id="" class="form-control" placeholder="">
                </div>

                <div class="form-group">
                    <label for="text">Текст отзыва</label>
                    <textarea class="form-control" name="text" id="" rows="3"></textarea>
                </div>


                <div class="form-group">
                    <input type="button" class="form-control btn btn-primary" placeholder="" value="Отправить">
                </div>
            </form>

        </div>
    </div>


@endsection
