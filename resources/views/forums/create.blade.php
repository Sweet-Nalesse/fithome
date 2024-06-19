@extends('layouts.app')

@section('title', 'Создать форум')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Создать форум</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('forums.store') }}" class="needs-validation" novalidate>
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            <div class="invalid-feedback">
                Пожалуйста, введите название форума.
            </div>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea id="description" name="description" class="form-control" rows="5" required>{{ old('description') }}</textarea>
            <div class="invalid-feedback">
                Пожалуйста, введите описание форума.
            </div>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary btn-lg">Создать</button>
        </div>
    </form>
</div>
@endsection

@section('styles')
<style>
    body {
        background-color: #f8f9fa;
    }

    h1 {
        color: #333;
        font-size: 2.5rem;
        font-weight: bold;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .btn-lg {
        padding: 0.75rem 1.5rem;
        font-size: 1.25rem;
    }

    .invalid-feedback {
        display: none;
        color: #dc3545;
    }

    .was-validated .form-control:invalid {
        border-color: #dc3545;
    }

    .was-validated .form-control:invalid:focus {
        box-shadow: 0 0 5px rgba(220, 53, 69, 0.5);
    }

    .was-validated .form-control:valid {
        border-color: #28a745;
    }

    .was-validated .form-control:valid:focus {
        box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
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
