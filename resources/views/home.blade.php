@extends('layouts.layout')

@section('main')
    <h3>Популярные магазины</h3>

    @forelse($topShops as $shop)
        @include('shop.card', ['category' => $shop->category, $shop])


    @empty
    @endforelse


    {{$topShops->links()}}
@endsection