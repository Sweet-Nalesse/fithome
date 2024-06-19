@extends('layouts.app')

@section('title', 'Прогресс тренировок')

@section('content')
<div class="container">
    <h1>Прогресс тренировок</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <ul class="list-group">
        @foreach ($progressEntries as $entry)
            <li class="list-group-item">
                <a href="{{ route('progress_entries.edit', $entry->id) }}">
                    {{ $entry->date }} - {{ $entry->workout->title }} ({{ $entry->duration }} минут)
                </a>
                <form method="POST" action="{{ route('progress_entries.destroy', $entry->id) }}" class="float-right">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                </form>
            </li>
        @endforeach
    </ul>

    <div class="mt-4">
        {{ $progressEntries->links() }}
    </div>

    <a href="{{ route('progress_entries.create') }}" class="btn btn-primary mt-3">Добавить новый прогресс</a>
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

    .list-group-item a {
        text-decoration: none;
        color: #333;
    }

    .list-group-item a:hover {
        text-decoration: underline;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
</style>
@endsection
