<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VirtualTrainerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profile = $user->profile;

        // Пример алгоритма рекомендаций
        $recommendedWorkouts = Workout::where('level', $profile->level)
            ->orWhere('type', $profile->preferred_type)
            ->take(5)
            ->get();

        return view('virtual_trainer.index', compact('recommendedWorkouts'));
    }
}
