@extends('layouts.app')

@section('title', 'Редактирование пользователя')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Редактирование пользователя</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            <div class="invalid-feedback">Поле "Имя" обязательно для заполнения.</div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            <div class="invalid-feedback">Поле "Email" обязательно для заполнения.</div>
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" class="form-control">
            <div class="invalid-feedback">Поле "Пароль" обязательно для заполнения.</div>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Подтверждение пароля</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
            <div class="invalid-feedback">Подтверждение пароля обязательно для заполнения.</div>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" id="is_admin" name="is_admin" class="form-check-input" {{ $user->is_admin ? 'checked' : '' }}>
            <label for="is_admin" class="form-check-label">Администратор</label>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Обновить</button>
    </form>
</div>
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
