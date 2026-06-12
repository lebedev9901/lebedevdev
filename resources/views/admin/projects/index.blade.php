@extends('layouts.app')

@section('title', 'Проекты')

@section('content')

<section class="admin-projects">
    <div class="admin-projects__head">
        <h1 class="admin-projects__title">Проекты</h1>

        <a href="{{ route('admin.projects.create') }}" class="admin-projects__button">
            Добавить проект
        </a>
        <a href="{{ route('admin.logout') }}">Выйти</a>
    </div>

    @if(session('success'))
        <div class="admin-projects__success">
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-projects__list">
        @forelse($projects as $project)
            <div class="admin-projects__item">
                <div class="admin-projects__thumb">
                    @if($project->image)
                        <img
                            src="{{ asset('storage/' . $project->image) }}"
                            alt="{{ $project->title }}"
                        >
                    @else
                        <span>Нет фото</span>
                    @endif
                </div>
                <div class="admin-projects__info">
                    <h3 class="admin-projects__item-title">
                        {{ $project->title }}
                    </h3>

                    <p class="admin-projects__item-text">
                        {{ $project->short_description }}
                    </p>
                </div>

                <div class="admin-projects__right">
                    <span class="admin-projects__status admin-projects__status--{{ $project->status }}">
                        {{ $project->status_label }}
                    </span>

                    <div class="admin-projects__actions">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="admin-projects__edit">
                            Редактировать
                        </a>

                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="admin-projects__delete">
                                Удалить
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="admin-projects__empty">
                Проекты пока не добавлены.
            </p>
        @endforelse
    </div>
</section>

@endsection