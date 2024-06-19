@extends('layouts.app')

@section('title', 'Создать профиль')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="card-title">Создать профиль</h1>
            <form method="POST" action="{{ route('profiles.store') }}">
                @csrf
                <div class="form-group">
                    <label for="age">Возраст</label>
                    <input type="number" id="age" name="age" class="form-control" value="{{ old('age') }}" required>
                </div>
                <div class="form-group">
                    <label for="weight">Вес (кг)</label>
                    <input type="number" id="weight" name="weight" class="form-control" value="{{ old('weight') }}" required>
                </div>
                <div class="form-group">
                    <label for="height">Рост (см)</label>
                    <input type="number" id="height" name="height" class="form-control" value="{{ old('height') }}" required>
                </div>
                <div class="form-group">
                    <label for="fitness_goal">Цель</label>
                    <input type="text" id="fitness_goal" name="fitness_goal" class="form-control" value="{{ old('fitness_goal') }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Создать</button>
            </form>
        </div>
    </div>
</div>
@endsection
