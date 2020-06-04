@extends('layouts.layout')

@section('bread')
    @include('include.breadcrumbs', ['shop' => $shop])
@endsection

@section('script')
    <script>
        let link = document.getElementById('linkToShop');

        function changeLink() {
            link.href = "{{$shop->adm_gotolink}}";
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


            <div>
                <img src="https://image.flaticon.com/icons/svg/1150/1150575.svg" width="59" height="59" alt="">
                {{$shop->website}}
            </div>

            <a id="linkToShop"
               rel="nofollow noopener"
               target="_blank"
               href="javascript:void(0)"
               class="btn btn-primary">Открыть сайт {{$shop->name}}
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


                <div class="form-group">
                    <input type="button" class="form-control btn btn-primary" placeholder="" value="Отправить">
                </div>
            </form>

        </div>
    </div>


@endsection