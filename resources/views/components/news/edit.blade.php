@extends('layouts.admin')
@section('content')

    <div class="col-12">
        <div class="row">
            <div class="col-6 offset-2">
                <h1>Редактировать новость</h1>
                @if($errors->any())
                        <div class="alert alert-danger">Необходимо заполнить поле "наименование" и выбрать категорию</div>
                @endif
                <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="category">Категории</label>
                        <select
                            class="form-control"
                            id="category_id"
                            @error('category_id') style="border: red 1px solid;" @enderror
                            name="category_id"
                        >
                            <option value="0">Выбрать</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}
                                        @if ($category->id === $news->category_id)
                                            selected
                                        @endif
                                    ">{{$category->title}}
                                    @endforeach
                                </option>
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
                               value="{{ $news->title }}">
                        @if($errors->has('title'))
                            @foreach($errors->get('title') as $error)
                                {{ $error }}
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="slug">Слаг</label>
                        <input type="text" id="slug" name="slug" class="form-control" value="{{$news->slug}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Изображение</label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea type="text" id="text" name="text"
                                  class="form-control">{!! $news->text !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Категории</label>
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

