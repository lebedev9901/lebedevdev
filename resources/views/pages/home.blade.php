@extends('layouts.app')

@section('content')

<div class="hero ">
    <div class="hero__contain flex">
        <p class="subtitle">Привет! Я LebedevDev</p>
        <h1 class="hero__title">Разработка web-приложений</h1>
        <h2 class="hero__subtitle">и web-сайтов</h2>
        <p class="hero__description">Создаю современные, быстрые и удобные решения для бизнеса и личных проектов</p>
        <div class="hero__actions flex">
            <a href="{{route('projects')}}" class="btn__primary hero__link">Мои проекты →</a>
            <a href="#contacts" class="btn__ghost hero__link">Связаться со мной</a>
        </div>
    </div>
</div>
<section class="section flex" id="about">
    <p class="subtitle">Обо мне</p>
    <div class=" about__contain flex">
        <div class="about__text flex">
            <h2 class="main__title">Разработчик с опытом и страстью к коду</h2>
            <p class="main__description">Я занимаюсь разработкой web-приложений и сайтов более 3 лет. люблю чистый код, продуманный дизайн и высокую производительность</p>
            <a href="{{route('about')}}" class="btn__primary about__action">Подробнее обо мне</a>    
        </div>
        <div class="about__preview flex">
            <ul class="about__list flex list-reset">
                <li class="about__list-item flex" id="progress"> 
                    <h4 class="about__list-title"> 
                        3+ года опыта
                    </h4>
                    <p class="about__list-descr">
                        комерческой разработки
                    </p>
                </li>
                <li class="about__list-item flex" id="projects"> 
                    <h4 class="about__list-title"> 
                        10+ проектов
                    </h4>
                    <p class="about__list-descr">
                        успешно реализованно
                    </p>
                </li>
                <li class="about__list-item flex" id="stek"> 
                    <h4 class="about__list-title"> 
                        Современный стек
                    </h4>
                    <p class="about__list-descr">
                        Laravel, MySQL, JS, CSS3, HTML5 и др.
                    </p>
                </li>
            </ul>
        </div>
    </div>
</section>
<div class="line"></div>
<section class="section flex services-preview" id="slugs">

    <p class="subtitle">
        Услуги
    </p>

    <h2 class="main__title">
        Что я делаю
    </h2>

    <ul class="services-preview__list list-reset">

        @foreach($services as $service)

            <li class="services-preview__item">

                <a href="{{ route('services.show', $service) }}" class="services-preview__card">

                    <div class="services-preview__icon">
                        {{ config('services-icons')[$service->icon] ?? '💻' }}
                    </div>

                    <div class="services-preview__content">
                        <h4 class="services-preview__title">
                            {{ $service->title }}
                        </h4>

                        <p class="services-preview__descr">
                            {{ $service->short_description }}
                        </p>
                    </div>

                    <span class="services-preview__link">
                        Подробнее →
                    </span>

                </a>

            </li>

        @endforeach

    </ul>

</section>
<section class="section flex projects-preview" id="project">

    <p class="subtitle">
        Мои проекты
    </p>

    <h2 class="main__title">
        Последние проекты
    </h2>

    <ul class="projects-preview__list list-reset">

        @foreach($projects as $project)

            <li class="projects-preview__item">

                <a href="{{ route('projects.show', $project) }}" class="projects-preview__card">

                    <div class="projects-preview__image">
                        @if($project->image)
                            <img
                                src="{{ asset('storage/' . $project->image) }}"
                                alt="{{ $project->title }}"
                            >
                        @else
                            <div class="projects-preview__placeholder">
                                {{ mb_substr($project->title, 0, 1) }}
                            </div>
                        @endif

                        <span class="projects-preview__status projects-preview__status--{{ $project->status }}">
                            {{ $project->status_label }}
                        </span>
                    </div>

                    <div class="projects-preview__body">

                        <h4 class="projects-preview__title">
                            {{ $project->title }}
                        </h4>

                        <p class="projects-preview__descr">
                            {{ $project->short_description }}
                        </p>

                        <span class="projects-preview__link">
                            Подробнее →
                        </span>

                    </div>

                </a>

            </li>

        @endforeach

    </ul>

    <a href="{{ route('projects') }}" class="project__action btn__primary">
        Смотреть все проекты
    </a>

</section>
<section class="section flex" id="step">
    <p class="subtitle">
        Этапы работы
    </p>
    <h2 class="main__title">
        Как я работаю
    </h2>
    <ul class="step__list flex list-reset">
        <li class="step__list-item flex">
            <span class="step__span">01</span>
            <h3 class="step__title">Анализ</h3>
            <p class="step__descr">
                Изучаю задачу и предлагаю решение
            </p>
        </li>
        <li class="step__list-item flex">
            <span class="step__span">02</span>
            <h3 class="step__title">Проектирование</h3>
            <p class="step__descr">
                Создаю структуру, прототип и план разработки
            </p>
        </li>
        <li class="step__list-item flex">
            <span class="step__span">03</span>
            <h3 class="step__title">Разработка</h3>
            <p class="step__descr">
                Пишу чистый код и реализую все этапы
            </p>
        </li>
        <li class="step__list-item flex">
            <span class="step__span">04</span>
            <h3 class="step__title">Тестирование</h3>
            <p class="step__descr">
                Проверяю качество. производительности и безопасность
            </p>
        </li>
        <li class="step__list-item flex">
            <span class="step__span">05</span>
            <h3 class="step__title">Запуск</h3>
            <p class="step__descr">
                Развертываю проект на хостинге и обеспечиваю поддержку
            </p>
        </li>
    </ul>
</section>
<section class="section flex" id="contacts">
    <p class="subtitle">
        Контакты
    </p>
    <div class="contact__contain flex">
        <div class="contact__text flex">
            <h2 class="main__title">
                Свяжитесь со мной
            </h2>
            <p class="main__description">
                Есть проект или идея?
                Давайте обсудим.
            </p>
        </div>
        <div class="contact__action">
            <a href="tel:+79802401700" class="contact__links">Телефон</a>
            <a href="mailto:lebedewdev@gmail.com" class="contact__links">Email</a>
            <a href="https://vk.me/lebedew136" class="contact__links">Вконтакте</a>
        </div>
    </div>
</section>

@endsection