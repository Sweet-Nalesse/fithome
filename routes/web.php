<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkoutPlanController;
use App\Http\Controllers\ProgressEntryController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\VirtualTrainerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HistoryController;
// Маршруты для всех пользователей
Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::get('/about', function () {
    return view('about');
})->name('about');



Route::get('/blog', function () {
    return view('blog');
})->name('blog');



Route::get('contact', function () {
    return view('contact');
})->name('contact');



Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');


Route::get('/blog-details', function () {
    return view('blog-details');
})->name('blog-details');


Route::get('/classes', function () {
    return view('classes');
})->name('classes');


Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('redirectIfAuthenticated');
Route::post('register', [RegisterController::class, 'register'])->middleware('redirectIfAuthenticated');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('redirectIfAuthenticated');
Route::post('login', [LoginController::class, 'login'])->middleware('redirectIfAuthenticated');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');



// Маршруты для зарегистрированных пользователей
Route::middleware('auth')->group(function () {
    // Домашняя страница
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Профиль
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');

    // Пользовательский профиль
    Route::get('profiles/create', [UserProfileController::class, 'create'])->name('profiles.create');
    Route::post('profiles', [UserProfileController::class, 'store'])->name('profiles.store');
    Route::get('profiles/{profile}', [UserProfileController::class, 'show'])->name('profiles.show');
    Route::get('profiles/{profile}/edit', [UserProfileController::class, 'edit'])->name('profiles.edit');
    Route::put('profiles/{profile}', [UserProfileController::class, 'update'])->name('profiles.update');



    
    // Комментарий
    Route::resource('posts.comments', CommentController::class)->only(['store', 'destroy', 'edit', 'update']);  

    // Прогресс тренировок
    Route::resource('progress_entries', ProgressEntryController::class);

    // Чаты
    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('messages', [MessageController::class, 'store'])->name('messages.store');
    Route::get('messages/fetch', [MessageController::class, 'fetchMessages'])->name('messages.fetch');
    Route::get('messages/{message}/edit', [MessageController::class, 'edit'])->name('messages.edit');
    Route::put('messages/{message}', [MessageController::class, 'update'])->name('messages.update');
    Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

    // Библиотека упражнений
    Route::resource('exercises', ExerciseController::class);

    // Форум
    Route::resource('forums', ForumController::class);
    Route::resource('forums.posts', PostController::class)->shallow();

    // Каталог тренировок
    Route::resource('workouts', WorkoutController::class);
    Route::get('workouts/start/{workout}', [WorkoutController::class, 'start'])->name('workouts.start');
    Route::post('workouts/{id}/complete', [WorkoutController::class, 'complete'])->name('workouts.complete');
    Route::resource('workout-plans', WorkoutPlanController::class);

    // Курсы и подписки
    Route::resource('courses', CourseController::class)->middleware('auth');
Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');
Route::get('/subscriptions/create/{course}', [SubscriptionController::class, 'create'])->name('subscriptions.create');
Route::post('/subscriptions/{course}', [SubscriptionController::class, 'store'])->name('subscriptions.store');
Route::get('/subscriptions/{id}', [SubscriptionController::class, 'show'])->name('subscriptions.show');

//Историй тренировок
Route::get('history', [HistoryController::class, 'index'])->name('history.index');


// Виртуальный тренер
Route::get('virtual-trainer', [VirtualTrainerController::class, 'index'])->name('virtual-trainer.index');



// отзывы
Route::post('courses/{course}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::delete('courses/{course}/reviews/{review}', [CourseController::class, 'destroyReview'])->name('reviews.destroy');
});

// Маршруты для администраторов
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('users', UserController::class);
    Route::resource('courses', CourseController::class)->except(['index', 'show']); 
});