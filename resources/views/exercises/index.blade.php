@extends('layouts.app')

@section('title', 'Библиотека упражнений')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Библиотека упражнений</h1>

    <form class="form-inline mb-4" method="GET" action="{{ route('exercises.index') }}">
        <div class="form-group mr-2">
            <select name="muscle_group" class="form-control">
                <option value="">Все группы мышц</option>
                <option value="Руки" {{ request('muscle_group') == 'Руки' ? 'selected' : '' }}>Руки</option>
                <option value="Ноги" {{ request('muscle_group') == 'Ноги' ? 'selected' : '' }}>Ноги</option>
                <option value="Спина" {{ request('muscle_group') == 'Спина' ? 'selected' : '' }}>Спина</option>
                <option value="Грудь" {{ request('muscle_group') == 'Грудь' ? 'selected' : '' }}>Грудь</option>
                <option value="Пресс" {{ request('muscle_group') == 'Пресс' ? 'selected' : '' }}>Пресс</option>
                
                <option value="Выносливость" {{ request('muscle_group') == 'Выносливость' ? 'selected' : '' }}>Выносливость</option>
                <option value="Йога" {{ request('muscle_group') == 'Йога' ? 'selected' : '' }}>Йога</option>
                <option value="Силовые" {{ request('muscle_group') == 'Силовые' ? 'selected' : '' }}>Силовые</option>
                <option value="Ягодицы" {{ request('muscle_group') == 'Ягодицы' ? 'selected' : '' }}>Ягодицы</option>
                <option value="Кардио" {{ request('muscle_group') == 'Кардио' ? 'selected' : '' }}>Кардио</option>
                <option value="Пилатес" {{ request('muscle_group') == 'Пилатес' ? 'selected' : '' }}>Пилатес</option>
                
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Применить фильтр</button>
    </form>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach ($exercises as $exercise)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if ($exercise->media_url)
                        <img src="{{ $exercise->media_url }}" class="card-img" alt="{{ $exercise->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('exercises.show', $exercise->id) }}">{{ $exercise->name }}</a>
                        </h5>
                        <span class="badge badge-primary">{{ $exercise->muscle_group }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <a href="{{ route('exercises.create') }}" class="btn btn-success btn-block">Добавить новое упражнение</a>
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

    .card-img-top {
        max-height: 200px;
        object-fit: cover;
    }

    .card-title a {
        text-decoration: none;
        color: #333;
    }

    .card-title a:hover {
        text-decoration: underline;
    }

    .badge-primary {
        background-color: #007bff;
        border-color: #007bff;
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
