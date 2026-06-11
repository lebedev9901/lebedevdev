@extends('layouts.app')

@section('title', 'Проекты')

@section('content')

<section class="section flex">

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


    <div class="project__list">

        @forelse($projects as $project)

            <article class="project__list-item flex">

                @if($project->image)
                    <img
                        src="{{ asset('storage/'.$project->image) }}"
                        alt="{{ $project->title }}"
                        class="project__item-img"
                    >
                @endif

                <a
                    href="{{ route('projects.show', $project) }}"
                    
                >
                <h2 class="project__list-title">
                    {{ $project->title }}
                </h2>
</a>

                <p class="project__list-descr">
                    {{ $project->short_description }}
                </p>

                @if(!empty($project->technologies))

                    <div class="project__steks">

                        @foreach($project->technologies as $technology)

                            <span class="project__stek">
                                {{ $technology }}
                            </span>

                        @endforeach

                    </div>

                @endif

                <span class="project__status project__status--{{ $project->status }}">
                    {{ $project->status_label }}
                </span>

                <a
                    href="{{ route('projects.show', $project) }}"
                    class="project__action btn__ghost"
                >
                    Подробнее
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