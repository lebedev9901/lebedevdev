@extends('layouts.app')

@section('title', 'Обо мне')

@section('content')

<section class="section flex about-page">
    <p class="subtitle">Обо мне</p>

    <div class="about-page__hero">
        <div class="about-page__content">
            <h1 class="about-page__title">
                Laravel Developer
            </h1>

            <p class="about-page__lead">
                Разрабатываю веб-приложения, интернет-магазины,
                личные кабинеты и корпоративные системы на Laravel.
            </p>

            <div class="hero__actions">
                <a href="{{ route('cooperation') }}" class="btn__primary">
                    Сотрудничество
                </a>

                <a href="{{ route('projects') }}" class="btn__ghost">
                    Смотреть проекты
                </a>
            </div>
        </div>
    </div>
</section>

<section class="section flex">
    <p class="subtitle">Кто я</p>

    <div class="about-page__grid">
        <div class="about-page__card about-page__card--big">
            <h2>Меня зовут Алексей Лебедев</h2>

            <p>
                Я занимаюсь разработкой веб-проектов на Laravel:
                от небольших сайтов до полноценных бизнес-систем,
                интернет-магазинов и внутренних сервисов.
            </p>

            <p>
                Работаю как с новыми проектами с нуля, так и с развитием
                уже существующих решений: улучшаю структуру, добавляю функции,
                подключаю интеграции и оптимизирую работу сайта.
            </p>
        </div>

        <div class="about-page__card">
            <h2>Основной фокус</h2>

            <p>
                Создание понятных, быстрых и удобных решений,
                которые можно развивать и поддерживать дальше.
            </p>
        </div>
    </div>
</section>

<section class="section flex">
    <p class="subtitle">Стек</p>

    <div class="about-page__tags">
        <span>Laravel</span>
        <span>PHP</span>
        <span>MySQL</span>
        <span>JavaScript</span>
        <span>HTML</span>
        <span>CSS</span>
        <span>REST API</span>
        <span>Git</span>
        <span>Flutter</span>
        <span>Linux</span>
        <span>Nginx</span>
    </div>
</section>

<section class="section flex">
    <p class="subtitle">Чем занимаюсь</p>

    <div class="about-page__grid about-page__grid--four">
        <div class="about-page__card">
            <h2>Сайты</h2>
            <p>Лендинги, корпоративные сайты, каталоги и презентационные страницы.</p>
        </div>

        <div class="about-page__card">
            <h2>Интернет-магазины</h2>
            <p>Каталог, корзина, оформление заказов, личный кабинет и админка.</p>
        </div>

        <div class="about-page__card">
            <h2>Веб-приложения</h2>
            <p>CRM, панели управления, внутренние сервисы и бизнес-системы.</p>
        </div>

        <div class="about-page__card">
            <h2>Интеграции</h2>
            <p>VK, Telegram, API, уведомления, платежные и сторонние сервисы.</p>
        </div>
    </div>
</section>

<section class="section flex">
    <p class="subtitle">Как работаю</p>

    <div class="about-page__steps">
        <div class="about-page__step">
            <span>01</span>
            <h3>Анализ</h3>
            <p>Разбираю задачу, цели проекта и нужный функционал.</p>
        </div>

        <div class="about-page__step">
            <span>02</span>
            <h3>Структура</h3>
            <p>Продумываю страницы, логику, базу данных и сценарии работы.</p>
        </div>

        <div class="about-page__step">
            <span>03</span>
            <h3>Разработка</h3>
            <p>Собираю проект, подключаю функционал и адаптивную верстку.</p>
        </div>

        <div class="about-page__step">
            <span>04</span>
            <h3>Запуск</h3>
            <p>Помогаю развернуть проект, проверить работу и развивать дальше.</p>
        </div>
    </div>
</section>

<section class="section flex">
    <div class="about-page__cta">
        <h2>Есть идея или проект?</h2>

        <p>
            Давайте обсудим задачу и подберём оптимальное решение.
        </p>

        <a href="{{ route('cooperation') }}" class="btn__primary">
            Сотрудничество
        </a>
    </div>
</section>

@endsection