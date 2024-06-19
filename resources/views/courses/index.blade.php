@extends('layouts.app')

@section('title', 'Курсы')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Курсы</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form class="form-inline mb-4" method="GET" action="{{ route('courses.index') }}">
        <input type="text" name="search" placeholder="Поиск..." value="{{ request('search') }}" class="form-control mr-2">
        <select name="workout_type" class="form-control mr-2">
            <option value="">Все типы</option>
            <option value="full_body" {{ request('workout_type') == 'full_body' ? 'selected' : '' }}>Все тело</option>
            <option value="shoulders" {{ request('workout_type') == 'shoulders' ? 'selected' : '' }}>Плечи</option>
            <option value="arms" {{ request('workout_type') == 'arms' ? 'selected' : '' }}>Руки</option>
            <option value="back" {{ request('workout_type') == 'back' ? 'selected' : '' }}>Спина</option>
            <option value="abs" {{ request('workout_type') == 'abs' ? 'selected' : '' }}>Пресс</option>
            <option value="legs_glutes" {{ request('workout_type') == 'legs_glutes' ? 'selected' : '' }}>Ноги и ягодицы</option>
            <option value="strength" {{ request('workout_type') == 'strength' ? 'selected' : '' }}>Силовые</option>
            <option value="cardio" {{ request('workout_type') == 'cardio' ? 'selected' : '' }}>Кардио</option>
            <option value="crossfit" {{ request('workout_type') == 'crossfit' ? 'selected' : '' }}>Кроссфит</option>
            <option value="yoga" {{ request('workout_type') == 'yoga' ? 'selected' : '' }}>Йога</option>
            <option value="prenatal_yoga" {{ request('workout_type') == 'prenatal_yoga' ? 'selected' : '' }}>Йога для беременных</option>
            <option value="pilates" {{ request('workout_type') == 'pilates' ? 'selected' : '' }}>Пилатес</option>
            <option value="gibkost" {{ request('workout_type') == 'gibkost' ? 'selected' : '' }}>Гибкость</option>
        </select>
        <button type="submit" class="btn btn-primary">Поиск</button>
    </form>
    <div class="row">
        @foreach ($courses as $course)
            <div class="col-md-4 mb-4">
                <div class="card h-100 animate-card">
                    <div class="card-body d-flex flex-column">
                        @if ($course->image_url)
                            <img src="{{ $course->image_url }}" class="card-img-top" alt="{{ $course->title }}">
                        @endif
                        <h6 class="card-title">{{ $course->title }}</h6>
                        <div class="rating mb-3">
                            Рейтинг
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star{{ $i <= $course->averageRating() ? '' : '-o' }}"></i>
                            @endfor
                            ({{ number_format($course->averageRating(), 2) }} / 5)
                        </div>
                        <div class="mt-auto">
                            <p class="card-text"><strong>Цена:</strong> {{ $course->price }} рублей</p>
                            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary btn-block">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $courses->links() }}
    @auth
        @if(Auth::user()->is_admin)
            <div class="text-center mt-4">
                <a class="btn btn-primary" href="{{ route('courses.create') }}">Создать новый курс</a>
            </div>
        @endif
    @endauth
</div>
@endsection

@section('styles')
<style>
    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }
    .card-img-top {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        max-height: 200px;
        object-fit: cover;
    }
    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
    }
    .card-text {
        font-size: 1rem;
        color: #6c757d;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s, border-color 0.3s;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
    .rating .fa-star {
        color: gold;
    }
    .rating .fa-star-o {
        color: #ddd;
    }
    .form-control, .btn {
        transition: background-color 0.3s, border-color 0.3s, color 0.3s;
    }
    .form-control:focus, .btn:hover {
        background-color: #e9ecef;
        border-color: #6c757d;
        color: #343a40;
    }
    .form-inline .form-control {
        margin-right: 10px;
    }
</style>
@endsection