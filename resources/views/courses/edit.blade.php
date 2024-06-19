@extends('layouts.app')

@section('title', 'Редактирование курса')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Редактирование курса</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="courseForm" method="POST" action="{{ route('courses.update', $course->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $course->title) }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $course->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Цена</label>
            <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror" step="0.01" value="{{ old('price', $course->price) }}" required>
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="image_url">Ссылка на фото курса</label>
            <input type="url" id="image_url" name="image_url" class="form-control @error('image_url') is-invalid @enderror" value="{{ old('image_url', $course->image_url) }}">
            @error('image_url')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @if ($course->image_url)
                <img src="{{ $course->image_url }}" alt="{{ $course->title }}" class="img-fluid mt-2" style="max-width: 150px;">
            @endif
        </div>
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
        </label>
        <div class="form-group filter-group p-3 mb-3 bg-light rounded">
            <h4 class="mb-3">Фильтры для тренировок</h4>
            <label for="search">Поиск тренировок</label>
            <input type="text" id="search" class="form-control mb-2" placeholder="Введите название тренировки">
            <label for="level_filter">Уровень</label>
            <select id="level_filter" class="form-control">
                <option value="">Все уровни</option>
                <option value="beginner">Начинающий</option>
                <option value="intermediate">Любитель</option>
                <option value="advanced">Профессионал</option>
            </select>
        </div>

        <div class="form-group">
            <label for="workouts">Тренировки</label>
            <div id="workout-list" class="border p-3 rounded">
                @foreach ($workouts as $workout)
                    <div class="form-check workout-item mb-2 @error('workouts') is-invalid @enderror" data-name="{{ $workout->title }}" data-level="{{ $workout->level }}">
                        <input class="form-check-input" type="checkbox" value="{{ $workout->id }}" id="workout{{ $workout->id }}" name="workouts[]" {{ $course->workouts->contains($workout->id) ? 'checked' : '' }}>
                        <label class="form-check-label" for="workout{{ $workout->id }}">
                            {{ $workout->title }}
                        </label>
                        @error('workouts')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Обновить</button>
        </div>
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
<script>
document.getElementById('search').addEventListener('input', function() {
    filterWorkouts();
});

document.getElementById('level_filter').addEventListener('change', function() {
    filterWorkouts();
});

function filterWorkouts() {
    var searchValue = document.getElementById('search').value.toLowerCase();
    var levelValue = document.getElementById('level_filter').value.toLowerCase();

    document.querySelectorAll('.workout-item').forEach(function(item) {
        var itemName = item.getAttribute('data-name').toLowerCase();
        var itemLevel = item.getAttribute('data-level').toLowerCase();

        if ((itemName.includes(searchValue) || searchValue === '') &&
            (itemLevel === levelValue || levelValue === '')) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });
}

document.getElementById('courseForm').addEventListener('submit', function(event) {
    var form = event.target;
    var isValid = true;

    form.querySelectorAll('input[required], textarea[required]').forEach(function(input) {
        if (!input.value.trim()) {
            input.classList.add('is-invalid');
            isValid = false;
        } else {
            input.classList.remove('is-invalid');
        }
    });

    if (!isValid) {
        event.preventDefault();
        event.stopPropagation();
    }

    form.classList.add('was-validated');
});
</script>
@endsection

@section('styles')
<style>
    .filter-group {
        background-color: #f8f9fa;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        padding: 1.5rem;
    }

    .filter-group h4 {
        margin-bottom: 1rem;
    }

    #workout-list {
        max-height: 300px;
        overflow-y: auto;
        border: 1px solid #ced4da;
        padding: .75rem;
        border-radius: .25rem;
    }

    body {
        background-color: #f8f9fa;
    }

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

    .is-invalid {
        border-color: #dc3545;
    }

    .is-invalid + .invalid-feedback {
        display: block;
    }
</style>
@endsection