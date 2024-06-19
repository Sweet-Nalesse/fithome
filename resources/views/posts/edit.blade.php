@extends('layouts.app')

@section('title', 'Редактирование поста')

@section('content')
<div class="container mt-5">
    <h1>Редактирование поста в {{ strip_tags($forum->name) }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('posts.update', $post->id) }}" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $post->title) }}" required>
            <div class="invalid-feedback">
                Пожалуйста, введите заголовок поста.
            </div>
        </div>
        <div class="form-group">
            <label for="body">Текст</label>
            <textarea id="body" name="body" class="form-control rich-text @error('body') is-invalid @enderror" required>{{ old('body', $post->body) }}</textarea>
            <div class="invalid-feedback">
                Пожалуйста, введите описание поста.
            </div>
        </div>
        <div class="form-group">
            <label for="image_url">Ссылка на изображение</label>
            <input type="url" id="image_url" name="image_url" class="form-control @error('image_url') is-invalid @enderror" value="{{ old('image_url', $post->image) }}">
            <div class="invalid-feedback">
                Пожалуйста, введите ссылку на изображение.
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Изменить</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('body');

    // Custom Bootstrap validation
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            var forms = document.getElementsByClassName('needs-validation');
            Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
@endsection

@section('styles')
<style>
    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .invalid-feedback {
        display: block;
    }
</style>
@endsection
