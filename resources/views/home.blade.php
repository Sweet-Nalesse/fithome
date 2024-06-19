@extends('layouts.app')

@section('title', 'Главная страница профиля')

@section('content')
    @auth
        @if (!Auth::user()->is_admin)
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Основной контент -->
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active"
                                    style="background-image: url('https://shop-massage.ru/wp-content/uploads/0/8/e/08ed5f49244a58636910c62b05493143.jpeg'); height: 500px; background-size: cover; background-position: center;">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Добро пожаловать в ФитХоум</h5>
                                        <p>Ваш лучший выбор для домашних тренировок.</p>
                                    </div>
                                </div>
                                <div class="carousel-item"
                                    style="background-image: url('https://avatars.dzeninfra.ru/get-zen_doc/9366206/pub_64552b00161e983c6b617ee6_64552b73f29c4713a1c22524/scale_1200'); height: 500px; background-size: cover; background-position: center;">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Достигайте своих целей</h5>
                                        <p>Лучшая программа тренировок и питания для вас.</p>
                                    </div>
                                </div>
                                <div class="carousel-item"
                                    style="background-image: url('https://rosenheimsbeste.de/content/uploads/2021/01/Sport-zuhause.jpeg'); height: 500px; background-size: cover; background-position: center;">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Будьте в форме</h5>
                                        <p>Тренируйтесь дома с нашими профессиональными тренерами.</p>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                        <!-- Карточки с информацией -->
                        <div class="row mt-5">
                            <div class="col-md-4">
                                <div class="card h-100 reveal">
                                    <img src="https://img.freepik.com/free-photo/woman-working-out-after-online-fitness-instructor_23-2149240225.jpg?w=1380&t=st=1718548279~exp=1718548879~hmac=e769eee85746381fe91d92149cc94981f052772acd72eef578ccd47885ee5b91"
                                        class="card-img-top" alt="Курсы">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">Курсы</h5>
                                        <p class="card-text">Получите доступ к нашим курсам тренировок и питания, разработанным
                                            профессионалами.</p>
                                        <a href="{{ route('courses.index') }}" class="btn btn-primary mt-auto">Перейти к
                                            курсам</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 reveal">
                                    <img src="https://tvinforms.ru/wp-content/uploads/2023/03/forum.jpg" class="card-img"
                                        alt="Форумы">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">Форумы</h5>
                                        <p class="card-text">Общайтесь с другими участниками, задавайте вопросы и делитесь
                                            опытом на наших форумах.</p>
                                        <a href="{{ route('forums.index') }}" class="btn btn-primary mt-auto">Перейти к
                                            форумам</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 reveal">
                                    <img src="https://smart-lab.ru/uploads/2023/images/00/78/53/2023/11/22/65ddc2.webp?4497"
                                        class="card-img" alt="Общий чат">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">Общий чат</h5>
                                        <p class="card-text">Присоединяйтесь к общему чату для живого общения и получения
                                            оперативной поддержки.</p>
                                        <a href="{{ route('messages.index') }}" class="btn btn-primary mt-auto">Перейти в
                                            чат</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Популярные курсы -->
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <h2 class="text-center">Популярные курсы</h2>
                                <div class="row">
                                    @foreach ($popularCourses as $course)
                                        <div class="col-md-4 mb-4 d-flex align-items-stretch reveal">
                                            <div class="card h-100">
                                                @if ($course->image_url)
                                                    <img src="{{ $course->image_url }}" class="card-img-top"
                                                        alt="{{ $course->title }}">
                                                @endif
                                                <div class="card-body d-flex flex-column">
                                                    <h5 class="card-title">{{ $course->title }}</h5>
                                                    <div class="rating mb-2">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <i
                                                                class="fas fa-star{{ $i <= $course->averageRating() ? '' : '-o' }}"></i>
                                                        @endfor
                                                        ({{ number_format($course->averageRating(), 2) }} / 5)
                                                    </div>
                                                    <p class="card-text">{!! Str::limit($course->description, 100) !!}</p>
                                                    <p class="card-text mt-auto"><strong>Цена:</strong> {{ $course->price }}
                                                        рублей</p>
                                                    <a href="{{ route('courses.show', $course->id) }}"
                                                        class="btn btn-primary btn-block mt-auto">Подробнее</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Часто задаваемые вопросы -->
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <h2 class="text-center">Часто задаваемые вопросы</h2>
                                <div class="accordion" id="faqAccordion">
                                    <div class="card reveal">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    Как начать тренироваться?
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                            data-parent="#faqAccordion">
                                            <div class="card-body">
                                                Зарегистрируйтесь на сайте, выберите программу тренировок и начните заниматься в
                                                удобное для вас время.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card reveal">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseTwo" aria-expanded="false"
                                                    aria-controls="collapseTwo">
                                                    Нужно ли специальное оборудование?
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                            data-parent="#faqAccordion">
                                            <div class="card-body">
                                                Большинство наших программ не требуют специального оборудования. Вы можете
                                                использовать вес собственного тела для тренировок.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card reveal">
                                        <div class="card-header" id="headingThree">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseThree" aria-expanded="false"
                                                    aria-controls="collapseThree">
                                                    Как следить за прогрессом?
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                            data-parent="#faqAccordion">
                                            <div class="card-body">
                                                В личном кабинете вы можете отслеживать ваш прогресс, а также получать
                                                рекомендации по улучшению результатов.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endauth
    @if (Auth::check() && Auth::user()->is_admin)
        <div class="container mt-5">
            <h2>Админ панель</h2>
            <p>Это ваша панель управления сайтом</p>
            <div class="list-group">
                <a class="list-group-item list-group-item-action" href="{{ route('workouts.index') }}">Тренировки</a>

                <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action">Управление
                    пользователями</a>
                <a href="{{ route('workouts.index') }}" class="list-group-item list-group-item-action">Управление
                    тренировками</a>
                <a href="{{ route('courses.index') }}" class="list-group-item list-group-item-action">Управление
                    курсами</a>
                <a href="{{ route('forums.index') }}" class="list-group-item list-group-item-action">Управление
                    форумами</a>
                <a href="{{ route('exercises.index') }}" class="list-group-item list-group-item-action">Библиотека
                    упражнений</a>
                <a href="{{ route('messages.index') }}" class="list-group-item list-group-item-action">Управление общим
                    чатом</a>
            </div>
        </div>
    @endif
@endsection

@section('styles')
    <style>
        .advantage-box {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .advantage-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .advantage-box img {
            width: 100px;
            height: 100px;
        }

        .carousel-item {
            height: 500px;
            background-size: cover;
            background-position: center;
        }

        .carousel-caption h5,
        .carousel-caption p {
            color: white;
        }

        .carousel-caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .carousel-indicators li {
            background-color: #007bff;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
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

        .btn-primary,
        .btn-success,
        .btn-danger,
        .btn-secondary {
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .btn-secondary:hover {
            background-color: #6c757d;
            border-color: #545b62;
        }

        .rating .fa-star {
            color: #ffc107;
        }
    </style>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $('.carousel').carousel({
            interval: 3000
        });

        function reveal() {
            var reveals = document.querySelectorAll(".reveal");
            for (var i = 0; i < reveals.length; i++) {
                var windowHeight = window.innerHeight;
                var elementTop = reveals[i].getBoundingClientRect().top;
                var elementVisible = 150;
                if (elementTop < windowHeight - elementVisible) {
                    reveals[i].classList.add("active");
                } else {
                    reveals[i].classList.remove("active");
                }
            }
        }

        window.addEventListener("scroll", reveal);

        reveal();

        document.querySelectorAll('.faq-question').forEach(item => {
            item.addEventListener('click', function() {
                this.parentNode.classList.toggle('active');
            });
        });
    </script>
@endsection
