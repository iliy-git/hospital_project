@extends('layouts.app')


@section('title', 'Главная')


@section('advertising_left')
    <style>
        .advertising-container {
            position: fixed;
            width: 300px;
            max-height: calc(100vh - 100px);
            top: 60px;
            overflow-y: auto;
        }
        .advertising-container-right {
            right: 10px;
        }
        .advertising-container-left {
            left: 10px;
        }

    </style>
    <div class="advertising-container advertising-container-left">
        <div class="widget card">
            <img src="https://avatars.mds.yandex.net/get-direct/5228219/GjXE1Rq74pmPJTHDK0zS0A/y300" class="card-img-top">
            <div class="card-body">
                <small class="text-muted d-block mb-1">mrqz.me</small>
                <h6 class="card-title">Тест: твоё направление в Алабуге</h6>
                <p class="card-text small">Ищешь точку для роста? Построй карьеру с программой «100 лидеров»</p>
                <button class="btn btn-primary btn-sm w-100">Подробнее</button>
            </div>
        </div>
        <div class="widget card mt-4">
            <img src="https://avatars.mds.yandex.net/get-direct/5228219/GjXE1Rq74pmPJTHDK0zS0A/y300" class="card-img-top">
            <div class="card-body">
                <small class="text-muted d-block mb-1">mrqz.me</small>
                <h6 class="card-title">Тест: твоё направление в Алабуге</h6>
                <p class="card-text small">Ищешь точку для роста? Построй карьеру с программой «100 лидеров»</p>
                <button class="btn btn-primary btn-sm w-100">Подробнее</button>
            </div>
        </div>
    </div>
@endsection

@section('advertising_right')
    <style>
        .advertising-container {
            position: fixed;
            width: 300px;
            max-height: calc(100vh - 100px);
            top: 60px;
            overflow-y: auto;
        }
        .advertising-container-right {
            right: 10px;
        }
        .advertising-container-left {
            left: 10px;
        }

    </style>
    <div class="advertising-container advertising-container-right">
        <div class="widget card">
            <img src="https://avatars.mds.yandex.net/get-direct/5228219/GjXE1Rq74pmPJTHDK0zS0A/y300" class="card-img-top">
            <div class="card-body">
                <small class="text-muted d-block mb-1">mrqz.me</small>
                <h6 class="card-title">Тест: твоё направление в Алабуге</h6>
                <p class="card-text small">Ищешь точку для роста? Построй карьеру с программой «100 лидеров»</p>
                <button class="btn btn-primary btn-sm w-100">Подробнее</button>
            </div>
        </div>
        <div class="widget card mt-4">
            <img src="https://avatars.mds.yandex.net/get-direct/5228219/GjXE1Rq74pmPJTHDK0zS0A/y300" class="card-img-top">
            <div class="card-body">
                <small class="text-muted d-block mb-1">mrqz.me</small>
                <h6 class="card-title">Тест: твоё направление в Алабуге</h6>
                <p class="card-text small">Ищешь точку для роста? Построй карьеру с программой «100 лидеров»</p>
                <button class="btn btn-primary btn-sm w-100">Подробнее</button>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <style>
        .container-reclam {
            margin-left: 135px;
        }
    </style>
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <div class="py-5">
                <h1 class="display-4 mb-4">Добро пожаловать в нашу больницу</h1>
                <p class="lead mb-5">Мы заботимся о вашем здоровье. Запишитесь на прием к лучшим специалистам.</p>

                @auth
                    @if(Auth::user()->role === 'user')
                        <a href="{{ route('appointment.create') }}" class="btn btn-primary btn-lg">
                            📅 Записаться к врачу
                        </a>
                        <a href="{{ route('records.my') }}" class="btn btn-outline-primary btn-lg px-4">
                            📋 Мои записи
                        </a>
                    @else
                        <a href="{{ route('posts.index') }}" class="btn btn-primary btn-lg">
                            ⚙️ Панель администратора
                        </a>
                    @endif
                @else
                    <div class="d-sm-flex justify-content-sm-center">
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg me-3 col-md-3 p-3">Регистрация</a>
                        <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg col-md-3 p-3">Войти</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
    <div class="container-reclam">
        <div class="d-flex justify-items-center">
            <div class="widget card col-md-2 me-4">
                <img src="https://avatars.mds.yandex.net/get-direct/5228219/GjXE1Rq74pmPJTHDK0zS0A/y300" class="card-img-top">
                <div class="card-body">
                    <small class="text-muted d-block mb-1">mrqz.me</small>
                    <h6 class="card-title">Тест: твоё направление в Алабуге</h6>
                    <p class="card-text small">Ищешь точку для роста? Построй карьеру с программой «100 лидеров»</p>
                    <button class="btn btn-primary btn-sm w-100">Подробнее</button>
                </div>
            </div>
            <div class="widget card col-md-2 me-4">
                <img src="https://avatars.mds.yandex.net/get-direct/5228219/GjXE1Rq74pmPJTHDK0zS0A/y300" class="card-img-top">
                <div class="card-body">
                    <small class="text-muted d-block mb-1">mrqz.me</small>
                    <h6 class="card-title">Тест: твоё направление в Алабуге</h6>
                    <p class="card-text small">Ищешь точку для роста? Построй карьеру с программой «100 лидеров»</p>
                    <button class="btn btn-primary btn-sm w-100">Подробнее</button>
                </div>
            </div>
            <div class="widget card col-md-2 me-4">
                <img src="https://avatars.mds.yandex.net/get-direct/5228219/GjXE1Rq74pmPJTHDK0zS0A/y300" class="card-img-top">
                <div class="card-body">
                    <small class="text-muted d-block mb-1">mrqz.me</small>
                    <h6 class="card-title">Тест: твоё направление в Алабуге</h6>
                    <p class="card-text small">Ищешь точку для роста? Построй карьеру с программой «100 лидеров»</p>
                    <button class="btn btn-primary btn-sm w-100">Подробнее</button>
                </div>
            </div>
            <div class="widget card col-md-2 me-4">
                <img src="https://avatars.mds.yandex.net/get-direct/5228219/GjXE1Rq74pmPJTHDK0zS0A/y300" class="card-img-top">
                <div class="card-body">
                    <small class="text-muted d-block mb-1">mrqz.me</small>
                    <h6 class="card-title">Тест: твоё направление в Алабуге</h6>
                    <p class="card-text small">Ищешь точку для роста? Построй карьеру с программой «100 лидеров»</p>
                    <button class="btn btn-primary btn-sm w-100">Подробнее</button>
                </div>
            </div>
            <div class="widget card col-md-2">
                <img src="https://avatars.mds.yandex.net/get-direct/5228219/GjXE1Rq74pmPJTHDK0zS0A/y300" class="card-img-top">
                <div class="card-body">
                    <small class="text-muted d-block mb-1">mrqz.me</small>
                    <h6 class="card-title">Тест: твоё направление в Алабуге</h6>
                    <p class="card-text small">Ищешь точку для роста? Построй карьеру с программой «100 лидеров»</p>
                    <button class="btn btn-primary btn-sm w-100">Подробнее</button>
                </div>
            </div>
        </div>
    </div>
@endsection
