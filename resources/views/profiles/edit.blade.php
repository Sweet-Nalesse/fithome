@extends('layouts.app')

@section('title', 'Редактировать профиль')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="card-title">Редактировать профиль</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Подтвердите пароль</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                </div>
                <div class="form-group">
                    <label for="age">Возраст</label>
                    <input type="number" id="age" name="age" class="form-control" value="{{ old('age', $user->profile->age) }}" required>
                </div>
                <div class="form-group">
                    <label for="weight">Вес (кг)</label>
                    <input type="number" id="weight" name="weight" class="form-control" value="{{ old('weight', $user->profile->weight) }}" required>
                </div>
                <div class="form-group">
                    <label for="height">Рост (см)</label>
                    <input type="number" id="height" name="height" class="form-control" value="{{ old('height', $user->profile->height) }}" required>
                </div>
                <div class="form-group">
                    <label for="fitness_goal">Цель</label>
                    <input type="text" id="fitness_goal" name="fitness_goal" class="form-control" value="{{ old('fitness_goal', $user->profile->fitness_goal) }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
            </form>
        </div>
    </div>
</div>
@endsection
