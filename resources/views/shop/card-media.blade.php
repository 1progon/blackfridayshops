
<a href="{{route('front.shops.show', [$shop->slug])}}">
    <div class="media my-2 align-items-center flex-wrap">
        <img src="{{ $shop->adm_image}}" class="mr-3" alt="{{ $shop->name}}">
        <div class="media-body">
            <h5 class="mt-0">{{ $shop->name}}</h5>
            {{ $shop->description}}
        </div>
    </div>
</a>



