

<a href="{{route('category', $cat->slug)}}">
    <div class="media my-2">
        <img src="{{$cat->logo}}" class="mr-3" alt="{{$cat->name}}">
        <div class="media-body">
            <h5 class="mt-0">{{$cat->name}}</h5>
            {{$cat->description}}
        </div>
    </div>
</a>
