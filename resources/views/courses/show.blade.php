@extends('layouts.app')

@section('title', $course->title)

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="card-title">{{ $course->title }}</h1>
            <p class="card-text">{!! $course->description !!}</p>
            <p class="card-text"><strong>Цена:</strong> {{ $course->price }} рублей</p>
            <div class="rating mb-3">
                <strong>Рейтинг:</strong>
                @for ($i = 1; $i <= 5; $i++)
                    <i class="fas fa-star{{ $i <= $course->averageRating() ? '' : '-o' }}" style="color: #ffc107;"></i>
                @endfor
                ({{ number_format($course->averageRating(), 2) }} / 5)
            </div>
            @auth
                @if(Auth::user()->is_admin)
                    <a class="btn btn-primary" href="{{ route('courses.edit', $course->id) }}">Редактировать</a>
                    <form method="POST" action="{{ route('courses.destroy', $course->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                @endif
            @endauth
            
            <a class="btn btn-success" href="{{ route('subscriptions.create', $course->id) }}">Купить</a>
            <a class="btn btn-secondary" href="{{ route('courses.index') }}">Вернуться к курсам</a>
            
            <h2 class="mt-5">Отзывы</h2>
            @foreach ($course->reviews as $review)
                <div class="review mb-3 p-3 border rounded">
                    <p><strong>{{ $review->user->name }}</strong> 
                    @for ($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star{{ $i <= $review->rating ? '' : '-o' }}" style="color: #ffc107;"></i>
                    @endfor
                    </p>
                    <p>{{ $review->comment }}</p>
                    @auth
                        @if(Auth::id() === $review->user_id)
                            <form method="POST" action="{{ route('reviews.destroy', ['course' => $course->id, 'review' => $review->id]) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                            </form>
                        @endif
                    @endauth
                </div>
            @endforeach

            @auth
                <h3>Добавить отзыв</h3>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('reviews.store', $course->id) }}" id="reviewForm" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="comment">Комментарий</label>
                        <textarea id="comment" name="comment" class="form-control" required>{{ old('comment') }}</textarea>
                        <div class="invalid-feedback">Пожалуйста, введите комментарий.</div>
                    </div>
                    <div class="form-group">
                        <label for="rating">Рейтинг</label>
                        <select id="rating" name="rating" class="form-control" required>
                            <option value="">Выберите рейтинг</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <div class="invalid-feedback">Пожалуйста, выберите рейтинг.</div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Добавить отзыв</button>
                    </div>
                </form>
            @endauth
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .rating i {
        color: #ffc107;
    }

    .review {
        background-color: #f8f9fa;
    }

    .card-title {
        font-size: 1.75rem;
        font-weight: bold;
    }

    .card-text {
        font-size: 1rem;
    }

    .btn-primary, .btn-success, .btn-danger, .btn-secondary {
        transition: background-color 0.3s, border-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    .btn-secondary:hover {
        background-color: #6c757d;
        border-color: #545b62;
    }
</style>
@endsection

@section('scripts')
<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
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
