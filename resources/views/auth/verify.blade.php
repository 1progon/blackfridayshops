@extends('layouts.layout')

@section('main')
    <div class="row justify-content-center my-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Подтвердить пароль</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">Новая ссылка была отправлена на Ваш e-mail</div>
                    @endif

                    До того как продолжить, пожалуйста, проверьте Ваш e-mail для ссылки подтверждения

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="post" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">Кликните здесь для отправки другого</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
