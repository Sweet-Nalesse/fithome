@extends('layouts.app')

@section('title', 'История тренировок')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Записи прогресса</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($histories->isEmpty())
        <p class="text-center">Нет завершенных тренировок.</p>
        @else
        <div class="list-group">
            @foreach ($histories as $history)
                <div class="list-group-item">
                    <h5>{{ $history->workout->title }}</h5>
                    <p>Дата завершения: {{ $history->formatted_completed_at }}</p>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
