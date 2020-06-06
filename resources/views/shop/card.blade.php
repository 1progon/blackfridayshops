<a href="{{route('shop', [$shop->slug])}}"
   class="col-6 col-md-2 my-card m-0 m-sm-1 p-1"
   style="flex-grow: 1">
    <div>
        <img src="{{$shop->adm_image}}" class="" alt="{{$shop->name}}" width="143" height="59">
        <div class="py-2">
            <h5 style="word-break: break-all" class="card-title">{{$shop->name}}</h5>
            <p class="card-text">{{$shop->description}}</p>
        </div>
    </div>
</a>
