<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Review;
use App\Models\Workout;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('workout_type')) {
            $query->whereHas('workouts', function ($q) use ($request) {
                $q->where('type', $request->workout_type);
            });
        }

        $courses = $query->paginate(10);

        return view('courses.index', [
            'courses' => $courses,
            'search' => $request->search,
            'workout_type' => $request->workout_type
        ]);
    }

    public function create()
    {
        $workouts = Workout::all();
        return view('courses.create', compact('workouts'));
    }

    public function store(Request $request)
    {
        $messages = [
            'title.required' => 'Поле "Заголовок" обязательно для заполнения.',
            'description.required' => 'Поле "Описание" обязательно для заполнения.',
            'price.required' => 'Поле "Цена" обязательно для заполнения.',
            'price.numeric' => 'Поле "Цена" должно быть числом.',
            'image_url.url' => 'Поле "Ссылка на изображение" должно содержать корректный URL.',
            'workouts.array' => 'Поле "Упражнения" должно быть массивом.',
        ];

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image_url' => 'nullable|url',
            'workouts' => 'array',
        ], $messages);

        $course = Course::create($request->only(['title', 'description', 'price', 'image_url']));
        if ($request->has('workouts')) {
            $course->workouts()->sync($request->workouts);
        }

        return redirect()->route('courses.index')->with('success', 'Курс успешно создан.');
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $workouts = Workout::all();
        return view('courses.edit', compact('course', 'workouts'));
    }

    public function update(Request $request, Course $course)
    {
        $messages = [
            'title.required' => 'Поле "Заголовок" обязательно для заполнения.',
            'description.required' => 'Поле "Описание" обязательно для заполнения.',
            'price.required' => 'Поле "Цена" обязательно для заполнения.',
            'price.numeric' => 'Поле "Цена" должно быть числом.',
            'image_url.url' => 'Поле "Ссылка на изображение" должно содержать корректный URL.',
            'workouts.array' => 'Поле "Упражнения" должно быть массивом.',
        ];

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image_url' => 'nullable|url',
            'workouts' => 'array',
        ], $messages);

        $course->update($request->only(['title', 'description', 'price', 'image_url']));

        if ($request->has('workouts')) {
            $course->workouts()->sync($request->workouts);
        }

        return redirect()->route('courses.index')->with('success', 'Курс успешно обновлен.');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.index')
                         ->with('success', 'Курс успешно удален.');
    }

    public function destroyReview($courseId, $reviewId)
    {
        $review = Review::where('course_id', $courseId)->where('id', $reviewId)->firstOrFail();

        // Проверьте, что текущий пользователь является владельцем отзыва
        if (auth()->id() !== $review->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $review->delete();

        return redirect()->route('courses.show', $courseId)->with('success', 'Отзыв удален.');
    }
}
