@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4 text-center text-primary">Админ Панель</h1>
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Добро пожаловать, Администратор</h2>
                </div>
                <div class="card-body">
                    <p class="card-text">Здесь вы можете управлять всеми аспектами вашего веб-сервиса.</p>
                    <div class="list-group">
                        <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action">Управление пользователями</a>
                        <a href="{{ route('workouts.index') }}" class="list-group-item list-group-item-action">Управление тренировками</a>
                        <a href="{{ route('courses.index') }}" class="list-group-item list-group-item-action">Управление курсами</a>
                        <a href="{{ route('forums.index') }}" class="list-group-item list-group-item-action">Управление форумами</a>
                        <a href="{{ route('exercises.index') }}" class="list-group-item list-group-item-action">Библиотека упражнений</a>
                        
                        <a href="{{ route('messages.index')}}" class="list-group-item list-group-item-action">Упрваление общим чатом</a>
                        <!-- Добавьте здесь другие ссылки на управление -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
