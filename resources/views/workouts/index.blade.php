@extends('layouts.app')

@section('title', 'Тренировки')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Тренировки</h1>

    <form class="form-inline mb-4" method="GET" action="{{ route('workouts.index') }}">
        <div class="form-group mr-2">
            <input type="text" name="search" class="form-control" placeholder="Поиск..." value="{{ request('search') }}">
        </div>
        <select name="level" class="form-control mr-2">
            <option value="">Все уровни</option>
            <option value="beginner" {{ request('level') == 'Начинающий' ? 'selected' : '' }}>Начинающий</option>
            <option value="intermediate" {{ request('level') == 'Любитель' ? 'selected' : '' }}>Любитель</option>
            <option value="advanced" {{ request('level') == 'Профессионал' ? 'selected' : '' }}>Профессионал</option>
        </select>
        <select name="type" class="form-control mr-2">
            <option value="">Все типы</option>
            <option value="full_body" {{ request('type') == 'full_body' ? 'selected' : '' }}>Все тело</option>
            <option value="shoulders" {{ request('type') == 'shoulders' ? 'selected' : '' }}>Плечи</option>
            <option value="arms" {{ request('type') == 'arms' ? 'selected' : '' }}>Руки</option>
            <option value="back" {{ request('type') == 'back' ? 'selected' : '' }}>Спина</option>
            <option value="abs" {{ request('type') == 'abs' ? 'selected' : '' }}>Пресс</option>
            <option value="legs_glutes" {{ request('type') == 'legs_glutes' ? 'selected' : '' }}>Ноги и ягодицы</option>
            <option value="strength" {{ request('type') == 'strength' ? 'selected' : '' }}>Силовые</option>
            <option value="cardio" {{ request('type') == 'cardio' ? 'selected' : '' }}>Кардио</option>
            <option value="crossfit" {{ request('type') == 'crossfit' ? 'selected' : '' }}>Кроссфит</option>
            <option value="yoga" {{ request('type') == 'yoga' ? 'selected' : '' }}>Йога</option>
            <option value="prenatal_yoga" {{ request('type') == 'prenatal_yoga' ? 'selected' : '' }}>Йога для беременных</option>
            <option value="pilates" {{ request('type') == 'pilates' ? 'selected' : '' }}>Пилатес</option>
            <option value="gibkost" {{ request('type') == 'gibkost' ? 'selected' : '' }}>Гибкость</option>
        </select>
        <button type="submit" class="btn btn-primary">Поиск</button>
    </form>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <ul class="list-group mb-4">
        @foreach ($workouts as $workout)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('workouts.show', $workout->id) }}">{{ $workout->title }}</a>
                <span class="badge badge-primary">{{ \App\Helpers\WorkoutHelper::translateLevel($workout->level) }}</span>
            </li>
        @endforeach
    </ul>

    <!--<div class="d-flex justify-content-center mb-4">
        {{ $workouts->links() }}
    </div>-->

    <a href="{{ route('workouts.create') }}" class="btn btn-success btn-block">Создать новую тренировку</a>
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

    .list-group-item a {
        text-decoration: none;
        color: #333;
    }

    .list-group-item a:hover {
        text-decoration: underline;
    }

    .badge-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .badge-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .alert-success {
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
</style>
@endsection