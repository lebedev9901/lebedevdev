@extends('layouts.app')

@section('title', $service->meta_title ?? $service->title)

@section('content')

<section class="service-show">

    <div class="service-show__hero flex">
        <a href="{{ route('services') }}" class="btn__ghost">
            ← Назад к услугам
        </a>

        <span class="service-show__label">Услуга</span>

        <h1 class="service-show__title">
            {{ $service->title }}
        </h1>

        @if($service->subtitle || $service->short_description)
            <p class="service-show__subtitle">
                {{ $service->subtitle ?? $service->short_description }}
            </p>
        @endif
    </div>

    <div class="service-show__content">

        <div class="service-show__main">

            @if($service->description)
                <div class="service-show__section">
                    <h2 class="service-show__heading">Описание услуги</h2>

                    <div class="service-show__text">
                        {!! nl2br(e($service->description)) !!}
                    </div>
                </div>
            @endif

            @if(!empty($service->advantages))
                <div class="service-show__section">
                    <h2 class="service-show__heading">Что вы получаете</h2>

                    <div class="service-show__list">
                        @foreach($service->advantages as $advantage)
                            <div class="service-show__item">
                                <span class="service-show__item-icon">✓</span>
                                <span class="service-show__item-text">{{ $advantage }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if(!empty($service->stages))
                <div class="service-show__section">
                    <h2 class="service-show__heading">Этапы работы</h2>

                    <div class="service-show__stages">
                        @foreach($service->stages as $stage)
                            <div class="service-show__stage">
                                <span class="service-show__stage-number">
                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </span>

                                <p class="service-show__stage-text">
                                    {{ $stage }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>

        <aside class="service-show__aside">
            <div class="service-show__card">
                <h3 class="service-show__card-title">
                    Нужна такая услуга?
                </h3>

                <p class="service-show__card-text">
                    Заполните бриф, и я предложу подходящее решение под вашу задачу.
                </p>

                <a href="{{ route('cooperation') }}" class="service-show__button">
                    Обсудить проект
                </a>
            </div>
        </aside>

    </div>

</section>

@endsection