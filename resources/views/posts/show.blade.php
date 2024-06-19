@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="container">
    <h1>{{ strip_tags($post->title) }}</h1>
    <p>{!! $post->body !!}</p>

    @can('update', $post)
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary">Редактировать</a>
        <form method="POST" action="{{ route('posts.destroy', $post->id) }}" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
    @endcan

    <a href="{{ route('forums.show', $post->forum->id) }}" class="btn btn-primary">Вернуться к форуму</a>

    <h2 class="mb-4">Комментарии</h2>

    @foreach ($post->comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <p>{{ $comment->body }}</p>
                <p class="text-muted">Комментарий от {{ $comment->user->name }} {{ $comment->created_at->format('d M Y, H:i') }}</p>
                @can('update', $comment)
                    <a href="{{ route('posts.comments.edit', [$post->id, $comment->id]) }}" class="btn btn-secondary btn-sm">Редактировать</a>
                @endcan
                @can('delete', $comment)
                    <form method="POST" action="{{ route('posts.comments.destroy', [$post->id, $comment->id]) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                    </form>
                @endcan
            </div>
        </div>
    @endforeach

    <h3 class="mb-4">Добавить комментарий</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('posts.comments.store', $post->id) }}">
        @csrf
        <div class="form-group">
            <label for="body">Комментарий:</label>
            <textarea name="body" id="body" class="form-control" rows="3">{{ old('body') }}"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Добавить комментарий</button>
        </div>
    </form>
</div>
@endsection
