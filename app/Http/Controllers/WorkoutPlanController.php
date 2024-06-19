<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkoutPlan;

class WorkoutPlanController extends Controller
{
    public function index()
    {
        $workoutPlans = WorkoutPlan::all();
        return view('workout_plans.index', compact('workoutPlans'));
    }

    public function create()
    {
        return view('workout_plans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        WorkoutPlan::create($request->all());

        return redirect()->route('workout-plans.index')
                         ->with('success', 'Workout plan created successfully.');
    }

    public function show($id)
    {
        $workoutPlan = WorkoutPlan::findOrFail($id);
        return view('workout_plans.show', compact('workoutPlan'));
    }

    public function edit($id)
    {
        $workoutPlan = WorkoutPlan::findOrFail($id);
        return view('workout_plans.edit', compact('workoutPlan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $workoutPlan = WorkoutPlan::findOrFail($id);
        $workoutPlan->update($request->all());

        return redirect()->route('workout-plans.index')
                         ->with('success', 'Workout plan updated successfully.');
    }

    public function destroy($id)
    {
        $workoutPlan = WorkoutPlan::findOrFail($id);
        $workoutPlan->delete();

        return redirect()->route('workout-plans.index')
                         ->with('success', 'Workout plan deleted successfully.');
    }
}
