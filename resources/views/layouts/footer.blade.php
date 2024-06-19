<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>О нас</h5>
                <p>ФитХоум - ваш персональный помощник для домашних тренировок. Достигайте своих фитнес-целей с нашими программами.</p>
            </div>
            <div class="col-md-4">
                <h5>Навигация</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('welcome') }}">Главная</a></li>
                    <li><a href="{{ route('about') }}">О нас</a></li>
                    <li><a href="{{ route('classes') }}">Направления</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Контактная информация</h5>
                <ul class="list-unstyled">
                    <li><i class="fa fa-phone"></i> +7 (906) 122-14-87</li>
                    <li><i class="fa fa-envelope"></i> nalessee@gmail.com</li>
                </ul>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 text-center">
                <p>&copy; 2024 ФитХоум. Все права защищены.</p>
            </div>
        </div>
    </div>
</footer>
<style>
    .footer-section {
    background: #111111;
    padding-top: 60px;
    padding-bottom: 30px;
    margin-top: 60px
}
</style>