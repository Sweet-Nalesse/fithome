@extends('layouts.app')

@section('title', 'Профиль')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="card-title text-center">Профиль</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-8">
                    <p><strong>Имя:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Возраст:</strong> {{ $user->profile->age }}</p>
                    <p><strong>Вес:</strong> {{ $user->profile->weight }} кг</p>
                    <p><strong>Рост:</strong> {{ $user->profile->height }} см</p>
                    <p><strong>Цель:</strong> {{ $user->profile->fitness_goal }}</p>
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-block">Редактировать профиль</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    body {
        background-color: #f8f9fa;
    }

    .card {
        border-radius: 15px;
        border: none;
    }

    .card-title {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 1.5rem;
    }

    .rounded-circle {
        max-width: 150px;
        border: 3px solid #007bff;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    p {
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
    }

    .alert-success {
        margin-bottom: 1.5rem;
    }
</style>
@endsection