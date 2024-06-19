<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ScheduleReminder;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::where('user_id', Auth::id())->get();
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $workouts = Workout::all();
        return view('schedules.create', compact('workouts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'workout_id' => 'required|exists:workouts,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'email' => 'required|email',
        ]);

        $schedule = Schedule::create([
            'user_id' => Auth::id(),
            'workout_id' => $request->workout_id,
            'date' => $request->date,
            'time' => $request->time,
        ]);

        // Отправка уведомления
        Mail::to($request->email)->send(new ScheduleReminder($schedule));

        return response()->json(['success' => true]);
    }

    public function edit(Schedule $schedule)
    {
        $this->authorize('update', $schedule);
        $workouts = Workout::all();
        return view('schedules.edit', compact('schedule', 'workouts'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $this->authorize('update', $schedule);

        $request->validate([
            'workout_id' => 'required|exists:workouts,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        $schedule->update([
            'workout_id' => $request->workout_id,
            'date' => $request->date,
            'time' => $request->time,
        ]);

        return redirect()->route('schedules.index')->with('success', 'Расписание обновлено.');
    }

    public function destroy(Schedule $schedule)
    {
        $this->authorize('delete', $schedule);
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Тренировка удалена из расписания.');
    }
}
