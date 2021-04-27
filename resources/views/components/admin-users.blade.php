@extends('layouts.admin')
@section('content')

    <h1>список пользователей (всего: {{ $count }})</h1>
    <div class="row">
        @if(session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>имя пользователя</th>
                <th>E-Mail адрес</th>
                <th>дата добавления</th>
                <th>дата обновления</th>
                <th>права админа</th>
                <th>действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($user as $oneUser)
                <tr>
                    <td>{{ $oneUser->id }}</td>
                    <td>{{ $oneUser->name }}</td>
                    <td>{{ $oneUser->email }}</td>
                    <td>{{ $oneUser->created_at }}</td>
                    <td>{{ $oneUser->updated_at }}</td>
                    <td>
                        @if($oneUser->is_admin)
                            да
                        @else
                            нет
                        @endif
                    </td>
                    <td>
                        @if($oneUser->is_admin)
                            запрещено
                        @else
                            <a href="{{route('admin.user.edit', ['user'=> $oneUser])}}">Ред.</a>&nbsp
                            <a href="{{ route('deleteUser', ['id' => $oneUser->id]) }}">Уд.</a>
                        @endif
                    </td>
                </tr>
            @empty
                <td colspan="4">Категорий нет</td>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
