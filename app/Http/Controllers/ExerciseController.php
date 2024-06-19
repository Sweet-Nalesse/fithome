<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exercise;

class ExerciseController extends Controller
{
    public function index(Request $request)
    {
        $muscleGroup = $request->input('muscle_group');
        $query = Exercise::query();

        if ($muscleGroup) {
            $query->where('muscle_group', $muscleGroup);
        }

        $exercises = $query->get();

        return view('exercises.index', compact('exercises', 'muscleGroup'));
    }

    public function create()
    {
        return view('exercises.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'muscle_group' => 'required',
            'media_url' => 'nullable|url',
        ]);

        Exercise::create($request->all());

        return redirect()->route('exercises.index')
                         ->with('success', 'Exercise created successfully.');
    }

    public function show($id)
    {
        $exercise = Exercise::findOrFail($id);
        return view('exercises.show', compact('exercise'));
    }

    public function edit($id)
    {
        $exercise = Exercise::findOrFail($id);
        return view('exercises.edit', compact('exercise'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'muscle_group' => 'required',
            'media_url' => 'required|url',
        ]);

        $exercise = Exercise::findOrFail($id);
        $exercise->update($request->all());

        return redirect()->route('exercises.index')
                         ->with('success', 'Exercise updated successfully.');
    }

    public function destroy($id)
    {
        $exercise = Exercise::findOrFail($id);
        $exercise->delete();

        return redirect()->route('exercises.index')
                         ->with('success', 'Exercise deleted successfully.');
    }
}
