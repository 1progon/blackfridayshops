@extends('layouts.layout')

@section('title', 'Список категорий магазинов')
@section('canonical_relative', 'categories')

@section('main')
    @forelse( $cats->sortBy('position') as $cat )
        @include('category.card', $cat)

    @empty
    @endforelse

    {{ $cats->links() }}

@endsection
