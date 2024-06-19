<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Course;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::where('user_id', Auth::id())->with('course')->get();
        return view('subscriptions.index', compact('subscriptions'));
    }

    public function create($courseId)
    {
        $course = Course::findOrFail($courseId);
        return view('subscriptions.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $existingSubscription = Subscription::where('user_id', Auth::id())
            ->where('course_id', $course->id)
            ->first();

        if ($existingSubscription) {
            return redirect()->route('subscriptions.index')->with('error', 'Вы уже подписаны на этот курс.');
        }

        Subscription::create([
            'user_id' => Auth::id(),
            'course_id' => $course->id,
        ]);

        return redirect()->route('subscriptions.index')->with('success', 'Подписка успешно оформлена.');
    }

    public function show($id)
    {
        $subscription = Subscription::where('id', $id)
            ->where('user_id', Auth::id())
            ->with('course.workouts')
            ->firstOrFail();

        return view('subscriptions.show', compact('subscription'));
    }
}
