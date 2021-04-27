@extends('layouts.site-main')
@section('content')

    <div class="container" style="margin-top: 100px ">
        <h1>Здравствуйте, {{Auth::user()->name}}</h1>
        <br>
        <h2>Данные пользователя</h2>
        <br>
        <p>Имя пользователя</p>
        <h3>{{Auth::user()->name}}</h3>
        <br>
        <p>E-Mail адрес</p>
        <h3>{{Auth::user()->email}}</h3>
        <br>
        <p>Дата регистрации на сайте</p>
        <h3>{{Auth::user()->created_at}}</h3>
        <br>
        <p>Дата последнего обновления профиля</p>
        <h3>{{Auth::user()->updated_at}}</h3>
        <br>
        <div style="display: flex">
            @if($isAdmin)
            <a href='{{route('admin.news.index')}}'>Перейти в админку</a>
                <div style="height: 50px; width: 24px"></div>
            @endif
            <a href="{{route('logout')}}">Выход</a>
                <div style="height: 50px; width: 24px"></div>
        </div>
    </div>

@endsection
