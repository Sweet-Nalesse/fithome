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
    <title>ФитХоум | О нас</title>

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
                            <li class="nav-item"><a class="nav-link" href="{{ route('progress_entries.index') }}">Записи прогресса</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('forums.index') }}">Блоги</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}">Курсы</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('subscriptions.index') }}">Подписки</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('messages.index') }}">Общий чат</a></li>
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
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb/classes-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>О нас</h2>
                        <div class="breadcrumb-option">
                            <a href="{{route('welcome')}}">Главная</a>
                            <span>< О нас</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- About Section Begin -->
    <section class="about-section about-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-pic">
                        <img src="img/about-pic.jpg" alt="">

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-text">
                        <h3>Добро пожаловать в наш сервис домашних тренировок!</h3>
                        <p class="first-para">Наш сервис создан для того, чтобы помочь вам достичь ваших фитнес-целей, не выходя из дома. Мы предлагаем широкий выбор программ тренировок, разработанных профессиональными тренерами, которые подойдут для любого уровня подготовки.</p>
                        <p class="second-para">Занимайтесь в удобное для вас время, следите за прогрессом и наслаждайтесь результатами. Наши программы разработаны так, чтобы вы могли тренироваться без дополнительного оборудования, используя только вес собственного тела.</p>
                        @auth
                        
                        
                    @else
                    
                <a href="{{route('login')}}" class="primary-btn signup-btn">Войти</a>
                 @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- About Counter Section Begin -->
    <div class="about-counter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-counter-text">
                        <div class="single-counter">
                            <h1 class="counter-num count">47</h1>
                            <span>+</span>
                            <p>Курсов</p>
                        </div>
                        <div class="single-counter">
                            <h1 class="counter-num count">50</h1>
                            <span>k+</span>
                            <p>Пользователей</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Counter Section End -->

    <!-- Gym Award Section Begin -->
    <section class="gym-award spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="award-text">
                        <h2>Награда за лучшую фитнес-программу</h2>
                        <p>Мы рады сообщить, что наш сервис ФитХоум был удостоен награды за лучшую фитнес-программу. Эта награда свидетельствует о нашем стремлении предоставлять высококачественные услуги и достигать высоких стандартов в области домашних тренировок.</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Gym Award Section End -->

    <!-- Banner Section Begin -->
    <section class="banner-section set-bg" data-setbg="img/banner-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-text">
                        <h2>Начните тренировки сегодня!</h2>
                        <p>Присоединяйтесь к нашему сообществу и достигайте своих фитнес-целей с профессиональными тренировками на дому. Получите первые результаты уже через неделю!"</p>
                        @auth
                        <a href="{{route('login')}}" class="primary-btn-reg signup-btn">Начать тренировки</a>
                        
                    @else
                    
                <a href="{{route('login')}}" class="primary-btn-reg signup-btn">Зарегистрироваться</a>
                 @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>

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