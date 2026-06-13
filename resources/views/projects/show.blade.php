@extends('layouts.app')

@section('title', $project->seo_title ?: $project->title)
@section('description', $project->seo_description ?: $project->short_description)

@section('og_title', $project->title)
@section('og_description', $project->short_description)

@if($project->image)
    @section('og_image', asset('storage/' . $project->image))
@endif
@section('content')

<section class="section project-page__hero">

    <div class="project-page__info">

        <a href="{{ route('projects') }}" class="btn__ghost">
            ← Назад к проектам
        </a>

        <span class="project__status project__status--{{ $project->status }}">
            {{ $project->status_label }}
        </span>

        <p class="subtitle">
            Проект
        </p>

        <h1 class="main__title">
            {{ $project->title }}
        </h1>

        @if($project->subtitle || $project->short_description)
            <p class="main__description">
                {{ $project->subtitle ?? $project->short_description }}
            </p>
        @endif

        @if($project->link)
            <a href="{{ $project->link }}" target="_blank" class="btn__ghost">
                Открыть проект
            </a>
        @endif

    </div>

    @if($project->image)
        <div class="project-page__image">
            <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->title }}">
        </div>
    @endif
    

</section>
@if($project->images->isNotEmpty())
        <section class="section flex">
            <h2 class="main__title">Галерея проекта</h2>

            <div class="project-page__gallery">
                @foreach($project->images as $image)
                    <div class="project-page__gallery-item">
                        <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $project->title }}">
                    </div>
                @endforeach
            </div>
        </section>
    @endif
    @if($project->documents->isNotEmpty())
        <section class="section flex">
            <h2 class="main__title">Документы проекта</h2>

            <div class="project-page__documents">
                @foreach($project->documents as $document)
                    <a
                        href="{{ asset('storage/' . $document->path) }}"
                        target="_blank"
                        class="project-page__document"
                    >
                        📄 {{ $document->name }}
                    </a>
                @endforeach
            </div>
        </section>
    @endif

<section class="section">

    <div class="project-page__content">

        @if($project->description)
            <div class="project-page__card">
                <h3>О проекте</h3>
                <p>
                    {!! nl2br(e($project->description)) !!}
                </p>
            </div>
        @endif

        @if(!empty($project->technologies))
            <div class="project-page__card">
                <h3>Технологии</h3>

                <div class="project-page__stack">
                    @foreach($project->technologies as $technology)
                        <span class="project-page__tag">
                            {{ $technology }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endif

    </div>

</section>

@endsection