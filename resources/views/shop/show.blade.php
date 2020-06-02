@extends('layouts.layout')

@section('bread')
    @include('include.breadcrumbs', ['shop' => $shop])
@endsection

@section('main')


    {{$shop->name}}

@endsection