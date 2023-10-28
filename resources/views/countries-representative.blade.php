@php
    $locale = Session::get('locale') ?? 'en';
    $representatives = \App\Models\CountriesRepresentative::withTranslation(['ar', 'ru'])->get();
    app()->setLocale($locale);

@endphp

@extends('app')

@section('content')
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-dark">
                        {{ __('Countries Representative') }}
                    </h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="/">{{ __('Home') }}</a></li>
                        <li class="active"> {{ __('Countries Representative') }} </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container pb-1">

        <div class="row">
            <div class="featured-boxes featured-boxes-style-2">

                    <div class="row mb-5 pb-3">

                        @foreach ($representatives as $representative)

                        <div class="col-12 col-lg-6 mt-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                            <div class="card">
                                <div class="row g-0">
                                    <div class="col-lg-auto">
                                        <img src="{{ Voyager::image($representative->image) }}" class="img-fluid rounded-circle pt-3 px-3" alt="...">
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="card-body">
                                            <h3 style="background-color: {{ $representative->title_color }}"
                                                class="card-title mb-1 text-white text-4 font-weight-bold px-2 py-1">
                                                {{ $representative->translate($locale, 'en')->title }} </h3>
                                            <h4 class="card-title mb-1 text-4 font-weight-bold">{{ $representative->translate($locale, 'en')->name }}</h4>
                                            <p class="card-text mb-2"> {!! $representative->translate($locale, 'en')->description !!}  </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection