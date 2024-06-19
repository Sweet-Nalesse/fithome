<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        // Получение популярных курсов (добавьте логику получения популярных курсов)
        $popularCourses = Course::orderBy('popularity', 'desc')->take(6)->get();

        // Получение отзывов
        $testimonials = Testimonial::all();

        return view('home', compact('popularCourses', 'testimonials'));
    }
}