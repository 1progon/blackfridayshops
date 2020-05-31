<a href="{{route('shop', [$category->slug, $shop->slug])}}">
    <div class="media my-2">
        <img src="{{$shop->logo}}" class="mr-3" alt="{{$shop->name}}">
        <div class="media-body">
            <h5 class="mt-0">{{$shop->name}}</h5>
            {{$shop->description}}
        </div>
    </div>
</a>
