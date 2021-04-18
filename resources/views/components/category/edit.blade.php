@extends('layouts.admin')
@section('content')

    <div class="col-12">
        <div class="row">
            <div class="col-6 offset-2">
                <h1>Редактировать категорию</h1>
                @if($errors->any())
                        <div class="alert alert-danger">Необходимо заполнить все поля</div>
                @endif
                <form method="post" action="{{ route('admin.category.update', ['category' => $category]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">наименование</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{$category->title}}">
                    </div>
                    <div class="form-group">
                        <label for="description">описание</label>
                        <textarea type="text" id="description" name="description"
                                  class="form-control">{!! $category->description !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="slug">отображать</label>
                        <input
                            type="checkbox"
                            id="is_visible"
                            name="is_visible" value="1"
                            @if ($category->is_visible === true) checked @endif">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Сохранить</button>
                </form>
            </div>
        </div>
    </div>

@endsection
