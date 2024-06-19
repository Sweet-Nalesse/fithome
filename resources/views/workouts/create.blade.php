@extends('layouts.app')

@section('title', 'Создание тренировок')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Создание тренировок</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="workoutForm" method="POST" action="{{ route('workouts.store') }}" class="needs-validation" novalidate>
        @csrf
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
            <div class="invalid-feedback">Пожалуйста, введите заголовок.</div>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea id="description" name="description" class="form-control" required>{{ old('description') }}</textarea>
            <div class="invalid-feedback">Пожалуйста, введите описание.</div>
        </div>
        <div class="form-group">
            <label for="level">Уровень</label>
            <select id="level" name="level" class="form-control" required>
                <option value="" disabled selected>Выберите уровень</option>
                <option value="beginner" {{ old('level') == 'Начинающий' ? 'selected' : '' }}>Начинающий</option>
                <option value="intermediate" {{ old('level') == 'Любитель' ? 'selected' : '' }}>Любитель</option>
                <option value="advanced" {{ old('level') == 'Профессионал' ? 'selected' : '' }}>Профессионал</option>
            </select>
            <div class="invalid-feedback">Пожалуйста, выберите уровень.</div>
        </div>
        <div class="form-group">
            <label for="type">Тип</label>
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
            <div class="invalid-feedback">Пожалуйста, выберите тип.</div>
        </div>
        <div class="form-group">
            <label for="search">Поиск упражнений</label>
            <input type="text" id="search" class="form-control" placeholder="Введите название упражнения">
        </div>
        <div class="form-group">
            <label for="exercises">Упражнения</label>
            <div id="exercise-list">
                @foreach ($exercises as $exercise)
                    <div class="form-check exercise-item" data-name="{{ $exercise->name }}" data-group="{{ $exercise->muscle_group }}">
                        <input class="form-check-input" type="checkbox" value="{{ $exercise->id }}" id="exercise{{ $exercise->id }}" name="exercises[]">
                        <label class="form-check-label" for="exercise{{ $exercise->id }}">
                            {{ $exercise->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Создать</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
<script>
    document.getElementById('search').addEventListener('input', function() {
        filterExercises();
    });

    function filterExercises() {
        var searchValue = document.getElementById('search').value.toLowerCase();

        document.querySelectorAll('.exercise-item').forEach(function(item) {
            var itemName = item.getAttribute('data-name').toLowerCase();

            if (itemName.includes(searchValue) || searchValue === '') {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    }

    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
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