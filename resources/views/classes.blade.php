<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gutim Template">
    <meta name="keywords" content="Gutim, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .rating i {
            color: #ffc107;
        }

        i {
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
    <title>ФитХоум | Направления</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/newstyle.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

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
                            <li class="nav-item"><a class="nav-link" href="{{ route('progress_entries.index') }}">Записи
                                    прогресса</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('forums.index') }}">Блоги</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}">Курсы</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('subscriptions.index') }}">Подписки</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('messages.index') }}">Общий чат</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('profile.show') }}">Профиль</a></li>
                        @endif
                        @if (Auth::user()->is_admin)
                            <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Пользователи</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('exercises.index') }}">Библиотека
                                    упражнений</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('workouts.index') }}">Тренировки</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('forums.index') }}">Блоги</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}">Курсы</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('messages.index') }}">Общий чат</a>
                            </li>
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
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb/classes-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Направления</h2>
                        <div class="breadcrumb-option">
                            <a href="{{ route('welcome') }}">Главная</a>
                            <span>> Направления</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Register Section Begin -->
    @auth
        
    @else
    <section class="register-section classes-page spad">
        <div class="container">
            <div class="classes-page-text">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="register-text">
                            <div class="section-title">
                                <h2>Зарегистрироваться сейчас</h2>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Имя</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Почта</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Пароль</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Подтвердить пароль</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" required>
                                </div>
                                <button type="submit" class="btn btn-warning">Зарегистрироваться</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    @endauth
    <!-- Register Section End -->

    <!-- Classes Section Begin -->
    <section class="classes-section classes-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Направления</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-class-item set-bg" data-setbg="img/classes/classes-1.jpg">
                        <div class="si-text">
                            <h4>Силовые тренировки</h4>
                        </div>
                    </div>
                    <div class="single-class-item set-bg" data-setbg="img/classes/classes-4.jpg">
                        <div class="si-text">
                            <h4>Кардио</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-class-item set-bg" data-setbg="img/classes/classes-2.jpg">
                        <div class="si-text">
                            <h4>Йога для беременных</h4>
                        </div>
                    </div>
                    <div class="single-class-item set-bg" data-setbg="img/classes/classes-5.jpg">
                        <div class="si-text">
                            <h4>Пилатес</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-class-item set-bg" data-setbg="img/classes/classes-3.jpg">
                        <div class="si-text">
                            <h4>Растяжка</h4>
                        </div>
                    </div>
                    <div class="single-class-item set-bg" data-setbg="img/classes/classes-6.jpg">
                        <div class="si-text">
                            <h4>Йога</h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>
    <!-- Classes Section End -->


    <!-- Trainer Table Schedule Section End -->

    <!-- Footer Banner Section Begin -->

    <!-- Footer Section Begin -->
    @extends('layouts.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
