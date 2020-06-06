@extends('layouts.layout')

@section('title', 'Все магазины список')

@section('main')

    @forelse($shops as $shop)
        @include('shop.card-media', ['category' => $shop->category, $shop])
    @empty
    @endforelse

    {{$shops->links()}}

@endsection
