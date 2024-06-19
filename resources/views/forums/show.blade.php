@extends('layouts.app')

@section('title', $forum->name)

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">{{ $forum->name }}</h1>
    <p class="text-center text-muted">{!! $forum->description !!}</p>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="mb-4">Посты</h2>
    <div class="row">
        @foreach ($forum->posts as $post)
            <div class="col-md-4">
                <div class="card mb-4 card-custom">
                    @if ($post->image)
                        <img src="{{ $post->image }}" class="card-img-top" alt="{{ $post->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit(strip_tags($post->body), 50) }}</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary btn-block">Подробнее</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center mt-4">
        <a class="btn btn-primary btn-lg" href="{{ route('forums.posts.create', $forum->id) }}">Создать новый пост</a>
    </div>
</div>
@endsection

@section('styles')
<style>
    body {
        background-color: #f8f9fa;
    }

    h1 {
        color: #333;
        font-size: 2.5rem;
        font-weight: bold;
    }

    .text-muted {
        font-size: 1.1rem;
        color: #6c757d;
    }

    .card-custom {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card-custom:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .card-img-top {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        max-height: 200px;
        object-fit: cover;
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

    .btn-lg {
        padding: 0.75rem 1.5rem;
        font-size: 1.25rem;
    }
</style>
@endsection