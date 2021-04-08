@extends('layouts.admin')
@section('content')

    <div class="col-12">
        <div class="row">
            <div class="col-6 offset-2">
                <h1>Форма заказа выгрузки</h1>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                @endif
                <form method="post" action="{{ route('admin.unloading.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="firstname">Имя заказчика</label>
                        <input type="text" id="firstname" name="firstname" class="form-control"
                               value="{{old('firstname')}}">
                    </div>
                    <div class="form-group">
                        <label for="surname">Фамилия заказчика</label>
                        <input type="text" id="surname" name="surname" class="form-control" value="{{old('surname')}}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Номер телефона</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="{{old('phone')}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email-адрес</label>
                        <input type="text" id="email" name="email" class="form-control" value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Описание заказа</label>
                        <textarea type="text" id="description" name="description"
                                  class="form-control">{!! old('description') !!}</textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Загрузить</button>
                </form>
            </div>
        </div>
    </div>

@endsection
