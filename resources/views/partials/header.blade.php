
<header class="header flex">
    <img src="{{asset('assets/image/lebedevdev_logo.png')}}" alt="" class="header__logo">
    <button class="burger" id="burger">
        <span></span>
        <span></span>
        <span></span>
    </button>
    <nav class="header__nav flex" id="nav">
        <a href="/">Главная</a>
        <a href="{{route('about')}}">Обо мне</a>
        <a href="{{route('services')}}">Услуги</a>
        <a href="{{route('projects')}}">Проекты</a>
        <a href="{{route('cooperation')}}">Сотрудничество</a>
        <a href="https://www.rustore.ru/catalog/app/ru.lebedevdev.mobile">Мобильное приложение</a>
    </nav>
</header>
