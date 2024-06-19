@extends('layouts.app')

@section('title', 'Просмотр пользователя')

@section('content')
<div class="container mt-5">
    <h1>Просмотр пользователя</h1>

    <div class="card">
        <div class="card-header">
            <h2>{{ $user->name }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Роль:</strong> {{ $user->is_admin ? 'Администратор' : 'Пользователь' }}</p>
        </div>
    </div>

    <a href="{{ route('users.index') }}" class="btn btn-primary mt-3">Назад к списку пользователей</a>
</div>
@endsection
