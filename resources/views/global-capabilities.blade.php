@php
    $locale = Session::get('locale') ?? 'en';
    $capabilities = \App\Models\GlobalCapability::withTranslation(['ar', 'ru'])->get();
    app()->setLocale($locale);

@endphp

@extends('app')

@section('content')
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-dark">
                        {{ __('Global Capabilities') }}
                    </h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="/">{{ __('Home') }}</a></li>
                        <li class="active"> {{ __('Global Capabilities') }} </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container pb-1">

        <div class="row">
            <div class="featured-boxes featured-boxes-style-2">
                <div class="row">

                    <div class="row align-items-stretch mb-5 pb-3">

                        @foreach ($capabilities as $capability)
                            <div class="col-md-6 col-lg-4 mb-3 appear-animation animated fadeInUpShorter appear-animation-visible"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200"
                                style="animation-delay: 200ms;">
                                <div
                                    class="card h-100 bg-color-light box-shadow-1 box-shadow-1-hover anim-hover-translate-top-10px transition-3ms">
                                    <div class="card-body">
                                        <h3 style="background-color: {{ $capability->title_color }}"
                                            class="card-title mb-1 text-white text-4 font-weight-bold px-2 py-1">
                                            {{ $capability->translate($locale, 'en')->title }} </h3>
                                        <p class="card-text"> {!! $capability->translate($locale, 'en')->description !!} </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid">
        <div class="text-center">
            <img class="w-100 px-5" src="{{ Voyager::image(setting('site.global_capabilities_map')) }}" alt="Octagon Global Capabilities Map">
        </div>
    </div>

@endsection
