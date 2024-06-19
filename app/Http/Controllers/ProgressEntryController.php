<?php

namespace App\Http\Controllers;

use App\Models\ProgressEntry;
use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgressEntryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $progressEntries = Auth::user()->progressEntries()->paginate(10);
        return view('progress_entries.index', compact('progressEntries'));
    }

    public function create()
    {
        $workouts = Workout::all();
        return view('progress_entries.create', compact('workouts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'workout_id' => 'required|exists:workouts,id',
            'date' => 'required|date',
            'duration' => 'required|integer',
            'calories_burned' => 'required|integer',
        ]);

        ProgressEntry::create([
            'user_id' => Auth::id(),
            'workout_id' => $request->workout_id,
            'date' => $request->date,
            'duration' => $request->duration,
            'calories_burned' => $request->calories_burned,
        ]);

        return redirect()->route('progress_entries.index')->with('success', 'Прогресс успешно добавлен.');
    }

    public function edit(ProgressEntry $progressEntry)
    {
        $this->authorize('update', $progressEntry);
        $workouts = Workout::all();
        return view('progress_entries.edit', compact('progressEntry', 'workouts'));
    }

    public function update(Request $request, ProgressEntry $progressEntry)
    {
        $this->authorize('update', $progressEntry);

        $request->validate([
            'workout_id' => 'required|exists:workouts,id',
            'date' => 'required|date',
            'duration' => 'required|integer',
            'calories_burned' => 'required|integer',
        ]);

        $progressEntry->update([
            'workout_id' => $request->workout_id,
            'date' => $request->date,
            'duration' => $request->duration,
            'calories_burned' => $request->calories_burned,
        ]);

        return redirect()->route('progress_entries.index')->with('success', 'Прогресс успешно обновлен.');
    }

    public function destroy(ProgressEntry $progressEntry)
    {
        $this->authorize('delete', $progressEntry);
        $progressEntry->delete();
        return redirect()->route('progress_entries.index')->with('success', 'Прогресс успешно удален.');
    }
}

