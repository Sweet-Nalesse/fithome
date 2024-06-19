@extends('layouts.app')

@section('title', 'Форумы')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Форумы</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="list-group">
        @foreach ($forums as $forum)
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('forums.show', $forum->id) }}" class="flex-grow-1">
                    {{ $forum->name }}
                </a>
                @auth
                    @if (Auth::user()->is_admin || Auth::id() === $forum->user_id)
                        <div class="btn-group btn-group-sm" role="group" aria-label="Forum Actions">
                            <a href="{{ route('forums.edit', $forum->id) }}" class="btn btn-secondary">Редактировать</a>
                            <form action="{{ route('forums.destroy', $forum->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
        @endforeach
    </div>

    <div class="text-center mt-4">
        <a class="btn btn-primary btn-lg" href="{{ route('forums.create') }}">Создать новый форум</a>
    </div>
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

    .list-group-item {
        border: none;
        border-bottom: 1px solid #ddd;
        transition: background-color 0.3s, color 0.3s;
    }

    .list-group-item:last-child {
        border-bottom: none;
    }

    .list-group-item:hover {
        background-color: #f1f1f1;
        color: #007bff;
    }

    .list-group-item-action {
        display: block;
        width: 100%;
        padding: 1rem 1.25rem;
        margin-bottom: -1px;
        background-color: #fff;
        border: 1px solid #ddd;
        transition: all 0.3s ease;
    }

    .list-group-item-action:hover {
        background-color: #f8f9fa;
        color: #495057;
        text-decoration: none;
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

    .btn-group .btn {
        margin-left: 5px;
    }
</style>
@endsection
