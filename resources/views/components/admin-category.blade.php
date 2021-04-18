@extends('layouts.admin')
@section('content')

    <h1>список категорий</h1>
    <div class="row">
        @if(session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>заголовок</th>
                <th>дата добавления</th>
                <th>дата обновления</th>
                <th>действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{!!  $category->title !!}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <td>
                        <a href="{{route('admin.category.edit', ['category' => $category])}}">Ред.</a>&nbsp
                        <a href="{{ route('deleteCategory', ['id' => $category->id]) }}">Уд.</a>
                    </td>
                </tr>
            @empty
                <td colspan="4">Категорий нет</td>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
