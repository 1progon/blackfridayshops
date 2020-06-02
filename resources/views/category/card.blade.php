

<a href="{{route('category', $cat->slug)}}">
    <div class="media my-2 align-items-center">
        <img src="{{$cat->logo}}" class="mr-3" alt="{{$cat->name}}" width="143" height="59">
        <div class="media-body">
            <h5 class="mt-0">{{$cat->name}}</h5>
            {{$cat->description}}
        </div>
    </div>
</a>
