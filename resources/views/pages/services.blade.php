@extends('layouts.app')

@section('title', 'Услуги')

@section('content')

<section class="services__page">

    <div class="page__hero">
        <span class="page__label">Что я делаю</span>
        <h1>Услуги</h1>
        <p>
            Разрабатываю современные сайты, веб-сервисы и интерфейсы под задачи бизнеса:
            от лендингов до интернет-магазинов и внутренних систем.
        </p>
    </div>

    <div class="services__grid">
        @forelse($services as $service)
            <a href="{{ route('services.show', $service) }}" class="services__card">
                <div class="services__icon">
                    {{ config('services-icons')[$service->icon] ?? '💻' }}
                </div>

                <h3 class="services__card-title">
                    {{ $service->title }}
                </h3>

                <p class="services__card-text">
                    {{ $service->short_description }}
                </p>

                <span class="services__card-link">
                    Подробнее →
                </span>
            </a>
        @empty
            <p class="services__empty">
                Услуги пока не добавлены.
            </p>
        @endforelse
    </div>
</section>

@endsection