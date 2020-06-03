@extends('layouts.layout')

@section('bread')
    @include('include.breadcrumbs', ['shop' => $shop])
@endsection

@section('script')
    <script>
        let link = document.getElementById('linkToShop');
        link.addEventListener('click', function (e) {
            e.preventDefault();
            window.open('{{$shop->adm_gotolink}}', '_blank');
        });
    </script>
@endsection

@section('main')
    <div class="p-2">
        <div>
            <img src="{{$shop->adm_image}}" alt="" width="143" height="59">
            <h1 class="h1">{{$shop->name}}</h1>
            <p>{{$shop->description}}</p>

            <a id="linkToShop"
               rel="nofollow noopener"
               target="_blank"
               href="{{$shop->slug}}"
               class="btn btn-primary">Открыть {{$shop->name}}
            </a>
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
            </form>

        </div>
    </div>


@endsection