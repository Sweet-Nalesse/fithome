@extends('layouts.app')

@section('title', 'Старт тренировок')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $workout->title }}</h1>
            <p>{{ $workout->description }}</p>
            <p><strong>Уровень:</strong> {{ $workout->level }}</p>
            <p><strong>Длительность:</strong> {{ $workout->duration }} минут</p>

            @if ($workout->video_url)
                <div class="video-wrapper">
                    <video width="100%" height="auto" controls>
                        <source src="{{ $workout->video_url }}" type="video/mp4">
                        Ваш браузер не поддерживает формат данного видео.
                    </video>
                </div>
            @endif

            @if ($workout->instructions)
                <div>
                    <h3>Инструкции:</h3>
                    <p>{{ $workout->instructions }}</p>
                </div>
            @endif
        </div>
        <div class="col-md-4">
            <div class="timer-wrapper bg-light p-3">
                <h3>Таймер</h3>
                <div id="timer" class="display-3 text-center">{{ $workout->duration }}:00</div>
                <button class="btn btn-primary btn-block mt-3" onclick="startTimer()">Начать</button>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('workouts.index') }}" class="btn btn-secondary">Вернуться к тренировкам</a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function startTimer() {
        var duration = {{ $workout->duration * 60 }};
        var timer = document.getElementById('timer');
        var interval = setInterval(function() {
            var minutes = parseInt(duration / 60, 10);
            var seconds = parseInt(duration % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            timer.textContent = minutes + ":" + seconds;

            if (--duration < 0) {
                clearInterval(interval);
                alert('Тренировка завершена!');
            }
        }, 1000);
    }
</script>
@endsection
