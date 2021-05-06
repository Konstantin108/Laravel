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
                        <label for="title">Наименование</label>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            class="form-control"
                            @error('title') style="border: red 1px solid;" @enderror
                            value="{{$category->title}}">
                        @if($errors->has('title'))
                            @foreach($errors->get('title') as $error)
                                {{ $error }}
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea
                            type="text"
                            id="description"
                            name="description"
                            @error('description') style="border: red 1px solid;" @enderror
                            class="form-control">{!! $category->description !!}
                        </textarea>
                        @if($errors->has('description'))
                            @foreach($errors->get('description') as $error)
                                {{ $error }}
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="slug">Отображать</label>
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
@push('js')

    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: 'laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('description', options);
    </script>

@endpush
