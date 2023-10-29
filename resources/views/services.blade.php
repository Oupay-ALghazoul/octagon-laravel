@php
    $locale = Session::get('locale') ?? 'en';
    $services = \App\Models\V2Service::withTranslation(['ar', 'ru'])->get();
    app()->setLocale($locale);
@endphp

@extends('app')
@section('content')
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-dark">{{ __('Services') }}</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="#">{{ __('Services') }}</a></li>
                        <li class="active">{{ __('Pages') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <div class="container">
        <div class="text-center px-5 pb-5">
            <img class="img-fluid px-0 px-md-5" src="{{ Voyager::image(setting('site.services_image')) }}" alt="Octagonservices">
    </div>

    <div class="container pb-1">

        <div class="row pt-4">
            <div class="col">
                <div class="overflow-hidden mb-3">
                    <h2 class="font-weight-bold text-8 mb-0 appear-animation" data-appear-animation="maskUp">
                        {{ __('OCTAGON: THE WHOLE WORLD IS YOUR PARTNER') }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10">
                <div class="overflow-hidden">
                    <p class="lead mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">
                        {{ __('A SINGLE POINT OF CONTACT FOR ALL YOUR NEEDS') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-2 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="500">
                {{-- <a href="#" class="btn btn-modern btn-dark mt-1">Get a Quote!</a> --}}
            </div>
        </div>

        <div class="row">
            <div class="col py-3">
                <hr class="solid mt-5 mb-2">
            </div>
        </div>

        <div class="row">
            <div class="featured-boxes featured-boxes-style-2">
                <div class="row justify-content-center">

                    @foreach ($services as $service)
                        
                    <div class="col-md-6 col-lg-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="700">
                        <div class="featured-box featured-box-effect-4">
                            <div class="box-content">
                                <div  class="py-3 px-5">
                                    <img class="img-fluid p-1" src="{{ Voyager::image($service->logo) }}" alt="{{ $service->translate($locale, 'en')->title }}">
                                </div>
                                <h4 class="font-weight-bold px-3 py-2"> {{ $service->translate($locale, 'en')->title }} </h4>
                                <p class="px-3 text-left">{!! $service->translate($locale, 'en')->description !!}</p>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>
        
    </div>
    
    </div>

@endsection
