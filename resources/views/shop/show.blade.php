@extends('layouts.layout')

@section('bread')
    @include('include.breadcrumbs', ['cat' => $shop->category, 'shop' => $shop])
@endsection

@section('main')



{{$shop->name}}

@endsection