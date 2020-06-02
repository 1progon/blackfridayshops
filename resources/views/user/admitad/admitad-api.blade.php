@extends('layouts.layout')

@section('main')
    <div id="app">
        <button type="button" v-on:click="getCats()" class="btn btn-danger">Получить категории</button>
        <div id="cats">
            <div v-if="isShow" class="spinner-border text-primary" role="status">
                <span class="sr-only">Загрузка...</span>
            </div>

            <div v-for="cat in cats">
                @{{ cat.name }}
            </div>

        </div>
    </div>
@endsection



@section('script')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="{{asset('js/my-vue.js')}}"></script>
@endsection

