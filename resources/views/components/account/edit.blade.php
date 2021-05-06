@extends('layouts.site-main')
@section('content')

    <div class="container" style="margin-top: 100px ">
        <h2>Настройки профиля</h2>
        <form method="post"
              action="{{ route('profile.update', ['profile' => $user, 'id' => $user->id]) }}"
              enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')
            <br>
            @if(Auth::user()->is_admin && Auth::user()->avatar)
                <img style="border-radius: 12px; max-width: 200px;"
                     src="{{ Auth::user()->avatar }}"
                     alt="avatar"
                >
                <br>
            @elseif(!Auth::user()->is_admin && Auth::user()->avatar)
                <img style="border-radius: 12px; max-width: 200px;"
                     src="{{ \Storage::disk('public')->url($user->avatar) }}"
                     alt="avatar"
                >
                <br>
            @else
                <img style="border-radius: 12px; max-width: 200px;"
                     src="{{ asset('/assets/img/no_photo.jpg') }}"
                     alt="avatar"
                >
                <br>
            @endif
            <br>
            <input type="file" id="avatar" name="avatar" class="form-control" style="width: 360px">
            <br>
            <div class="form-group">
                <label for="name">Имя пользователя</label>
                <input type="text"
                       style="width: 360px"
                       id="name"
                       name="name"
                       class="form-control"
                       value="{{$user->name}}">
                @if($errors->has('name'))
                    @foreach($errors->get('name') as $error)
                        <p style="color: red">{{ $error }}</p>
                    @endforeach
                @endif
            </div>
            <br>
            <div class="form-group">
                <label for="email">E-Mail адрес</label>
                <input type="text"
                       style="width: 360px"
                       id="email"
                       name="email"
                       class="form-control"
                       value="{{$user->email}}">
                @if($errors->has('email'))
                    @foreach($errors->get('email') as $error)
                        <p style="color: red">{{ $error }}</p>
                    @endforeach
                @endif
            </div>
            <br>

            <input type="hidden"
                   style="width: 360px"
                   id="email_verified_at"
                   name="email_verified_at"
                   class="form-control"
                   value="2021-05-06 00:08:40">
            @if($errors->has('email_verified_at'))
                @foreach($errors->get('email_verified_at') as $error)
                    <p style="color: red">{{ $error }}</p>
                @endforeach
            @endif
            <input type="hidden"
                   style="width: 360px"
                   id="password"
                   name="password"
                   class="form-control"
                   value="{{$user->password}}">
            @if($errors->has('password'))
                @foreach($errors->get('password') as $error)
                    <p style="color: red">{{ $error }}</p>
                @endforeach
            @endif
            <input type="hidden"
                   style="width: 360px"
                   id="remember_token"
                   name="remember_token"
                   class="form-control"
                   value="UK9O9JxCZn9fk0TuG2VKGNK9VoAYfRaVkdSvQlxYT9">
            @if($errors->has('remember_token'))
                @foreach($errors->get('remember_token') as $error)
                    <p style="color: red">{{ $error }}</p>
                @endforeach
            @endif
            <input type="hidden"
                   style="width: 360px"
                   id="created_at"
                   name="created_at"
                   class="form-control"
                   value="{{$user->created_at}}">
            @if($errors->has('created_at'))
                @foreach($errors->get('created_at') as $error)
                    <p style="color: red">{{ $error }}</p>
                @endforeach
            @endif
            <input type="hidden"
                   style="width: 360px"
                   id="updated_at"
                   name="updated_at"
                   class="form-control"
                   value="{{$user->updated_at}}">
            @if($errors->has('updated_at'))
                @foreach($errors->get('updated_at') as $error)
                    <p style="color: red">{{ $error }}</p>
                @endforeach
            @endif
            <input type="hidden"
                   style="width: 360px"
                   id="is_admin"
                   name="is_admin"
                   class="form-control"
                   value="{{ $user->is_admin }}">
            @if($errors->has('is_admin'))
                @foreach($errors->get('is_admin') as $error)
                    <p style="color: red">{{ $error }}</p>
                @endforeach
            @endif
            <input type="hidden"
                   style="width: 360px"
                   id="last_login"
                   name="last_login"
                   class="form-control"
                   value="2021-05-05 21:07:49">
            @if($errors->has('last_login'))
                @foreach($errors->get('last_login') as $error)
                    <p style="color: red">{{ $error }}</p>
                @endforeach
            @endif
            <input type="hidden"
                   style="width: 360px"
                   id="avatar"
                   name="avatar"
                   class="form-control"
                   value="{{$user->avatar}}">
            @if($errors->has('avatar'))
                @foreach($errors->get('avatar') as $error)
                    <p style="color: red">{{ $error }}</p>
                @endforeach
            @endif

            <button type="submit" class="btn btn-success">Сохранить изменения</button>
        </form>
        <br>
        <a href="{{ route('account') }}">Назад</a>
        <div style="height: 50px; width: 24px"></div>
    </div>

@endsection
