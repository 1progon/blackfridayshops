@php
    use App\Http\Controllers\CategoriesController;

    $cats = (new CategoriesController())->index(true)->sortBy('position');
@endphp

<div class="my-2">
    <div class="d-flex list-group rounded-0" style="max-height: 100vh; overflow-y: scroll">
        @forelse($cats as $cat)
            <a class="list-group-item list-group-item-dark list-group-item-action font-weight-bold {{url()
            ->current()
             == route
            ('category', $cat->slug)
            ?'active': ''}}"
               href="{{route('category', [$cat->slug])}}">{{$cat->name}}</a>
            <div class="d-flex flex-wrap rounded-0 ">
                @forelse($cat->subCategories as $subCat)
                    <a class="list-group-item list-group-item-secondary list-group-item-action py-0
{{url()->current() == route('category',[$cat->slug, $subCat->slug]) ?'active': ''}}"
                       href="{{route('category',[$cat->slug, $subCat->slug])}}">
                        {{$subCat->name}}
                    </a>
                @empty
                @endforelse
            </div>


        @empty
        @endforelse

    </div>
</div>
