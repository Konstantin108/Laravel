@extends('layouts.site-main')
@section('content')

    <div class="container" style="margin-top: 100px ">
        <h1>Здравствуйте, {{Auth::user()->name}}</h1>
        <br>
        <h2>Данные пользователя</h2>
        <br>
        <div style="display: flex">
            @if(Auth::user()->is_admin && Auth::user()->avatar)
                <img style="border-radius: 12px; max-width: 200px;" src="{{ Auth::user()->avatar }}" alt="avatar" style="max-width: 200px;">
                <br>
            @elseif(!Auth::user()->is_admin && Auth::user()->avatar)
                <img style="border-radius: 12px; max-width: 200px;" src="{{ \Storage::disk('public')->url(Auth::user()->avatar) }}" alt="avatar">
                <br>
            @else
                <img style="border-radius: 12px; max-width: 200px;" src="{{ asset('/assets/img/no_photo.jpg') }}" alt="avatar" style="max-width: 200px;">
                <br>
            @endif
        @if(session()->has('success'))
            <div style="margin-left: 12px; width: 220px; height: 40px;">
                <div class="alert alert-success">{{session()->get('success')}}</div>
            </div>
        @endif
        </div>
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
            <a href="{{ route('editProfile', ['id' => Auth::user()->id]) }}">Настройки профиля</a>
            <div style="height: 50px; width: 24px"></div>
            <a href="{{ route('logout') }}">Выход</a>
            <div style="height: 50px; width: 24px"></div>
        </div>
    </div>

@endsection
