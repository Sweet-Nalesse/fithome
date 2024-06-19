@extends('layouts.app')

@section('title', $subscription->course->title)

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">{{ $subscription->course->title }}</h1>
    <p>{!! $subscription->course->description !!}</p>
    <p><strong>Цена:</strong> {{ $subscription->course->price }} рублей</p>

    @if ($subscription->course->image_url)
        <div class="text-center mb-4">
            <img src="{{ $subscription->course->image_url }}" alt="{{ $subscription->course->title }}" class="img-fluid" style="max-width: 400px;">
        </div>
    @endif

    <h2>Тренировки в курсе</h2>
    <ul class="list-group mb-4">
        @foreach ($subscription->course->workouts as $workout)
            <li class="list-group-item">
                <a href="{{ route('workouts.show', $workout->id) }}">{{ $workout->title }}</a>

                <p><strong>Уровень:</strong> {{ $workout->level }}</p>
                
                @if ($workout->workouts)
                    <div>
                        <h6>Инструкции:</h6>
                        <p>{{ $workout->instructions }}</p>
                    </div>
                @endif
            </li>
        @endforeach
    </ul>

    <a href="{{ route('subscriptions.index') }}" class="btn btn-secondary">Вернуться к подпискам</a>
</div>
@endsection

@section('styles')
<style>
    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
        border-color: #0056b3;
    }
</style>
@endsection

