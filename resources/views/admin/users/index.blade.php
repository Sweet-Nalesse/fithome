@extends('layouts.app')

@section('title', 'Управление пользователями')

@section('content')
<div class="container mt-5">
    <h1>Управление пользователями</h1>
<form method="GET" action="{{ route('users.index') }}" class="form-inline mb-3">
        <input type="text" name="search" class="form-control mr-2" placeholder="Поиск пользователей..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Поиск</button>
    </form>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Создать нового пользователя</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Имя</th>
                <th>Email</th>
                <th>Роль</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin ? 'Администратор' : 'Пользователь' }}</td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">Просмотр</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
