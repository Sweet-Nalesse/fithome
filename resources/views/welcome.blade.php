<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Самостоятельные тренировки">
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
    <title>ФитХоум | Главаная</title>

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

    <!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="img/hero-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="hero-text">
                        <span>ФитХоум</span>
                        <h1>Самостоятельные тренировки</h1>
                        <p>ФитХоум<br /> Ваш персональный помощник для самостоятельных тренировок тренировок</p>
                </div>
                @auth
                        
                        <a href="{{route('courses.index')}}" class="primary-btn-reg signup-btn">Перейти в профиль</a>
                    @else
                    
                <a href="{{route('login')}}" class="primary-btn signup-btn">Войти</a>
                 @endauth
            </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Section Begin -->
    <section class="about-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-pic">
                        <img src="img/about-pic.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-text">
                        <h3>Добро пожаловать в наш сервис самостоятельных тренировок!</h3>
                        <p class="first-para">Наш сервис создан для того, чтобы помочь вам достичь ваших фитнес-целей, не выходя из дома. Мы предлагаем широкий выбор программ тренировок, разработанных профессиональными тренерами, которые подойдут для любого уровня подготовки.</p>
                        <p class="first-para">Занимайтесь в удобное для вас время, следите за прогрессом и наслаждайтесь результатами. Наши программы разработаны так, чтобы вы могли тренироваться без дополнительного оборудования, используя только вес собственного тела.</p>
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

    <!-- Services Section Begin -->
    <section class="services-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="services-pic">
                        <img src="img/services/service-pic.webp" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="service-items">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="services-item bg-gray">
                                    <img src="img/services/service-icon-1.png" alt="">
                                    <h4>Стратегий</h4>
                                    <p>Эффективные стратегии фитнеса для достижения ваших целей в домашних условиях.</p>
                                </div>
                                <div class="services-item bg-gray pd-b">
                                    <img src="img/services/service-icon-3.png" alt="">
                                    <h4>Тренировки</h4>
                                    <p>Комплексные тренировки, подходящие для всех уровней подготовки.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="services-item">
                                    <img src="img/services/service-icon-2.png" alt="">
                                    <h4>Йога</h4>
                                    <p>Руководства по йоге для улучшения гибкости, снижения стресса и ментальной ясности.</p>
                                </div>
                                <div class="services-item pd-b">
                                    <img src="img/services/service-icon-4.png" alt="">
                                    <h4>Похудение</h4>
                                    <p>Программы для снижения веса с эффективными тренировками и рекомендациями по питанию.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Classes Section Begin -->
    
    <!-- Testimonial Section Begin -->
    <section class="testimonial-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Отзывы</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="testimonial-slider owl-carousel">
                        <div class="testimonial-item">
                            <p>Мне очень понравились домашние тренировки! Программы действительно эффективные, и я уже вижу результаты. Удобно, что можно тренироваться в любое время.</p>
                            <div class="ti-author">
                                <h4>Анна К.</h4>
                            </div>
                        </div>
                        <div class="testimonial-item">
                            <p>Йога-сессии просто потрясающие! Инструкции понятные, а упражнения помогают снять стресс и улучшить гибкость. Очень доволен!</p>
                            <div class="ti-author">
                                <h4>Иван П.</h4>
                            </div>
                        </div>
                        <div class="testimonial-item">
                            <p>Спасибо за замечательные кардиотренировки! Они помогли мне сбросить вес и улучшить свою физическую форму. Рекомендую всем!</p>
                            <div class="ti-author">
                                <h4>Екатерина М.</h4>
                            </div>
                        </div>
                        <div class="testimonial-item">
                            <p>Пилатес-программы просто чудо! Заметила улучшение осанки и уменьшение боли в спине. Рекомендую всем, кто хочет заняться своим здоровьем.</p>
                            <div class="ti-author">
                                <h4>Ольга В.</h4>
                            </div>
                        </div>
                        <div class="testimonial-item">
                            <p>Функциональные тренировки очень полезны для повседневной жизни. Чувствую себя намного более гибким и сильным. Спасибо!</p>
                            <div class="ti-author">
                                <h4>Сергей Н.</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->

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
    <!-- Banner Section End -->
    <!-- Latest Blog Section Begin -->
   
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