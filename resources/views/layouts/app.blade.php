<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LebedevDev</title>
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