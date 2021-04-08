@extends('layouts.admin')
@section('content')

    <div class="col-12">
        <div class="row">
            <div class="col-6 offset-2">
                <h1>Добавить новость</h1>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                @endif
                <form method="post" action="{{ route('admin.news.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="category">категории</label>
                        <select class="form-control" id="category" name="category_id">
                            <option value="0">выбрать</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">наименование</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <label for="slug">слаг</label>
                        <input type="text" id="slug" name="slug" class="form-control" value="{{old('slug')}}">
                    </div>
                    <div class="form-group">
                        <label for="description">описание</label>
                        <textarea type="text" id="description" name="description"
                                  class="form-control">{!! old('description') !!}</textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Сохранить</button>
                </form>
            </div>
        </div>
    </div>

@endsection
