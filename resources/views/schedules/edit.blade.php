@extends('layouts.app')

@section('title', 'Редактировать тренировку в расписании')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-semibold mb-4">Редактировать тренировку в расписании</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="workout_id" class="block text-sm font-medium text-gray-700">Тренировка</label>
            <select name="workout_id" id="workout_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @foreach ($workouts as $workout)
                    <option value="{{ $workout->id }}" {{ $schedule->workout_id == $workout->id ? 'selected' : '' }}>{{ $workout->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="date" class="block text-sm font-medium text-gray-700">Дата</label>
            <input type="date" name="date" id="date" value="{{ old('date', $schedule->date) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <div class="mb-4">
            <label for="time" class="block text-sm font-medium text-gray-700">Время</label>
            <input type="time" name="time" id="time" value="{{ old('time', $schedule->time) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Обновить</button>
        </div>
    </form>
</div>
@endsection
