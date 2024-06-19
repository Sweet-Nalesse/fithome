@extends('layouts.app')

@section('title', 'Редактирование форума')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Редактирование форума</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('forums.update', $forum->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Название форума</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $forum->name) }}" required>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea id="description" name="description" class="form-control" required>{{ old('description', $forum->description) }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </div>
    </form>
</div>
@endsection

@section('styles')
<style>
    .container {
        max-width: 600px;
    }

    h1 {
        color: #333;
    }

    .form-group label {
        font-weight: bold;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .alert-danger ul {
        padding-left: 20px;
    }
</style>
@endsection