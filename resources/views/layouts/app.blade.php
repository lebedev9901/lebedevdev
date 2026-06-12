<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    <meta name="yandex-verification" content="d8361e965331a5e8" />
    <title>@yield('title', 'Разработка сайтов под ключ | LebedevDev')</title>

    <meta name="description" content="@yield('description', 'Разработка сайтов, мобильных приложений, CRM-систем и веб-сервисов.')">
    <meta name="keywords" content="@yield('keywords', 'разработка сайтов, laravel, flutter, crm, мобильные приложения')">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="LebedevDev">
    <meta property="og:title" content="@yield('og_title', View::yieldContent('title', 'LebedevDev'))">
    <meta property="og:description" content="@yield('og_description', View::yieldContent('description'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('og-image.jpg') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', View::yieldContent('title'))">
    <meta name="twitter:description" content="@yield('og_description', View::yieldContent('description'))">
    <meta name="twitter:image" content="{{ asset('og-image.jpg') }}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{asset('assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/header.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/hero.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/about.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slug.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/project.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/step.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/contact.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/services.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/cooperations.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">

    <script src="{{asset('assets/js/index.js')}}"></script>
    <!-- Yandex.Metrika counter -->
        <script type="text/javascript">
            (function(m,e,t,r,i,k,a){
                m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
                m[i].l=1*new Date();
                for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
                k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)
            })(window, document,'script','https://mc.yandex.ru/metrika/tag.js?id=109800089', 'ym');

            ym(109800089, 'init', {ssr:true, webvisor:true, clickmap:true, ecommerce:"dataLayer", referrer: document.referrer, url: location.href, accurateTrackBounce:true, trackLinks:true});
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/109800089" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
</head>
<body>
    @include('partials.header')
    <main class="main">
        @yield('content')
    </main>
    @include('partials.footer')
    <script>
    function previewProjectImage(input) {
        const file = input.files[0];
        const preview = document.getElementById('projectImagePreview');
        const empty = document.querySelector('.admin-project-form__preview-empty');

        if (!file || !preview) {
            return;
        }

        const reader = new FileReader();

        reader.onload = function (event) {
            preview.src = event.target.result;
            preview.classList.add('is-visible');

            if (empty) {
                empty.classList.add('is-hidden');
            }
        };

        reader.readAsDataURL(file);
    }
</script>
</body>
</html>