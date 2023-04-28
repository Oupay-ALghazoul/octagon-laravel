@php
    $locale = Session::get('locale') ?? 'en';
    $services = \App\Models\Service::withTranslation(['ar', 'ru'])->get();
    $founders = \App\Models\Founder::withTranslations(['ar', 'ru'])->get();
    $aboutUs = \App\Models\AboutUs::withTranslations(['ar', 'ru'])->first();
    $clients = \App\Models\Client::withTranslations(['ar', 'ru'])->get();
    $values = \App\Models\PropositionValue::withTranslations(['ar', 'ru'])->get();
    app()->setLocale($locale);
@endphp

@extends('app')
@section('content')
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-dark">{{ __('Global Partners') }}</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="#">{{ __('Global Partners') }}</a></li>
                        <li class="active">{{ __('About us') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-color-grey-scale-1 border-0 py-1">
        <div class="container-fluid">
            <div class="text-center m-2 m-lg-5 p-lg-4">
                <img class="img-fluid img-responsive" src="img/map.png" alt="map">
            </div>
        </div>
    </section>
    
    <section class="section section-primary">
        <div class="container">
            <div class="row counters counters-text-light">
                <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="counter">
                        <strong data-to="{{ setting('site.clients_count') }}" data-append="+">0</strong>
                        <label>{{ __('Clients') }}</label>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="counter">
                        <strong data-to="{{ setting('site.years_of_experience') }}">0</strong>
                        <label>{{ __('Years of Experience') }}</label>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4 mb-sm-0">
                    <div class="counter">
                        <strong data-to="{{ setting('site.projects_count') }}">0</strong>
                        <label>{{ __('Projects') }}</label>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="counter">
                        <strong data-to="{{ setting('site.employees_count') }}">0</strong>
                        <label>{{ __('Employees') }}</label>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row py-5 my-5">
            <div class="col">
                <style>
                    .owl-carousel .owl-stage {
                        display: flex;
                        align-items: center;
                    }
                </style>
                <div class="owl-carousel owl-theme mb-0"
                    data-plugin-options="{'responsive': {'0': {'items': 1}, '476': {'items': 1}, '768': {'items': 5}, '992': {'items': 7}, '1200': {'items': 7}}, 'autoplay': true, 'autoplayTimeout': 3000, 'dots': false}">
                    @foreach ($clients as $client)
                        <div>
                            <img class="img-fluid opacity-2 px-1" src="{{ Voyager::image($client->image) }}"
                                alt="">
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
@endsection
