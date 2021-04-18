@extends('layouts.admin')
@section('content')

    <div class="col-12">
        <div class="row">
            <div class="col-6 offset-2">
                <h1>Редактировать новость</h1>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">Необходимо заполнить поле "наименование" и выбрать категорию</div>
                    @endforeach
                @endif
                <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="category">категории</label>
                        <select class="form-control" id="category_id" name="category_id">
                            <option value="0">Выбрать</option>
                            <option value="1">Политика</option>
                            <option value="2">В мире</option>
                            <option value="3">Экономика</option>
                            <option value="4">Культура</option>
                            <option value="5">Спорт</option>
                            <option value="6">Религия</option>
                            <option value="7">Игровая индустрия</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">наименование</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{$news->title}}">
                    </div>
                    <div class="form-group">
                        <label for="slug">слаг</label>
                        <input type="text" id="slug" name="slug" class="form-control" value="{{$news->slug}}">
                    </div>
                    <div class="form-group">
                        <label for="description">описание</label>
                        <textarea type="text" id="text" name="text"
                                  class="form-control">{!! $news->text !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">категории</label>
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

