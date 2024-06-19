@extends('layouts.app')

@section('title', 'Прогресс тренировок')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Детали прогресса</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Тренировка:</strong> {{ $progressEntry->workout->title }}</p>
            <p><strong>Дата:</strong> {{ $progressEntry->date }}</p>
            <p><strong>Время:</strong> {{ $progressEntry->duration }} минуты</p>
            <p><strong>Калорий:</strong> {{ $progressEntry->calories_burned }}</p>

            <div class="d-flex justify-content-start mb-4">
                <a href="{{ route('progress_entries.edit', $progressEntry->id) }}" class="btn btn-secondary mr-2">Редактировать</a>
                <form method="POST" action="{{ route('progress_entries.destroy', $progressEntry->id) }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
                <a href="{{ route('progress_entries.index') }}" class="btn btn-primary ml-2">Вернуться к прогрессу тренировок</a>
            </div>

            <h3 class="mb-4">Посмотреть свой прогресс</h3>
            <a href="https://twitter.com/intent/tweet?text=I%20just%20completed%20a%20workout%20of%20{{ $progressEntry->duration }}%20minutes%20and%20burned%20{{ $progressEntry->calories_burned }}%20calories!%20Join%20me%20on%20Fitness%20App!" target="_blank" class="btn btn-info btn-block">Share on Twitter</a>
        </div>
    </div>
</div>
@endsection
