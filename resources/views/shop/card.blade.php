<a href="{{route('shop', [$shop->slug])}}"
   class="col-12 col-md-2 my-card m-1"
   style="flex-grow: 1">
    <div>
        <img src="{{$shop->adm_image}}" class="" alt="{{$shop->name}}" width="143" height="59">
        <div class="card-body">
            <h5 class="card-title">{{$shop->name}}</h5>
            <p class="card-text">{{$shop->description}}</p>
        </div>
    </div>
</a>
