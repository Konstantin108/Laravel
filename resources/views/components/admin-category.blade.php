@extends('layouts.admin')
@section('content')

    <h1>список категорий</h1>
    <div class="row">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>заголовок</th>
                <th>дата добавления</th>
                <th>действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{!!  $category->title !!}</td>
                    <td>{{ $category->created_at }}</td>
                    <td><a href="">Ред.</a>&nbsp;<a href="">Уд.</a></td>
                </tr>
            @empty
                <td colspan="4">Категорий нет</td>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
