@extends('layouts.layout')

@section('main')
    <div class="container">
        <h2>Контакты</h2>

        @if( session('sendMessageStatus'))
            <div class="alert alert-success">
                {{ session('sendMessageStatus') }}
            </div>
        @endif

        <form action="{{ route('page.contact.send') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Имя</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Имя" required>
            </div>

            <div class="form-group">
                <label for="email">Ваш E-mail</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="E-mail" required>
            </div>

            <div class="form-group">
                <label for="subject">Тема сообщения</label>
                <input class="form-control" type="text" name="subject" id="subject" placeholder="Тема сообщения"
                       required>
            </div>

            <div class="form-group">
                <label for="textMessage">Текст сообщения</label>
                <textarea class="form-control"
                          name="textMessage"
                          id="textMessage"
                          rows="7"
                          placeholder="Текст сообщения"
                          required></textarea>
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Отправить сообщение</button>
            </div>
        </form>
    </div>
@endsection
