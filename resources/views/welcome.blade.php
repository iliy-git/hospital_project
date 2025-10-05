@extends('layouts.app')


@section('title', 'Главная')


@section('advertising_left')
    <style>
        .advertising-container {
            width: 250px;
        }

    </style>
    <div class="advertising-container advertising-container-left">
        <div class="widget card bugs flex-fill" style="min-width: 200px; max-width: 240px;">
            <img src="https://images.tomas.kz/i3/firms/111/5394/5394570/pic_e70343ddcb4097f_1024x3000.webp.jpg" style="height: 250px; object-fit: cover;" class="card-img-top">
            <div class="card-body">
                <small class="text-muted d-block mb-1">https://store.steampowered.com/app/367520/Hollow_Knight/</small>
                <h6 class="card-title">Замучили жуки?</h6>
                <p class="card-text small">После этого средства вы больше не найдете жука в своем коде</p>
                <button class="btn btn-success btn-sm w-100">Что делать?</button>
            </div>
        </div>
        <div class="widget card boks mt-2 flex-fill" style="min-width: 200px; max-width: 240px;">
            <img src="https://kubnews.ru/upload/resize_cache/iblock/7b4/1200_630_2/7b46a0fb79ac342ee7e8bb694e754df6.jpg" style="height: 250px; object-fit: cover;" class="card-img-top">
            <div class="card-body">
                <small class="text-muted d-block mb-1">https://dzen.ru/a/aNP3LFGJH2kLca98/</small>
                <h6 class="card-title">Мой муж долбит меня по 5 часов после этого...</h6>
                <p class="card-text small">Уроки бокса сплотили нашу семью, сплотят и вашу</p>
                <button class="btn btn-primary btn-sm w-100">Записаться</button>
            </div>
        </div>
    </div>
    <div class="widget card samokat mt-2 flex-fill" style="min-width: 200px; max-width: 240px;">
        <img src="https://static.tildacdn.com/tild6165-3733-4334-a534-626533653539/-___.png" style="height: 250px; object-fit: cover;" class="card-img-top">
        <div class="card-body d-flex flex-column">
            <small class="text-muted d-block mb-1">https://samokat-clever.ru/</small>
            <h6 class="card-title">Курьер в самокате - до 300 000₽/мес! 💰</h6>
            <p class="card-text small">Гибкий график, ежедневные выплаты. Начни зарабатывать уже сегодня без опыта работы!</p>
            <button class="btn btn-success btn-sm w-100 mt-auto">Стать курьером</button>
        </div>
    </div>
    <div class="widget card infocigan mt-2 flex-fill" style="min-width: 200px; max-width: 240px;">
        <img src="https://static.tildacdn.com/tild6562-3237-4830-a639-616136666639/ndsds_46606.jpg" style="height: 250px; object-fit: cover;" class="card-img-top">
        <div class="card-body d-flex flex-column">
            <small class="text-muted d-block mb-1">https://minjust.gov.ru/ru/pages/reestr-inostryannykh-agentov/</small>
            <h6 class="card-title">Как не попасть на удочку инфоцыган?</h6>
            <p class="card-text small">Рассказываем об этом и не только на нашем курсе.</p>
            <button class="btn btn-primary btn-sm w-100 mt-auto">Записаться</button>
        </div>
    </div>
    <script>

    </script>
@endsection

@section('advertising_right')
    <style>
        .advertising-container {
            width: 250px;
        }

    </style>
    <div class="advertising-container advertising-container-right">
        <div class="widget card alabuga flex-fill" style="min-width: 200px; max-width: 240px;">
            <img src="https://avatars.mds.yandex.net/get-direct/5228219/GjXE1Rq74pmPJTHDK0zS0A/y300" style="height: 250px; object-fit: cover;" class="card-img-top">
            <div class="card-body">
                <small class="text-muted d-block mb-1">https://polytech.alabuga.ru/</small>
                <h6 class="card-title">Тест: твоё направление в Алабуге</h6>
                <p class="card-text small">Ищешь точку для роста? Построй карьеру с программой «100 лидеров»</p>
                <button class="btn btn-primary btn-sm w-100">Подробнее</button>
            </div>
        </div>
        <div class="widget card driver mt-2 flex-fill" style="min-width: 200px; max-width: 240px;">
            <img src="https://avatars.mds.yandex.net/get-ydo/1649611/2a00000184b9447b999a169a7c37ae1fe525/diploma" style="height: 250px; object-fit: cover;" class="card-img-top">
            <div class="card-body">
                <small class="text-muted d-block mb-1">https://www.nvidia.com/en-eu/geforce/drivers/</small>
                <h6 class="card-title">И это только 5 минут работы</h6>
                <p class="card-text small">Чуркокол генадий поможет вам в саду</p>
                <button class="btn btn-success btn-sm w-100">Узнать больше</button>
            </div>
        </div>
        <div class="widget card library mt-2 flex-fill" style="min-width: 200px; max-width: 240px;">
            <img src="https://ic.pics.livejournal.com/aofedorov/14330567/711612/711612_original.jpg" style="height: 250px; object-fit: cover;" class="card-img-top">
            <div class="card-body">
                <small class="text-muted d-block mb-1">https://www.rsl.ru</small>
                <h6 class="card-title">Работа в лучшей библиотеки Москвы</h6>
                <p class="card-text small">Берем без опыта от вас требуется только умение заклад...</p>
                <button class="btn btn-success btn-sm w-100">Узнать больше</button>
            </div>
        </div>
        <div class="widget card lavka mt-2 flex-fill" style="min-width: 200px; max-width: 240px;">
            <img src="https://static.tildacdn.com/tild3530-3531-4738-a336-373338373531/image_21.png" style="height: 250px; object-fit: cover;" class="card-img-top">
            <div class="card-body d-flex flex-column">
                <small class="text-muted d-block mb-1">https://yandekslavka.ru/</small>
                <h6 class="card-title">Курьер в Яндекс лавку - до 300 000₽/мес! 💰</h6>
                <p class="card-text small">Гибкий график, ежедневные выплаты. Начни зарабатывать уже сегодня без опыта работы!</p>
                <button class="btn btn-info btn-sm w-100 mt-auto">Стать курьером</button>
            </div>
        </div>
    </div>
    <script>
    </script>
@endsection

@section('content')
    <div class="p-4">
        <div class="d-flex flex-wrap justify-content-between">
            <div class="widget card beer-craft ms-2 flex-fill" style="min-width: 200px; max-width: 240px;">
                <img src="https://masterpiecer-images.s3.yandex.net/a212c5c0aeb811eea9c57ab0f2fccf97:upscaled" style="height: 250px; object-fit: cover;" class="card-img-top">
                <div class="card-body d-flex flex-column">
                    <small class="text-muted d-block mb-1">https://craftbeer.bar/</small>
                    <h6 class="card-title">Нашел свой идеальный крафт?</h6>
                    <p class="card-text small flex-grow-1">IPA, стаут или лагер? Пройди тест и узнай, какое пиво создано именно для тебя!</p>
                    <button class="btn btn-warning btn-sm w-100 mt-auto">Подобрать пиво</button>
                </div>
            </div>
            <div class="widget card secret ms-2 flex-fill" style="min-width: 200px; max-width: 240px;">
                <img src="https://yt3.googleusercontent.com/ytc/AOPolaQWTNMyxwdCWFB8-QMav8Qg1y4_XjImt4okP4P5=s900-c-k-c0x00ffffff-no-rj" style="height: 250px; object-fit: cover;" class="card-img-top">
                <div class="card-body d-flex flex-column">
                    <small class="text-muted d-block mb-1">https://health-secrets.ru</small>
                    <h6 class="card-title">96-летний пенсионер открыл секрет долголетия</h6>
                    <p class="card-text small flex-grow-1">Врачи в шоке! После этого вы забудете о болезнях и будете чувствовать себя на 20 лет моложе</p>
                    <button class="btn btn-danger btn-sm w-100 mt-auto">Узнать секрет</button>
                </div>
            </div>
            <div class="widget card money ms-2 flex-fill" style="min-width: 200px; max-width: 240px;">
                <img src="https://cdn.fishki.net/upload/users/2021/11/17/1022788/13a1fb66cf8c8ba7a5c85beae091faa3.jpg" style="height: 250px; object-fit: cover;" class="card-img-top">
                <div class="card-body d-flex flex-column">
                    <small class="text-muted d-block mb-1">https://rich-method.com</small>
                    <h6 class="card-title">Бывший дворник стал миллионером за 3 месяца</h6>
                    <p class="card-text small flex-grow-1">После этого вы начнете зарабатывать во сне. Банки умоляют не раскрывать метод!</p>
                    <button class="btn btn-warning btn-sm w-100 mt-auto">Раскрыть метод</button>
                </div>
            </div>
            <div class="widget card terapiya ms-2 flex-fill" style="min-width: 200px; max-width: 240px;">
                <img src="https://runews24.ru/assets/images/uploads/2025/06/02/runews_img_683da575737fa.jpg" style="height: 250px; object-fit: cover;" class="card-img-top">
                <div class="card-body d-flex flex-column">
                    <small class="text-muted d-block mb-1">https://min-zdrav.ru</small>
                    <h6 class="card-title">НЕ ЛЕЧАТ, А КАЛЕЧАТ!!!!!</h6>
                    <p class="card-text small flex-grow-1">Как медики наживаются на нас. Лучший способ забыть про походы в больницу навсе...</p>
                    <button class="btn btn-primary btn-sm w-100 mt-auto">Стать лекарем</button>
                </div>
            </div>
            <div class="widget card help ms-2 flex-fill" style="min-width: 200px; max-width: 240px;">
                <img src="https://media.istockphoto.com/id/467653270/ru/%D1%84%D0%BE%D1%82%D0%BE/%D1%88%D0%BF%D1%80%D0%B8%D1%86-%D0%B8-%D0%B1%D1%83%D1%82%D1%8B%D0%BB%D0%BA%D0%B0.jpg?s=612x612&w=0&k=20&c=tR10GP6E9Tzw5gxxHIE6D3XDUEwaH6ya4uGDoYwgJ1s=" style="height: 250px; object-fit: cover;" class="card-img-top">
                <div class="card-body d-flex flex-column">
                    <small class="text-muted d-block mb-1">https://help-center.ru</small>
                    <h6 class="card-title">Выход есть! Анонимная помощь зависимым</h6>
                    <p class="card-text small flex-grow-1">Не знаешь, как справиться с зависимостью? Профессиональные психологи готовы помочь 24/7. Все консультации анонимны.</p>
                    <button class="btn btn-secondary btn-sm w-100 mt-auto">Позвонить сейчас</button>
                </div>
            </div>
        </div>
    </div>
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
    <div class="p-4">
        <div class="d-flex flex-wrap justify-content-between">
            <div class="widget card terapiya ms-2 flex-fill" style="min-width: 200px; max-width: 240px;">
                <img src="https://runews24.ru/assets/images/uploads/2025/06/02/runews_img_683da575737fa.jpg" style="height: 250px; object-fit: cover;" class="card-img-top">
                <div class="card-body d-flex flex-column">
                    <small class="text-muted d-block mb-1">https://min-zdrav.ru</small>
                    <h6 class="card-title">НЕ ЛЕЧАТ, А КАЛЕЧАТ!!!!!</h6>
                    <p class="card-text small flex-grow-1">Как медики наживаются на нас. Лучший способ забыть про походы в больницу навсе...</p>
                    <button class="btn btn-primary btn-sm w-100 mt-auto">Стать лекарем</button>
                </div>
            </div>
            <div class="widget card help ms-2 flex-fill" style="min-width: 200px; max-width: 240px;">
                <img src="https://media.istockphoto.com/id/467653270/ru/%D1%84%D0%BE%D1%82%D0%BE/%D1%88%D0%BF%D1%80%D0%B8%D1%86-%D0%B8-%D0%B1%D1%83%D1%82%D1%8B%D0%BB%D0%BA%D0%B0.jpg?s=612x612&w=0&k=20&c=tR10GP6E9Tzw5gxxHIE6D3XDUEwaH6ya4uGDoYwgJ1s=" style="height: 250px; object-fit: cover;" class="card-img-top">
                <div class="card-body d-flex flex-column">
                    <small class="text-muted d-block mb-1">https://help-center.ru</small>
                    <h6 class="card-title">Выход есть! Анонимная помощь зависимым</h6>
                    <p class="card-text small flex-grow-1">Не знаешь, как справиться с зависимостью? Профессиональные психологи готовы помочь 24/7. Все консультации анонимны.</p>
                    <button class="btn btn-secondary btn-sm w-100 mt-auto">Позвонить сейчас</button>
                </div>
            </div>
            <div class="widget card beer-craft ms-2 flex-fill" style="min-width: 200px; max-width: 240px;">
                <img src="https://masterpiecer-images.s3.yandex.net/a212c5c0aeb811eea9c57ab0f2fccf97:upscaled" style="height: 250px; object-fit: cover;" class="card-img-top">
                <div class="card-body d-flex flex-column">
                    <small class="text-muted d-block mb-1">https://craftbeer.bar/</small>
                    <h6 class="card-title">Нашел свой идеальный крафт?</h6>
                    <p class="card-text small flex-grow-1">IPA, стаут или лагер? Пройди тест и узнай, какое пиво создано именно для тебя!</p>
                    <button class="btn btn-warning btn-sm w-100 mt-auto">Подобрать пиво</button>
                </div>
            </div>
            <div class="widget card money ms-2 flex-fill" style="min-width: 200px; max-width: 240px;">
                <img src="https://cdn.fishki.net/upload/users/2021/11/17/1022788/13a1fb66cf8c8ba7a5c85beae091faa3.jpg" style="height: 250px; object-fit: cover;" class="card-img-top">
                <div class="card-body d-flex flex-column">
                    <small class="text-muted d-block mb-1">https://rich-method.com</small>
                    <h6 class="card-title">Бывший дворник стал миллионером за 3 месяца</h6>
                    <p class="card-text small flex-grow-1">После этого вы начнете зарабатывать во сне. Банки умоляют не раскрывать метод!</p>
                    <button class="btn btn-warning btn-sm w-100 mt-auto">Раскрыть метод</button>
                </div>
            </div>
            <div class="widget card secret ms-2 flex-fill" style="min-width: 200px; max-width: 240px;">
                <img src="https://yt3.googleusercontent.com/ytc/AOPolaQWTNMyxwdCWFB8-QMav8Qg1y4_XjImt4okP4P5=s900-c-k-c0x00ffffff-no-rj" style="height: 250px; object-fit: cover;" class="card-img-top">
                <div class="card-body d-flex flex-column">
                    <small class="text-muted d-block mb-1">https://health-secrets.ru</small>
                    <h6 class="card-title">96-летний пенсионер открыл секрет долголетия</h6>
                    <p class="card-text small flex-grow-1">Врачи в шоке! После этого вы забудете о болезнях и будете чувствовать себя на 20 лет моложе</p>
                    <button class="btn btn-danger btn-sm w-100 mt-auto">Узнать секрет</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection
