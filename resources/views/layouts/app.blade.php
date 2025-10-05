<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Больница</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .main-content {
            /*margin-right: 340px;*/
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">🏥 Больница</a>
        <div class="navbar-nav">
            @auth
                @if(Auth::user()->role === 'admin')
                    <a class="nav-link" href="{{ route('posts.index') }}">Должности</a>
                    <a class="nav-link" href="{{ route('doctors.index') }}">Врачи</a>
                    <a class="nav-link" href="{{ route('records.index') }}">Записи</a>
                    <a class="nav-link" href="{{ route('rooms.index') }}">Кабинеты</a>
                    <a class="nav-link" href="{{ route('users.index') }}">Пользователи</a>
                @else
                    <a class="nav-link" href="{{ route('appointment.create') }}">Запись к врачу</a>
                    <a class="nav-link" href="{{ route('records.my') }}">Мои записи</a>
                @endif
            @endauth
        </div>

        <div class="navbar-nav ms-auto">
            @auth
                <span class="navbar-text me-3">
                    {{ Auth::user()->surname }} {{ Auth::user()->name }} ({{ Auth::user()->role }})
                </span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Выйти</button>
                </form>
            @else
                <a class="nav-link" href="{{ route('login') }}">Войти</a>
                <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
            @endauth
        </div>
    </div>
</nav>



<div class="main-content">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        @php
            $hasLeftAd = View::hasSection('advertising_left');
            $hasRightAd = View::hasSection('advertising_right');
        @endphp

        <div class="d-flex justify-content-between p-2">
            @if($hasLeftAd)
                <div class="align-items-start">
                    @yield('advertising_left')
                </div>
            @endif

            <div class="align-items-center flex-grow-1">
                @yield('content')
            </div>

            @if($hasRightAd)
                <div class="align-items-end">
                    @yield('advertising_right')
                </div>
            @endif
        </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).on('click', '.bugs', function () {
        window.location.href = 'https://store.steampowered.com/app/367520/Hollow_Knight/';
    });
    $(document).on('click', '.boks', function () {
        window.location.href = 'https://dzen.ru/a/aNP3LFGJH2kLca98/';
    });
    $(document).on('click', '.alabuga', function () {
        window.location.href = 'https://polytech.alabuga.ru/';
    });
    $(document).on('click', '.driver', function () {
        window.location.href = 'https://www.nvidia.com/en-eu/geforce/drivers/';
    });
    $(document).on('click', '.beer-craft', function () {
        window.location.href = 'https://baltika4you.ru/';
    });
    $(document).on('click', '.secret', function () {
        window.location.href = 'https://www.forbes.ru/forbeslife-photogallery/240206-14-sekretov-dolgoletiya-ot-samyh-staryh-lyudey-planety';
    });
    $(document).on('click', '.money', function () {
        window.location.href = 'https://1xbet-kz.bet/ru/';
    });
    $(document).on('click', '.terapiya', function () {
        window.location.href = 'https://remedium.ru/news/urinoterapiya-drevnyaya-prakti/';
    });
    $(document).on('click', '.help', function () {
        window.location.href = 'https://krasnoeibeloe.ru/';
    });
    $(document).on('click', '.library', function () {
        window.location.href = 'https://www.rsl.ru/';
    });
    $(document).on('click', '.samokat', function () {
        window.location.href = 'https://samokat-clever.ru/';
    });
    $(document).on('click', '.infocigan', function () {
        window.location.href = 'https://minjust.gov.ru/ru/pages/reestr-inostryannykh-agentov/';
    });
    $(document).on('click', '.lavka', function () {
        window.location.href = 'https://yandekslavka.ru/';
    });
</script>
</body>
</html>
