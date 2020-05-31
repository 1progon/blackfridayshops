@extends('layouts.layout')

@section('bread')
    @include('include.breadcrumbs', ['cat' => $category])
@endsection

@section('main')
    @forelse($shops as $shop)
        @include('shop.card', [$category, $shop])
    @empty
        Не найдено магазинов в категории
    @endforelse

    {{$shops->links()}}
@endsection