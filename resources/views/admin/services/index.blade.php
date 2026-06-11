@extends('layouts.app')

@section('title', 'Услуги')

@section('content')

<section class="admin-services">
    <div class="admin-services__head">
        <h1 class="admin-services__title">Услуги</h1>

        <a href="{{ route('admin.services.create') }}" class="admin-services__button">
            Добавить услугу
        </a>
    </div>

    @if(session('success'))
        <div class="admin-services__success">
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-services__list">
        @foreach($services as $service)
            <div class="admin-services__item">
                <div>
                    <h3 class="admin-services__item-title">
                        {{ $service->title }}
                    </h3>

                    <p class="admin-services__item-text">
                        {{ $service->short_description }}
                    </p>
                </div>

                <div class="admin-services__right">
                    <span class="admin-services__status">
                        {{ $service->status_label }}
                    </span>

                    <div class="admin-services__actions">
                        <a href="{{ route('admin.services.edit', $service) }}" class="admin-services__edit">
                            Редактировать
                        </a>

                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="admin-services__delete">
                                Удалить
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

@endsection