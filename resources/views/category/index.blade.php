@extends('layouts.layout')

@section('title', 'Список категорий магазинов')

@section('main')
    @forelse($cats->sortBy('position') as $cat)
        @include('category.card', $cat)

    @empty
    @endforelse

    {{$cats->links()}}

@endsection
