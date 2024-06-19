<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Workout;
use App\Models\Exercise;
use App\Models\WorkoutHistory;
class WorkoutController extends Controller
{
    public function index(Request $request)
    {
        $query = Workout::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $workouts = $query->paginate(30);

        return view('workouts.index', compact('workouts', 'request'));
    }

    public function create()
    {
        $exercises = Exercise::all();
        $muscleGroups = Exercise::select('muscle_group')->distinct()->get();
        return view('workouts.create', compact('exercises', 'muscleGroups'));
    }

    public function store(Request $request)
    {
        $messages = [
            'title.required' => 'Поле "Заголовок" обязательно для заполнения.',
            'description.required' => 'Поле "Описание" обязательно для заполнения.',
            'level.required' => 'Поле "Уровень" обязательно для заполнения.',
            'video_url.url' => 'Поле "URL видео" должно содержать корректный URL.',
        ];

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'level' => 'required',
            'video_url' => 'nullable|url',
            'instructions' => 'nullable',
        ], $messages);

        $workout = Workout::create($request->all());
        $workout->exercises()->attach($request->exercises);

        return redirect()->route('workouts.index')
                         ->with('success', 'Тренировка успешно создана.');
    }

    public function show($id)
    {
        $workout = Workout::findOrFail($id);
        return view('workouts.show', compact('workout'));
    }

    public function edit($id)
    {
        $workout = Workout::findOrFail($id);
        $exercises = Exercise::all();
        $muscleGroups = Exercise::select('muscle_group')->distinct()->get();
        return view('workouts.edit', compact('workout', 'exercises', 'muscleGroups'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'title.required' => 'Поле "Заголовок" обязательно для заполнения.',
            'description.required' => 'Поле "Описание" обязательно для заполнения.',
            'level.required' => 'Поле "Уровень" обязательно для заполнения.',
            'level.in' => 'Поле "Уровень" должно быть одним из: beginner, intermediate, advanced.',
            'video_url.url' => 'Поле "URL видео" должно содержать корректный URL.',
        ];

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'level' => 'required|string|in:beginner,intermediate,advanced',
            'video_url' => 'nullable|url',
            'instructions' => 'nullable',
        ], $messages);

        $workout = Workout::findOrFail($id);
        $workout->update($request->all());
        $workout->exercises()->sync($request->exercises);

        return redirect()->route('workouts.index')
                        ->with('success', 'Тренировка успешно обновлена.');
    }

    public function destroy($id)
    {
        $workout = Workout::findOrFail($id);
        $workout->delete();

        return redirect()->route('workouts.index')
                        ->with('success', 'Тренировка успешно удалена.');
    }
    public function complete(Request $request, $id)
    {
        $workout = Workout::findOrFail($id);

        
        WorkoutHistory::create([
            'user_id' => $request->user()->id,
            'workout_id' => $workout->id,
            'completed_at' => now(),
        ]);

        return redirect()->route('workouts.show', $id)->with('success', 'Тренировка завершена и добавлена в историю.');
    }

}
