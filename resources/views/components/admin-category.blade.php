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
            @forelse($categoryList as $key => $category)
                <tr>
                    <td>{{$key}}</td>
                    <td>{!!  $category !!}</td>
                    <td>{{ now() }}</td>
                    <td><a href="">Ред.</a>&nbsp;<a href="">Уд.</a></td>
                </tr>
            @empty
                <td colspan="4">новостей нет</td>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
