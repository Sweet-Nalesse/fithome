@extends('layouts.app')

@section('title', 'Добавление прогресса')

@section('content')
<div class="container">
    <h1>Добавление прогресса</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('progress_entries.store') }}">
        @csrf
        <div class="form-group">
            <label for="workout_id">Тренировки</label>
            <select name="workout_id" id="workout_id" class="form-control">
                @foreach ($workouts as $workout)
                    <option value="{{ $workout->id }}">{{ $workout->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">Дата</label>
            <input type="date" id="date" name="date" class="form-control" value="{{ old('date') }}">
        </div>
        <div class="form-group">
            <label for="duration">Время (минуты)</label>
            <input type="number" id="duration" name="duration" class="form-control" value="{{ old('duration') }}">
        </div>
        <div class="form-group">
            <label for="calories_burned">Калорий потеряно</label>
            <input type="number" id="calories_burned" name="calories_burned" class="form-control" value="{{ old('calories_burned') }}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Добавить</button>
        </div>
    </form>
</div>
@endsection

