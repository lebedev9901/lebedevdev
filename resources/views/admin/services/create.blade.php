@extends('layouts.app')

@section('title', 'Добавить услугу')

@section('content')

<section class="admin-service-form">
    <h1 class="admin-service-form__title">Добавить услугу</h1>

    <form action="{{ route('admin.services.store') }}" method="POST" class="admin-service-form__form">
        @csrf

        <div class="admin-service-form__field">
            <label class="admin-service-form__label" >Название</label>
            <input type="text" name="title" id="title_service" class="admin-service-form__input" required>
        </div>

        <div class="admin-service-form__field">
            <label class="admin-service-form__label">Подзаголовок</label>
            <input type="text" name="subtitle" class="admin-service-form__input">
        </div>

        <div class="admin-service-form__field">
            <label class="admin-service-form__label" >Краткое описание</label>
            <textarea name="short_description" id="descr_service" class="admin-service-form__textarea"></textarea>
        </div>

        <div class="admin-service-form__field">
            <label class="admin-service-form__label">Полное описание</label>
            <textarea name="description" class="admin-service-form__textarea"></textarea>
        </div>
        <div class="admin-service-form__field">
            <label class="admin-service-form__label">Преимущества</label>
            <textarea name="advantages" class="admin-service-form__textarea" placeholder="Каждое преимущество с новой строки"></textarea>
        </div>

        <div class="admin-service-form__field">
            <label class="admin-service-form__label">Этапы работы</label>
            <textarea name="stages" class="admin-service-form__textarea" placeholder="Каждый этап с новой строки"></textarea>
        </div>
        <div class="admin-service-form__field">
            <label class="admin-service-form__label">Иконка</label>
            <select name="icon" class="admin-service-form__input">

                @foreach(config('services-icons') as $key => $icon)
                    <option value="{{ $key }}">
                        {{ $icon }} {{ ucfirst($key) }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="admin-service-form__field">
            <label class="admin-service-form__label">Статус</label>
            <select name="status" class="admin-service-form__input">
                <option value="active">Активна</option>
                <option value="hidden">Скрыта</option>
            </select>
        </div>

        <div class="admin-service-form__field">
            <label class="admin-service-form__label">Сортировка</label>
            <input type="number" name="sort_order" class="admin-service-form__input" value="0">
        </div>
        <div class="admin-service-form__field">
            <label class="admin-service-form__label">SEO title</label>
            <input type="text" name="meta_title" id="seo_title" class="admin-service-form__input">
        </div>

        <div class="admin-service-form__field">
            <label class="admin-service-form__label">SEO description</label>
            <textarea name="meta_description" id="seo_descr" class="admin-service-form__textarea"></textarea>
        </div>
        <button type="submit" class="admin-service-form__button">
            Сохранить
        </button>
    </form>
</section>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const titleService = document.getElementById('title_service');
    const descrService = document.getElementById('descr_service');

    const seoTitle = document.getElementById('seo_title');
    const seoDescr = document.getElementById('seo_descr');

    titleService.addEventListener('input', function () {

        
            seoTitle.value = titleService.value;
        

    });

    descrService.addEventListener('input', function () {

        
            seoDescr.value = descrService.value.substring(0, 160);
        

    });

});
</script>
@endsection