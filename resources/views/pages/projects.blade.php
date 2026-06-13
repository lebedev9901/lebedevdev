@extends('layouts.app')

@section('title', 'Проекты')

@section('content')

<section class="section projects-page">

    <p class="subtitle">
        Проекты
    </p>

    <h1 class="main__title">
        Реализованные проекты
    </h1>

    <p class="main__description">
        Подборка веб-приложений, корпоративных систем,
        интернет-магазинов и интеграций.
    </p>

    <div class="projects-page__grid">

        @forelse($projects as $project)

            <article class="projects-preview__item">

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

                        <h2 class="projects-preview__title">
                            {{ $project->title }}
                        </h2>

                        <p class="projects-preview__descr">
                            {{ $project->short_description }}
                        </p>
                        @if(!empty($project->technologies))

                            <div class="projects-preview__technologies">

                                @foreach($project->technologies as $technology)

                                    <span class="projects-preview__technology">
                                        {{ $technology }}
                                    </span>

                                @endforeach

                            </div>

                        @endif

                        <span class="projects-preview__link">
                            Подробнее →
                        </span>

                    </div>

                </a>

            </article>

        @empty

            <p class="project__empty">
                Проекты пока не добавлены.
            </p>

        @endforelse

    </div>

</section>

@endsection