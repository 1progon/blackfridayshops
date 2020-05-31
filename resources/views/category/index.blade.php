@extends('layouts.layout')

@section('main')
    @forelse($cats as $cat)
        @include('category.card', $cat)

    @empty
    @endforelse

    {{$cats->links()}}

@endsection