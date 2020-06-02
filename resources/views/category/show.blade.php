@extends('layouts.layout')

@section('bread')
    @include('include.breadcrumbs', ['cat' => $category, 'subCat' => $subCategory])
@endsection

@section('main')
    @forelse($shops as $shop)
        @include('shop.card-media', [$category, $subCategory, $shop])
    @empty
        Не найдено магазинов в категории
    @endforelse

    {{$shops->links()}}
@endsection