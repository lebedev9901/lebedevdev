@extends('layouts.app')

@section('title', 'Редактировать проект')

@section('content')

<section class="admin-project-form">
    <h1 class="admin-project-form__title">Редактировать проект</h1>

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" class="admin-project-form__form" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="admin-project-form__field">
            <label class="admin-project-form__label">Название</label>
            <input type="text" name="title" class="admin-project-form__input" value="{{ old('title', $project->title) }}" required>
        </div>

        <div class="admin-project-form__field">
            <label class="admin-project-form__label">Подзаголовок</label>
            <input type="text" name="subtitle" class="admin-project-form__input" value="{{ old('subtitle', $project->subtitle) }}">
        </div>

        <div class="admin-project-form__field">
            <label class="admin-project-form__label">Краткое описание</label>
            <textarea name="short_description" class="admin-project-form__textarea">{{ old('short_description', $project->short_description) }}</textarea>
        </div>

        <div class="admin-project-form__field">
            <label class="admin-project-form__label">Полное описание</label>
            <textarea name="description" class="admin-project-form__textarea">{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="admin-project-form__field">
            <label class="admin-project-form__label">Изображение проекта</label>

            <div class="admin-project-form__preview">
                <img
                    src="{{ $project->image ? asset('storage/' . $project->image) : '' }}"
                    alt="{{ $project->title }}"
                    class="admin-project-form__preview-img {{ $project->image ? 'is-visible' : '' }}"
                    id="projectImagePreview"
                >

                <span class="admin-project-form__preview-empty {{ $project->image ? 'is-hidden' : '' }}">
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
            <input type="text" name="link" class="admin-project-form__input" value="{{ old('link', $project->link) }}">
        </div>

        <div class="admin-project-form__field">
            <label class="admin-project-form__label">Статус</label>
            <select name="status" class="admin-project-form__input">
                <option value="completed" @selected(old('status', $project->status) === 'completed')>
                    Завершён
                </option>
                <option value="in_progress" @selected(old('status', $project->status) === 'in_progress')>
                    В разработке
                </option>
                <option value="in_work" @selected(old('status', $project->status) === 'in_work')>
                    В постоянной работе
                </option>
                <option value="support" @selected(old('status', $project->status) === 'support')>
                    На поддержке
                </option>
            </select>
        </div>

        <div class="admin-project-form__field">
            <label class="admin-project-form__label">Технологии</label>
            <textarea name="technologies" class="admin-project-form__textarea" placeholder="Каждая технология с новой строки">{{ old('technologies', implode("\n", $project->technologies ?? [])) }}</textarea>
        </div>

        <div class="admin-project-form__field">
            <label class="admin-project-form__label">Сортировка</label>
            <input type="number" name="sort_order" class="admin-project-form__input" value="{{ old('sort_order', $project->sort_order) }}">
        </div>

        <button type="submit" class="admin-project-form__button">
            Сохранить изменения
        </button>
    </form>
</section>

@endsection