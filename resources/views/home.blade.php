@extends('layouts.layout')

@section('title', 'Популярные магазины')

@section('main')

    <div class="d-flex flex-wrap">
        @forelse($mainCats as $mainCat)
            <a class="badge badge-secondary p-2 m-1" href="{{route('category', $mainCat->slug)}}">{{$mainCat->name}}</a>
        @empty
        @endforelse
    </div>


    <h3 class="m-1">Популярные магазины</h3>
    <div class="d-flex flex-wrap">
        @forelse($topShops as $shop)
            @include('shop.card', $shop)
        @empty
        @endforelse
    </div>


    {{$topShops->links()}}
@endsection
