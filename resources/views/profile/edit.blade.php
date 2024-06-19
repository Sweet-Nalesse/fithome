@extends('layouts.app')

@section('title', 'Редактировать профиль')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="card-title text-center">Редактировать профиль</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="profileForm" method="POST" action="{{ route('profile.update') }}" class="needs-validation" novalidate>
                @csrf
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    <div class="invalid-feedback">Пожалуйста, введите ваше имя.</div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    <div class="invalid-feedback">Пожалуйста, введите корректный email.</div>
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" id="password" name="password" class="form-control">
                    <div class="invalid-feedback">Пожалуйста, введите пароль.</div>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Подтвердите пароль</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                    <div class="invalid-feedback">Пожалуйста, подтвердите пароль.</div>
                </div>
                <div class="form-group">
                    <label for="age">Возраст</label>
                    <input type="number" id="age" name="age" class="form-control" value="{{ old('age', $user->profile->age) }}" required>
                    <div class="invalid-feedback">Пожалуйста, введите ваш возраст.</div>
                </div>
                <div class="form-group">
                    <label for="weight">Вес (кг)</label>
                    <input type="number" id="weight" name="weight" class="form-control" value="{{ old('weight', $user->profile->weight) }}" required>
                    <div class="invalid-feedback">Пожалуйста, введите ваш вес.</div>
                </div>
                <div class="form-group">
                    <label for="height">Рост (см)</label>
                    <input type="number" id="height" name="height" class="form-control" value="{{ old('height', $user->profile->height) }}" required>
                    <div class="invalid-feedback">Пожалуйста, введите ваш рост.</div>
                </div>
                <div class="form-group">
                    <label for="fitness_goal">Цель</label>
                    <input type="text" id="fitness_goal" name="fitness_goal" class="form-control" value="{{ old('fitness_goal', $user->profile->fitness_goal) }}" required>
                    <div class="invalid-feedback">Пожалуйста, введите вашу цель.</div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Сохранить изменения</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    body {
        background-color: #f8f9fa;
    }

    .card {
        border-radius: 15px;
        border: none;
    }

    .card-title {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 1.5rem;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        margin-bottom: 10px;
    }

    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>
@endsection

@section('scripts')
<script>
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            var forms = document.getElementsByClassName('needs-validation');
            Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
@endsection
