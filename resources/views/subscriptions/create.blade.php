@extends('layouts.app')

@section('title', 'Покупка курса ' . $course->title)

@section('content')
<div class="container">
    <h1>Подписка на {{ $course->title }}</h1>
    <p>{{ $course->description }}</p>
    <p>Цена: {{ $course->price }} рублей</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('subscriptions.store', $course->id) }}">
        @csrf
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Купить</button>
        </div>
    </form>

    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-secondary">Вернуться к курсам</a>
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

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }

    .alert-danger ul {
        padding-left: 20px;
    }
</style>
@endsection
