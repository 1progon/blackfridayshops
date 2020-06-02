@extends('layouts.layout')

@section('main')
    <h3>Популярные магазины</h3>

    <div class="d-flex flex-wrap">
        @forelse($topShops as $shop)
            @include('shop.card', $shop)
        @empty
        @endforelse
    </div>


    {{$topShops->links()}}
@endsection