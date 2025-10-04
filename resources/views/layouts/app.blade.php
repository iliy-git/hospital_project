<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Больница</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .main-content {
            margin-right: 340px;
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



<div class="container mt-4 main-content">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="align-items-start">
        @yield('advertising_left')
    </div>

    @yield('content')
    @yield('advertising_right')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
