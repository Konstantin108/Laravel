@extends('layouts.admin')
@section('content')

    <div class="col-12">
        <div class="row">
            <div class="col-6 offset-2">
                <h1>Добавить новость</h1>
                @if($errors->any())
                        <div class="alert alert-danger">Необходимо заполнить поле "наименование" и выбрать категорию</div>
                @endif
                <form method="post" action="{{ route('admin.news.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="category_id">Категории</label>
                        <select
                            class="form-control"
                            id="category_id"
                            @error('category_id') style="border: red 1px solid;" @enderror
                            name="category_id"
                        >
                            <option value="0">Выбрать</option>
                            <option value="1">Политика</option>
                            <option value="2">В мире</option>
                            <option value="3">Экономика</option>
                            <option value="4">Культура</option>
                            <option value="5">Спорт</option>
                            <option value="6">Религия</option>
                            <option value="7">Игровая индустрия</option>
                        </select>
                        @if($errors->has('category_id'))
                            @foreach($errors->get('category_id') as $error)
                                {{ $error }}
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="title">Наименование</label>
                        <input type="text"
                               id="title"
                               name="title"
                               @error('title') style="border: red 1px solid;" @enderror
                               class="form-control"
                               value="{{old('title')}}">
                        @if($errors->has('title'))
                            @foreach($errors->get('title') as $error)
                                {{ $error }}
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="slug">Слаг</label>
                        <input type="text" id="slug" name="slug" class="form-control" value="{{old('slug')}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Изображение</label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea type="text" id="text" name="text"
                                  class="form-control">{!! old('text') !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Статус</label>
                        <select class="form-control" id="status" name="status">
                            <option value="draft">Новость на модерации</option>
                            <option value="published">Новость опубликована</option>
                            <option value="blocked">Новость заблокирована</option>
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Сохранить</button>
                </form>
            </div>
        </div>
    </div>

@endsection
