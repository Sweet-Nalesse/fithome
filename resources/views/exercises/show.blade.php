@extends('layouts.app')

@section('title', $exercise->name)

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">{{ $exercise->name }}</h1>
    <div class="exercise-details">
        <p class="lead">{!! $exercise->description !!}</p>
        <p><strong>Группа мышц:</strong> {{ $exercise->muscle_group }}</p>

        @if ($exercise->media_url)
            <div class="media-wrapper mb-4 text-center">
                @if (preg_match('/\.(jpeg|jpg|gif|png)$/', $exercise->media_url))
                    <img src="{{ $exercise->media_url }}" class="img-fluid" alt="{{ $exercise->name }}">
                @elseif (preg_match('/\.(mp4|webm)$/', $exercise->media_url))
                    <video width="100%" height="auto" controls>
                        <source src="{{ $exercise->media_url }}" type="video/mp4">
                        Ваш браузер не поддерживает формат данного видео.
                    </video>
                @endif
            </div>
        @endif
    </div>

    <div class="d-flex justify-content-center mt-4">
        <a href="{{ route('exercises.edit', $exercise->id) }}" class="btn btn-warning mr-2">Редактировать</a>
        <form action="{{ route('exercises.destroy', $exercise->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
        <a href="{{ route('exercises.index') }}" class="btn btn-secondary ml-2">Вернуться к списку</a>
    </div>
</div>
@endsection

@section('styles')
<style>
    .container {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #007bff;
        font-weight: bold;
    }

    .exercise-details p {
        font-size: 1.1rem;
        margin-bottom: 10px;
    }

    .media-wrapper {
        margin-top: 20px;
    }

    .btn {
        font-size: 1rem;
        padding: 10px 20px;
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #d39e00;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }
</style>
@endsection
