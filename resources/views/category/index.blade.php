@extends('layouts.layout')

@section('main')
    @forelse($cats->sortBy('position') as $cat)
        @include('category.card', $cat)

    @empty
    @endforelse

    {{$cats->links()}}

@endsection