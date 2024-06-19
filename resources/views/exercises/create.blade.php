@extends('layouts.app')

@section('title', 'Добавить упражнение')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Добавить упражнение</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="exerciseForm" action="{{ route('exercises.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            <div class="invalid-feedback">Пожалуйста, введите название упражнения.</div>
            <div class="valid-feedback">Отлично!</div>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
            <div class="invalid-feedback">Пожалуйста, введите описание упражнения.</div>
            <div class="valid-feedback">Отлично!</div>
        </div>
        <div class="form-group">
            <label for="muscle_group">Группа мышц</label>
            <select id="muscle_group" name="muscle_group" class="form-control" required>
                <option value="">Выберите группу мышц</option>
                <option value="Руки" {{ old('muscle_group') == 'Руки' ? 'selected' : '' }}>Руки</option>
                <option value="Ноги" {{ old('muscle_group') == 'Ноги' ? 'selected' : '' }}>Ноги</option>
                <option value="Спина" {{ old('muscle_group') == 'Спина' ? 'selected' : '' }}>Спина</option>
                <option value="Грудь" {{ old('muscle_group') == 'Грудь' ? 'selected' : '' }}>Грудь</option>
                <option value="Пресс" {{ old('muscle_group') == 'Пресс' ? 'selected' : '' }}>Пресс</option>
                <option value="Выносливость" {{ old('muscle_group') == 'Выносливость' ? 'selected' : '' }}>Выносливость</option>
                <option value="Йога" {{ old('muscle_group') == 'Йога' ? 'selected' : '' }}>Йога</option>
                <option value="Силовые" {{ old('muscle_group') == 'Силовые' ? 'selected' : '' }}>Силовые</option>
                <option value="Ягодицы" {{ old('muscle_group') == 'Ягодицы' ? 'selected' : '' }}>Ягодицы</option>
                <option value="Кардио" {{ old('muscle_group') == 'Кардио' ? 'selected' : '' }}>Кардио</option>
                <option value="Пилатес" {{ old('muscle_group') == 'Пилатес' ? 'selected' : '' }}>Пилатес</option>
            </select>
            <div class="invalid-feedback">Пожалуйста, выберите группу мышц.</div>
            <div class="valid-feedback">Отлично!</div>
        </div>
        <div class="form-group">
            <label for="media_url">Ссылка на медиа (картинка, гифка, видео)</label>
            <input type="url" class="form-control" id="media_url" name="media_url" value="{{ old('media_url') }}" required>
            <div class="invalid-feedback">Пожалуйста, введите корректный URL.</div>
            <div class="valid-feedback">Отлично!</div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Добавить</button>
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

    .form-group label {
        font-weight: bold;
    }

    .form-group input, .form-group select, .form-group textarea {
        margin-bottom: 10px;
    }

    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById('exerciseForm');

        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        });

        function isValidUrl(url) {
            const pattern = new RegExp('^(https?:\\/\\/)?' + // protocol
                '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|' + // domain name
                '((\\d{1,3}\\.){3}\\d{1,3}))' + // OR ip (v4) address
                '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // port and path
                '(\\?[;&a-z\\d%_.~+=-]*)?' + // query string
                '(\\#[-a-z\\d_]*)?$', 'i'); // fragment locator
            return !!pattern.test(url);
        }
    });
</script>
@endsection
