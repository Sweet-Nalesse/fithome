<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkoutHistory;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $histories = WorkoutHistory::where('user_id', $request->user()->id)->orderBy('completed_at', 'desc')->get();
        return view('history.index', compact('histories'));
    }
}
