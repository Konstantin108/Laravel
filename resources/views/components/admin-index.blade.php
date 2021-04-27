@extends('layouts.admin')
@section('content')

    <h1>список новостей (всего: {{ $count }})</h1>
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
            @forelse($news as $newsItem)
                <tr>
                    <td>{{ $newsItem->id }}</td>
                    <td>{!!  $newsItem->title !!}</td>
                    <td>{{ $newsItem->created_at }}</td>
                    <td>{{ $newsItem->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.news.edit', ['news'=> $newsItem]) }}">Ред.</a>&nbsp
                        <a href="{{ route('delete', ['id' => $newsItem->id]) }}">Уд.</a>
                    </td>
                </tr>
            @empty
                <td colspan="4">новостей нет</td>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
