@extends('layouts.app')

@section('title', 'Создание курсов')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Создание курса</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Цена</label>
            <input type="number" id="price" name="price" class="form-control" step="0.01" value="{{ old('price') }}">
        </div>
        <div class="form-group">
            <label for="image_url">Ссылка на фото курса</label>
            <input type="url" id="image_url" name="image_url" class="form-control" value="{{ old('image_url') }}">
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
                    <div class="form-check workout-item mb-2" data-name="{{ $workout->title }}" data-level="{{ $workout->level }}">
                        <input class="form-check-input" type="checkbox" value="{{ $workout->id }}" id="workout{{ $workout->id }}" name="workouts[]">
                        <label class="form-check-label" for="workout{{ $workout->id }}">
                            {{ $workout->title }}
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
</style>
@endsection