<nav aria-label="breadcrumb" class="mx-1 my-1">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Главная</a></li>

        @if(isset($shop))

            <li class="breadcrumb-item">
                <a href="{{route('category', $shop->categories()->first()->slug)}}">{{ $shop->categories()->first()
                ->name}}</a>
            </li>

            @if( $shop->subCategories()->first())
                <li class="breadcrumb-item">
                    <a href="{{ route('category', [$shop->categories()->first()->slug, $shop->subCategories()->first()
                    ->slug])
                    }}">{{ $shop->subCategories()
                    ->first()
                    ->name}}</a>
                </li>
            @endif

            <li class="breadcrumb-item active" aria-current="page">{{ $shop->name}}</li>


        @elseif(isset($cat))

            @if(isset($subCat))
                <li class="breadcrumb-item">
                    <a href="{{ route('category', $cat->slug)}}">{{ $cat->name}}</a>
                </li>

                <li class="breadcrumb-item active" aria-current="page">{{ $subCat->name}}</li>
            @else
                <li class="breadcrumb-item active" aria-current="page">{{ $cat->name}}</li>
            @endif


        @endif


    </ol>
</nav>
