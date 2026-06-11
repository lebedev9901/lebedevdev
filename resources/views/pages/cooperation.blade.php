@extends('layouts.app')

@section('title', 'Сотрудничество')

@section('content')

<section class="cooperation">

    <div class="cooperation__hero">
        <span class="cooperation__label">Начать проект</span>

        <h1 class="cooperation__title">
            Сотрудничество
        </h1>

        <p class="cooperation__text">
            Заполните короткий бриф на разработку сайта. Это поможет понять задачу,
            цели проекта, примерный объём работ и предложить подходящее решение.
        </p>
    </div>

    <div class="cooperation__content">

        <div class="cooperation__info">
            <h2 class="cooperation__heading">Как проходит работа</h2>

            <div class="cooperation__steps">
                <div class="cooperation__step">
                    <span class="cooperation__step-number">01</span>
                    <p class="cooperation__step-text">Вы заполняете заявку</p>
                </div>

                <div class="cooperation__step">
                    <span class="cooperation__step-number">02</span>
                    <p class="cooperation__step-text">Я изучаю задачу и уточняю детали</p>
                </div>

                <div class="cooperation__step">
                    <span class="cooperation__step-number">03</span>
                    <p class="cooperation__step-text">Обсуждаем сроки, стоимость и этапы</p>
                </div>

                <div class="cooperation__step">
                    <span class="cooperation__step-number">04</span>
                    <p class="cooperation__step-text">Запускаем разработку</p>
                </div>
            </div>
        </div>

        <form action="{{route('cooperation.store')}}" method="POST" class="cooperation__form" id="brief" enctype="multipart/form-data">
            @csrf
            @if(session('success'))
                <div class="cooperation__success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="cooperation__form-head">
                <h2 class="cooperation__form-title">Бриф на разработку сайта</h2>
                <p class="cooperation__form-subtitle">
                    Заполните основные данные — я свяжусь с вами для обсуждения проекта.
                </p>
            </div>

            <div class="cooperation__grid">
                <div class="cooperation__field">
                    <label class="cooperation__field-label">Ваше имя</label>
                    <input type="text" name="name" class="cooperation__input" placeholder="Алексей">
                </div>

                <div class="cooperation__field">
                    <label class="cooperation__field-label">Телефон, Email, Месседжеры, Социальные сети</label>
                    <input type="text" name="contact" class="cooperation__input" placeholder="@username, +7... , vk.com/iduserid">
                </div>
            </div>

            <div class="cooperation__field">
                <label class="cooperation__field-label">Какой сайт нужен?</label>
                <select name="site_type" class="cooperation__input">
                    <option value="">Выберите вариант</option>
                    <option value="Лендинг">Лендинг</option>
                    <option value="Сайт-визитка">Сайт-визитка</option>
                    <option value="Корпоративный">Корпоративный сайт</option>
                    <option value="Интернет-магазин">Интернет-магазин</option>
                    <option value="Веб-сервис">Веб-сервис</option>
                    <option value="Другое">Другое</option>
                </select>
            </div>

            <div class="cooperation__field">
                <label class="cooperation__field-label">Есть ли дизайн?</label>

                <div class="cooperation__options">
                    <label class="cooperation__option">
                        <input type="radio" name="design" value="Да">
                        <span>Да</span>
                    </label>

                    <label class="cooperation__option">
                        <input type="radio" name="design" value="Нет">
                        <span>Нет</span>
                    </label>

                    <label class="cooperation__option">
                        <input type="radio" name="design" value="В разработке">
                        <span>В разработке</span>
                    </label>
                </div>
            </div>

            <div class="cooperation__field">
                <label class="cooperation__field-label">Что нужно в проекте?</label>

                <div class="cooperation__checkboxes">
                    <label class="cooperation__checkbox">
                        <input type="checkbox" name="features[]" value="Админ-панель">
                        <span>Админ-панель</span>
                    </label>

                    <label class="cooperation__checkbox">
                        <input type="checkbox" name="features[]" value="Уведомления в месседжерах или соц сетях">
                        <span>Уведомления в месседжерах или соц сетях</span>
                    </label>

                    <label class="cooperation__checkbox">
                        <input type="checkbox" name="features[]" value="Онлайн-оплатаt">
                        <span>Онлайн-оплата</span>
                    </label>

                    <label class="cooperation__checkbox">
                        <input type="checkbox" name="features[]" value="Каталог товаров">
                        <span>Каталог товаров</span>
                    </label>

                    <label class="cooperation__checkbox">
                        <input type="checkbox" name="features[]" value="Личный кабинет">
                        <span>Личный кабинет</span>
                    </label>

                    <label class="cooperation__checkbox">
                        <input type="checkbox" name="features[]" value="API">
                        <span>API</span>
                    </label>

                    <label class="cooperation__checkbox">
                        <input type="checkbox" name="features[]" value="Мобильное приложение">
                        <span>Мобильное приложение</span>
                    </label>
                </div>
            </div>

            <div class="cooperation__field">
                <label class="cooperation__field-label">Опишите задачу</label>
                <textarea name="description" class="cooperation__textarea" placeholder="Расскажите, что нужно разработать, какие есть идеи, примеры или пожелания"></textarea>
            </div>

            <div class="cooperation__grid">
                <div class="cooperation__field">
                    <label class="cooperation__field-label">Бюджет</label>
                    <select name="budget" class="cooperation__input">
                        <option value="">Выберите бюджет</option>
                        <option value="До 50 000 ₽">До 50 000 ₽</option>
                        <option value="50 000 – 100 000 ₽">50 000 – 100 000 ₽</option>
                        <option value="100 000 – 200 000 ₽">100 000 – 200 000 ₽</option>
                        <option value="От 200 000 ₽">От 200 000 ₽</option>
                    </select>
                </div>

                <div class="cooperation__field">
                    <label class="cooperation__field-label">Сроки</label>
                    <select name="deadline" class="cooperation__input">
                        <option value="">Выберите сроки</option>
                        <option value="Срочно">Срочно</option>
                        <option value="В течение месяца">В течение месяца</option>
                        <option value="Сроки гибкие">Сроки гибкие</option>
                    </select>
                </div>
            </div>

            <div class="cooperation__field">
                <label class="cooperation__field-label">Есть ли примеры сайтов?</label>
                <input type="text" name="examples" class="cooperation__input" placeholder="Ссылки на сайты, которые нравятся">
            </div>
            <div class="cooperation__field">
                <label for="tz_file">Техническое задание (если есть)</label>
                <input 
                    type="file" 
                    name="tz_file" 
                    id="tz_file"
                    accept=".pdf,.doc,.docx,.txt,.zip,.rar"
                >
            </div>

            <button type="submit" class="cooperation__button">
                Отправить бриф
            </button>
        </form>
    </div>
        <div class="cooperation__faq">
            <h2 class="cooperation__faq-title">Частые вопросы</h2>

            <div class="cooperation__faq-list">
                <div class="cooperation__faq-item">
                    <h3 class="cooperation__faq-question">Сколько стоит разработка сайта?</h3>
                    <p class="cooperation__faq-answer">
                        Стоимость зависит от типа сайта, количества страниц, функционала,
                        интеграций и наличия готового дизайна.
                    </p>
                </div>

                <div class="cooperation__faq-item">
                    <h3 class="cooperation__faq-question">Какие сроки разработки?</h3>
                    <p class="cooperation__faq-answer">
                        Небольшой сайт можно сделать от 2 недель. Более сложные проекты
                        рассчитываются индивидуально.
                    </p>
                </div>

                <div class="cooperation__faq-item">
                    <h3 class="cooperation__faq-question">Можно ли доработать существующий сайт?</h3>
                    <p class="cooperation__faq-answer">
                        Да, можно доработать текущий проект, исправить ошибки,
                        улучшить интерфейс или добавить новый функционал.
                    </p>
                </div>
            </div>
        </div>

        <div class="cooperation__cta">
            <h2 class="cooperation__cta-title">Есть идея проекта?</h2>

            <p class="cooperation__cta-text">
                Опишите задачу в брифе, и я предложу понятный план разработки.
            </p>

            <a href="#brief" class="cooperation__cta-button">
                Заполнить бриф
            </a>
        </div>

    

</section>

@endsection