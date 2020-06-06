@extends('layouts.layout')

@section('title', $category->name .  (isset($subCategory->name) ? ', ' . $subCategory->name : '') )

@section('bread')
    @include('include.breadcrumbs', ['cat' => $category, 'subCat' => $subCategory])
@endsection

@section('main')
    <div class="p-2">

        @if(!isset($subCategory))
            <div class="mb-3 d-flex flex-wrap justify-content-between">
                @forelse($category->subCategories as $subCat)
                    <a class="badge badge-secondary my-1 p-1"
                       href="{{route('category', [$category->slug, $subCat->slug])}}">
                        {{$subCat->name}}
                    </a>

                @empty
                @endforelse
            </div>
            <div class="dropdown-divider"></div>
        @endif


        @forelse($shops as $shop)
            @include('shop.card-media', [$category, $subCategory, $shop])
        @empty
            Не найдено магазинов в категории
        @endforelse

        {{$shops->links()}}

        @if(isset($subCategory))

            <p>{{$subCategory->description}}</p>
        @else
            <p>{{$category->description}}</p>
        @endif
    </div>
@endsection


