@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Список новостей</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Добавить новость</a>
    </div>

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
            @forelse($newsList as $key => $news)
                <tr>
                    <td>{{$key}}</td>
                    <td>{!!  $news !!}</td>
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
