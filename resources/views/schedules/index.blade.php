@extends('layouts.app')

@section('title', 'Расписание тренировок')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-semibold mb-4">Расписание тренировок</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Тренировка</th>
                <th class="px-4 py-2">Дата</th>
                <th class="px-4 py-2">Время</th>
                <th class="px-4 py-2">Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $schedule)
                <tr>
                    <td class="border px-4 py-2">{{ $schedule->workout->name }}</td>
                    <td class="border px-4 py-2">{{ $schedule->date }}</td>
                    <td class="border px-4 py-2">{{ $schedule->time }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('schedules.edit', $schedule->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Редактировать</a>
                        <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('schedules.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Добавить тренировку</a>
</div>
@endsection
