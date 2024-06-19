@extends('layouts.app')

@section('title', 'Профиль')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="card-title">Профиль</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <p><strong>Имя:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Возраст:</strong> {{ $user->profile->age }}</p>
            <p><strong>Вес:</strong> {{ $user->profile->weight }} кг</p>
            <p><strong>Рост:</strong> {{ $user->profile->height }} см</p>
            <p><strong>Цель:</strong> {{ $user->profile->fitness_goal }}</p>
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Редактировать профиль</a>
        </div>
    </div>
</div>
@endsection
