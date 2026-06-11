@extends('layouts.app')

@section('title', 'Добавить проект')

@section('content')

<section class="admin-project-form">
    <h1 class="admin-project-form__title">Добавить проект</h1>

    <form action="{{ route('admin.projects.store') }}" method="POST" class="admin-project-form__form"  enctype="multipart/form-data">
        @csrf

        <div class="admin-project-form__field">
            <label class="admin-project-form__label">Название</label>
            <input type="text" name="title" class="admin-project-form__input" required>
        </div>

        <div class="admin-project-form__field">
            <label class="admin-project-form__label">Подзаголовок</label>
            <input type="text" name="subtitle" class="admin-project-form__input">
        </div>

        <div class="admin-project-form__field">
            <label class="admin-project-form__label">Краткое описание</label>
            <textarea name="short_description" class="admin-project-form__textarea"></textarea>
        </div>

        <div class="admin-project-form__field">
            <label class="admin-project-form__label">Полное описание</label>
            <textarea name="description" class="admin-project-form__textarea"></textarea>
        </div>

        <div class="admin-project-form__field">
            <label class="admin-project-form__label">Изображение проекта</label>

            <div class="admin-project-form__preview">
                <img
                    src=""
                    alt=""
                    class="admin-project-form__preview-img"
                    id="projectImagePreview"
                >
                <span class="admin-project-form__preview-empty">
                    Превью изображения
                </span>
            </div>

            <input
                type="file"
                name="image"
                class="admin-project-form__input"
                accept="image/*"
                onchange="previewProjectImage(this)"
            >
        </div>

        <div class="admin-project-form__field">
            <label class="admin-project-form__label">Фотографии проекта</label>

            <input
                type="file"
                name="images[]"
                class="admin-project-form__input"
                accept="image/*"
                multiple
            >
        </div>

        <div class="admin-project-form__field">
            <label class="admin-project-form__label">Документы проекта</label>

            <input
                type="file"
                name="documents[]"
                class="admin-project-form__input"
                accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx"
                multiple
            >
        </div>

        <div class="admin-project-form__field">
            <label class="admin-project-form__label">Ссылка на проект</label>
            <input type="text" name="link" class="admin-project-form__input" placeholder="https://site.ru">
        </div>

        <div class="admin-project-form__field">
            <label class="admin-project-form__label">Статус</label>
            <select name="status" class="admin-project-form__input">
                <option value="completed">Завершён</option>
                <option value="in_progress">В разработке</option>
                <option value="in_work">В постоянной работе</option>
                <option value="support">На поддержке</option>
            </select>
        </div>

        <div class="admin-project-form__field">
            <label class="admin-project-form__label">Технологии</label>
            <textarea name="technologies" class="admin-project-form__textarea" placeholder="Каждая технология с новой строки"></textarea>
        </div>

        <div class="admin-project-form__field">
            <label class="admin-project-form__label">Сортировка</label>
            <input type="number" name="sort_order" class="admin-project-form__input" value="0">
        </div>

        <button type="submit" class="admin-project-form__button">
            Сохранить
        </button>
    </form>
</section>

@endsection