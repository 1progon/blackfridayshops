@php
    use App\Http\Controllers\CategoriesController;

    $cats = (new CategoriesController())->index(true);
@endphp

<div class="container my-2">
    <div class="d-flex flex-wrap list-group">
        @forelse($cats as $cat)
            <a class="list-group-item list-group-item-action {{url()->current() == route('category', $cat->slug) ?'active': ''}}"
               href="{{route('category', [$cat->slug])}}">{{$cat->name}}</a>
        @empty
        @endforelse

    </div>
</div>
