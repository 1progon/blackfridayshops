<a href="{{ route('front.shops.show', [$shop->slug])}}"
   class="col-6 col-sm-6 col-md-3 col-lg-2 my-card m-0 p-0 m-lg-1 p-lg-1"
   style="flex-grow: 1">
    <div>
        <img style="max-width: 100%" src="{{ $shop->adm_image}}" class="" alt="{{ $shop->name}}" width="143"
             height="59">
        <div class="py-2">
            <h5 style="word-break: break-all" class="card-title">{{ $shop->name}}</h5>
            <p class="card-text">{{ $shop->description}}</p>
        </div>
    </div>
</a>
