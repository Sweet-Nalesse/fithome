<header class="header-section">
    <div class="container">
        <div class="logo">
            <a href="{{ route('welcome') }}" class="text-white">ФитХоум</a>
        </div>
        <div class="nav-menu">
            <nav class="mainmenu mobile-menu">
                <ul>
                    <li class="active"><a href="{{ route('welcome') }}">Главная</a></li>
                    <li><a href="{{ route('about') }}">О нас</a></li>
                    <li><a href="{{ route('classes') }}">Направления</a></li>
                    <li><a href="{{ route('gallery') }}">Галерея</a></li>
                    <li><a href="{{ route('contact') }}">Контакты</a></li>
                </ul>
            </nav>
            <a href="{{ route('login') }}" class="primary-btn signup-btn">Войти</a>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<style>
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8f9fa;
}

.header-section, .footer-section {
    background-color: #1b1b1b;
    color: white;
    padding: 20px 0;
}

.header-section a, .footer-section a {
    color: #f8f9fa;
    text-decoration: none;
}

.header-section a:hover, .footer-section a:hover {
    color: #adb5bd;
}

.header-section .logo {
    font-size: 1.5rem;
    font-weight: bold;
}

.header-section .nav-menu {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header-section .mainmenu ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    gap: 15px;
}

.header-section .mainmenu ul li {
    display: inline;
}

.header-section .mainmenu ul li a {
    color: white;
    font-weight: 500;
    padding: 5px 10px;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
}

.header-section .mainmenu ul li a:hover {
    background-color: #343a40;
    color: white;
}

.header-section .signup-btn {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s, color 0.3s;
}

.header-section .signup-btn:hover {
    background-color: #0056b3;
    color: white;
}

.footer-section h5 {
    font-size: 1.25rem;
    margin-bottom: 1rem;
    color: #fff;
}

.footer-section p, .footer-section ul, .footer-section li {
    font-size: 1rem;
    line-height: 1.6;
    margin: 0 0 10px;
}

.footer-section ul {
    padding-left: 0;
    list-style: none;
}

.footer-section ul li {
    margin-bottom: 10px;
}

.footer-section ul li i {
    margin-right: 10px;
    color: #007bff;
}

.footer-section .text-center {
    margin-top: 20px;
    font-size: 0.875rem;
}

.footer-section .row {
    justify-content: space-between;
}
</style>
