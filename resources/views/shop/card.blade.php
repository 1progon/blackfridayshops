<div class="card m-2 col-12 col-md-2">
    <img src="{{$shop->adm_image}}" class="" alt="{{$shop->name}}" width="143" height="59">
    <div class="card-body">
        <h5 class="card-title">{{$shop->name}}</h5>
        <p class="card-text">{{$shop->description}}</p>
        <a href="{{route('shop', [$shop->slug])}}" class="btn btn-primary">{{$shop->name}}</a>
    </div>
</div>