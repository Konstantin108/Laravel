@extends('layouts.admin')
@section('content')

    <div class="col-12">
        <div class="row">
            <div class="col-6 offset-2">
                <h1>Исправление данных пользователя</h1>
                <form method="post"
                      action="{{ route('admin.user.update', ['user' => $user]) }}"
                      enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        @if($user->avatar)
                            <img style="max-width: 200px;"
                                 src="{{ \Storage::disk('public')->url($user->avatar) }}"
                                 alt="avatar"
                            >
                        @else
                            <img style="border-radius: 12px; max-width: 200px;"
                                 src="{{ asset('/assets/img/no_photo.jpg') }}"
                                 alt="avatar"
                            >
                        @endif
                        <input type="file" id="avatar" name="avatar" class="form-control" style="width: 360px">
                        <br>
                        <label for="name">Имя пользователя</label>
                        <input type="text"
                               id="name"
                               name="name"
                               @error('name') style="border: red 1px solid;" @enderror
                               class="form-control"
                               value="{{ $user->name }}">
                        @if($errors->has('name'))
                            @foreach($errors->get('name') as $error)
                                {{ $error }}
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">E-Mail адрес</label>
                        <input type="text"
                               id="email"
                               name="email"
                               @error('email') style="border: red 1px solid;" @enderror
                               class="form-control"
                               value="{{$user->email}}">
                        @if($errors->has('email'))
                            @foreach($errors->get('email') as $error)
                                {{ $error }}
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="is_admin">Права администратора</label>
                        <select class="form-control" id="is_admin" name="is_admin">
                            <option value="0">нет</option>
                            <option value="1">да</option>
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Сохранить</button>
                </form>
            </div>
        </div>
    </div>

@endsection

