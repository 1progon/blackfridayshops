<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Главная</a></li>

        @if(isset($shop))
            <li class="breadcrumb-item">
                <a href="{{route('category', $cat->slug)}}">{{$cat->name}}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{$shop->name}}</li>
        @elseif(isset($cat))
            <li class="breadcrumb-item active" aria-current="page">{{$cat->name}}</li>
        @endif


    </ol>
</nav>