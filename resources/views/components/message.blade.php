@extends('layouts.site-main')
@section('content')

    <div class="container" style="margin-top: 100px">
        <div class="col-12" style="margin-bottom: 24px">
            <div class="row">
                <div class="col-6 offset-2">
                    <h1>Обратная связь</h1>
                    <h2>Напишите нам и мы обязательно вам ответим</h2>
                    <br>
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    <form method="post" action="{{ route('messageStore') }}">
                        @csrf
                        <h3>Как мы можем к вам обращаться?</h3>
                        <div class="form-group">
                            <label for="firstname">Имя</label>
                            <input type="text" id="firstname" name="firstname" class="form-control my_input"
                                   placeholder="поле для ввода имени" value="{{old('firstname')}}">
                        </div>
                        <div class="form-group">
                            <label for="surname">Фамилмя</label>
                            <input type="text" id="surname" name="surname" class="form-control my_input"
                                   placeholder="поле для ввода фамилии" value="{{old('surname')}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Текст обращения</label>
                            <textarea type="text" id="description" name="description"
                                      class="form-control">{!! old('description') !!}</textarea>
                        </div>
                        <br>
                        <div class="content_for_btn">
                            <button type="submit" class="btn btn-success">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
