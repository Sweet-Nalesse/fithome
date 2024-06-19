<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    
    <meta name="description" content="Самостоятельные тренировки">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ФитХоум')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/animate.css/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap"
    rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/newstyle.css" type="text/css">
    <style>
        
        .rating i {
            color: #ffc107;
        }
        i{
            color: #ffc107;
        }

        .animated-button {
            transition: background-color 0.7s, color 0.3s;
        }

        .animated-button:hover {
            background-color: #007bff;
            color: white;
        }

        .navbar-custom {
            background-color: #111111;
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link,
        .navbar-custom .btn-link {
            color: white;
        }

        .navbar-custom .nav-link:hover,
        .navbar-custom .btn-link:hover {
            color: #1c40cf;
        }

        .card-custom {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card-custom:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            max-height: 200px;
            object-fit: cover;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 1rem;
            color: #6c757d;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .advantage-box {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            transition: background-color 0.3s;
        }

        .advantage-box:hover {
            background-color: #e9ecef;
        }

        .testimonial-box {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            transition: background-color 0.3s;
            text-align: center;
        }

        .testimonial-box:hover {
            background-color: #e9ecef;
        }
    </style>
</head>

<body class="bg-light text-dark">


    <!-- Header Section Begin -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="{{ route('welcome') }}">ФитХоум</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">О нас</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('classes') }}">Направления</a></li>
                    @auth
                     @if (!Auth::user()->is_admin)
                            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Главная</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('forums.index') }}">Блоги</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}">Курсы</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('messages.index') }}">Общий чат</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('history.index') }}">Записи прогресса</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('subscriptions.index') }}">Мои курсы</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('profile.show') }}">Профиль</a></li>
                        @endif
                        @if (Auth::user()->is_admin)
                            <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Пользователи</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('exercises.index') }}">Библиотека упражнений</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('workouts.index') }}">Тренировки</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('forums.index') }}">Блоги</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}">Курсы</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('messages.index') }}">Общий чат</a></li>
                        @endif
                    @endauth
                </ul>
                <ul class="navbar-nav ml-auto">
                    @auth
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">Выйти</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Войти</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Регистрация</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <div id="mobile-menu-wrap"></div>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer>
        @include('layouts.footer')
    </footer>

    @yield('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
</body>

</html>