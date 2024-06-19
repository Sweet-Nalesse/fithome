@extends('layouts.app')

@section('title', 'Создание пользователя')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Создание пользователя</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('users.store') }}" class="needs-validation" novalidate>
        @csrf
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            <div class="invalid-feedback">Пожалуйста, введите имя.</div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
            <div class="invalid-feedback">Пожалуйста, введите email.</div>
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" class="form-control" required>
            <div class="invalid-feedback">Пожалуйста, введите пароль.</div>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Подтвердите пароль</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            <div class="invalid-feedback">Пожалуйста, подтвердите пароль.</div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Создать</button>
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