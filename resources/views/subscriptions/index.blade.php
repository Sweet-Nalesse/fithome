@extends('layouts.app')

@section('title', 'Подписки')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Мои Подписки</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        @foreach ($subscriptions as $subscription)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if ($subscription->course->image_url)
                        <img src="{{ $subscription->course->image_url }}" class="card-img-top" alt="{{ $subscription->course->title }}">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $subscription->course->title }}</h5>
                        <div class="mt-auto">
                            <p class="card-text"><strong>Цена:</strong> {{ $subscription->course->price }} рублей</p>
                            <a href="{{ route('subscriptions.show', $subscription->id) }}" class="btn btn-primary btn-block">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
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