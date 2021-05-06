@extends('layouts.admin')
@section('content')

    <div class="col-12">
        <div class="row">
            <div class="col-6 offset-2">
                <h1>Редактировать новость</h1>
                <form method="post"
                      action="{{ route('admin.news.update', ['news' => $news], ['categories' => $categories]) }}"
                      enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="category">Категории</label>
                        <select
                            class="form-control"
                            id="category_id"
                            @error('category_id')
                                style="border: red 1px solid;"
                            @enderror
                            name="category_id"
                        >
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                        @if ($category->id === $news->category_id)
                                            selected
                                        @endif
                                    > {{$category->title}}
                                </option>
                            @endforeach
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
                               @error('title')
                                    style="border: red 1px solid;"
                               @enderror
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
                        <input type="text"
                               id="slug"
                               name="slug"
                               @error('slug')
                                    style="border: red 1px solid;"
                               @enderror
                               class="form-control"
                               value="{{$news->slug}}">
                        @if($errors->has('slug'))
                            @foreach($errors->get('slug') as $error)
                                {{ $error }}
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        @if($news->image)
                            <label for="description">Изображение</label>
                            <img src="{{\Storage::disk('public')->url($news->image)}}"
                                 alt="image"
                                 style="width: 220px"
                            >
                        @endif
                        <input type="file" id="image" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea type="text"
                                  id="text"
                                  name="text"
                                  class="form-control">{!! $news->text !!}
                        </textarea>
                        @if($errors->has('text'))
                            @foreach($errors->get('text') as $error)
                                {{ $error }}
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="status">Категории</label>
                        <select class="form-control" id="status" name="status">
                            <option value="draft"
                                    @if($news->status === "draft")
                                        selected
                                    @endif
                                >Новость на модерации
                            </option>
                            <option value="published"
                                    @if($news->status === "published")
                                        selected
                                    @endif
                                >Новость опубликована
                            </option>
                            <option value="blocked"
                                    @if($news->status === "blocked")
                                        selected
                                    @endif
                                >Новость заблокирована
                            </option>
                        </select>
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
        CKEDITOR.replace('text', options);
    </script>

@endpush

