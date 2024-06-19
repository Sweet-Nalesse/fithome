@extends('layouts.app')

@section('title', 'Редактирование сообщения')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Изменить сообщение</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="messageForm" method="POST" action="{{ route('messages.update', $message->id) }}" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="body">Сообщение</label>
            <textarea id="body" name="body" rows="3" class="form-control" required>{{ old('body', $message->body) }}</textarea>
            <div class="invalid-feedback">Пожалуйста, введите сообщение.</div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Изменить</button>
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
    }

    .alert-danger ul {
        padding-left: 20px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .form-control:valid {
        border-color: #28a745;
        padding-right: calc(1.5em + 0.75rem);
        background-image: url('data:image/svg+xml,%3csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="%23812ec5"%3e%3cpath fill-rule="evenodd" d="M16 8a8 8 0 11-16 0 8 8 0 0116 0zM7.293 10.707a1 1 0 011.414 0L10.5 8.914a1 1 0 011.415 0L15.5 11.5V1.5a1 1 0 00-2 0V7.5a1 1 0 01-1 1H3a1 1 0 00-.832 1.553l1.5 2a1 1 0 001.39.102L7.293 10.707z" clip-rule="evenodd"%3e%3c/path%3e%3c/svg%3e');
        background-repeat: no-repeat;
        background-position: right calc(0.375em + 0.1875rem) center;
        background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    }

    .form-control:invalid {
        border-color: #dc3545;
        padding-right: calc(1.5em + 0.75rem);
        background-image: url('data:image/svg+xml,%3csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="%23ff0000"%3e%3cpath d="M16 8a8 8 0 11-16 0 8 8 0 0116 0zM5.354 4.646a.5.5 0 00-.708.708l1.5 1.5a.5.5 0 000 .707L5.646 9.854a.5.5 0 10.707.707L8 8.207l1.646 1.646a.5.5 0 00.707-.707L8.707 7.561a.5.5 0 000-.707l1.647-1.647a.5.5 0 00-.707-.707L8 6.793 6.354 5.146a.5.5 0 00-.707-.707L8 7.561l1.646-1.646a.5.5 0 10-.707-.707L8 6.793l-1.646-1.647z"%3e%3c/path%3e%3c/svg%3e');
        background-repeat: no-repeat;
        background-position: right calc(0.375em + 0.1875rem) center;
        background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
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
