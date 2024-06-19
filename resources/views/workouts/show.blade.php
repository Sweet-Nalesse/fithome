@extends('layouts.app')

@section('title', $workout->title)

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">{{ strip_tags ($workout->title) }}</h1>
    <p>{!! $workout->description !!}</p>
    <p><strong>Уровень:</strong> {{ $workout->level }}</p>
    <p><strong>Тип:</strong> {{ $workout->type }}</p>
    

    @if ($workout->video_url)
        <div class="video-wrapper mb-4 text-center">
            <video width="100%" height="auto" controls>
                <source src="{{ $workout->video_url }}" type="video/mp4">
                Ваш браузер не поддерживает формат данного видео.
            </video>
        </div>
    @endif



    <ul class="list-group mb-4">
        @foreach ($workout->exercises as $exercise)
            <li class="list-group-item">
                <h5>{{ $exercise->name }}</h5>
                <p>{{ $exercise->description }}</p>
                @if ($exercise->media_url)
                    <div class="media-wrapper mb-4 text-center">
                        @if (preg_match('/\.(jpeg|jpg|gif|png)$/', $exercise->media_url))
                            <img src="{{ $exercise->media_url }}" class="img-fluid" alt="{{ $exercise->name }}">
                        @elseif (preg_match('/\.(mp4|webm)$/', $exercise->media_url))
                            <video width="100%" height="auto" controls>
                                <source src="{{ $exercise->media_url }}" type="video/mp4">
                                Ваш браузер не поддерживает формат данного видео.
                            </video>
                        @endif
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
    @auth
    @if(Auth::user()->is_admin)
        <div class="text-center mt-4">
            <a href="{{ route('workouts.edit', $workout->id) }}" class="btn btn-warning mt-3">Редактировать</a>
            <form method="POST" action="{{ route('workouts.destroy', $workout->id) }}" class="d-inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-3">Удалить</button>
            </form>
        </div>
    @endif
@endauth
@auth
@if (!Auth::user()->is_admin)
<form method="POST" action="{{ route('workouts.complete', $workout->id) }}" style="display:inline;">
    @csrf
    <button type="submit" class="btn btn-success">Завершить тренировку</button>
</form>
@endif
@endauth

    

    <a href="{{ route('subscriptions.index') }}" class="btn btn-secondary mt-3">Вернуться к покупкам</a>
</div>
@endsection
