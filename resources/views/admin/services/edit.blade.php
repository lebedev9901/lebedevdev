@extends('layouts.app')

@section('title', 'Редактировать услугу')

@section('content')

<section class="admin-service-form">
    <h1 class="admin-service-form__title">Редактировать услугу</h1>

    <form action="{{ route('admin.services.update', $service) }}" method="POST" class="admin-service-form__form">
        @csrf
        @method('PUT')

        <div class="admin-service-form__field">
            <label class="admin-service-form__label">Название</label>
            <input type="text" name="title" class="admin-service-form__input" value="{{ old('title', $service->title) }}" required>
        </div>
        <div class="admin-service-form__field">
            <label class="admin-service-form__label">Подзаголовок</label>
            <input type="text" name="subtitle" class="admin-service-form__input" value="{{ old('subtitle', $service->subtitle) }}">
        </div>
        <div class="admin-service-form__field">
            <label class="admin-service-form__label">Краткое описание</label>
            <textarea name="short_description" class="admin-service-form__textarea">{{ old('short_description', $service->short_description) }}</textarea>
        </div>

        <div class="admin-service-form__field">
            <label class="admin-service-form__label">Полное описание</label>
            <textarea name="description" class="admin-service-form__textarea">{{ old('description', $service->description) }}</textarea>
        </div>
        <div class="admin-service-form__field">
            <label class="admin-service-form__label">Преимущества</label>
            <textarea name="advantages" class="admin-service-form__textarea" placeholder="Каждое преимущество с новой строки">{{ old('advantages', implode("\n", $service->advantages ?? [])) }}</textarea>
        </div>

        <div class="admin-service-form__field">
            <label class="admin-service-form__label">Этапы работы</label>
            <textarea name="stages" class="admin-service-form__textarea" placeholder="Каждый этап с новой строки">{{ old('stages', implode("\n", $service->stages ?? [])) }}</textarea>
        </div>
        <div class="admin-service-form__field">
            <label class="admin-service-form__label">Иконка</label>
            <select name="icon" class="admin-service-form__input">

                @foreach(config('services-icons') as $key => $icon)

                    <option
                        value="{{ $key }}"
                        @selected($service->icon === $key)
                    >
                        {{ $icon }} {{ ucfirst($key) }}
                    </option>

                @endforeach

            </select>
        </div>

        <div class="admin-service-form__field">
            <label class="admin-service-form__label">Статус</label>
            <select name="status" class="admin-service-form__input">
                <option value="active" @selected(old('status', $service->status) === 'active')>
                    Активна
                </option>
                <option value="hidden" @selected(old('status', $service->status) === 'hidden')>
                    Скрыта
                </option>
            </select>
        </div>

        <div class="admin-service-form__field">
            <label class="admin-service-form__label">Сортировка</label>
            <input type="number" name="sort_order" class="admin-service-form__input" value="{{ old('sort_order', $service->sort_order) }}">
        </div>
        <div class="admin-service-form__field">
            <label class="admin-service-form__label">SEO title</label>
            <input type="text" name="meta_title" class="admin-service-form__input" value="{{ old('meta_title', $service->meta_title) }}">
        </div>

        <div class="admin-service-form__field">
            <label class="admin-service-form__label">SEO description</label>
            <textarea name="meta_description" class="admin-service-form__textarea">{{ old('meta_description', $service->meta_description) }}</textarea>
        </div>
        <button type="submit" class="admin-service-form__button">
            Сохранить изменения
        </button>
    </form>
</section>

@endsection