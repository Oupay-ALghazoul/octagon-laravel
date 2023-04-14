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
                    <h1 class="font-weight-bold text-dark">{{ __('Our Value Proposition') }}</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="#">{{ __('Value Proposition') }}</a></li>
                        <li class="active">{{ __('About us') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    
    <div class="container py-4">

        @foreach ($values as $val)
            <div class="row {{ $loop->index % 2 != 0 ? 'd-none' : ' ' }}">
                <div class="col-md-7 order-2">
                    <div class="overflow-hidden">
                        <h2 class="text-color-dark font-weight-bold text-8 mb-0 pt-0 mt-0 appear-animation"
                            data-appear-animation="maskUp" data-appear-animation-delay="300">{{ $val->title }}</h2>
                    </div>
                    <div class="overflow-hidden mb-3">
                        <p class="font-weight-bold text-primary text-uppercase mb-0 appear-animation"
                            data-appear-animation="maskUp" data-appear-animation-delay="500">
                            {{-- {{ $founder->job_title }} --}}
                        </p>
                    </div>
                    <p class="lead appear-animation" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="700">{!! $val->description !!}</p>
                    <hr class="solid my-4 appear-animation" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="900">
                    <div class="row align-items-center appear-animation" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="1000">
                    </div>
                </div>
                <div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation"
                    data-appear-animation="fadeInRightShorter">
                    <img src="{{ Voyager::image($val->image) }}" class="img-fluid" alt="">
                </div>
            </div>

            {{--  --}}

            <div class="row {{ $loop->index % 2 == 0 ? 'd-none' : ' ' }}">
                <div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation"
                    data-appear-animation="fadeInLeftShorter">
                    <img src="{{ Voyager::image($val->image) }}" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 order-2">
                    <div class="overflow-hidden">
                        <h2 class="text-color-dark font-weight-bold text-8 mb-0 pt-0 mt-0 appear-animation"
                            data-appear-animation="maskUp" data-appear-animation-delay="300">{{ $val->title }}</h2>
                    </div>
                    <div class="overflow-hidden mb-3">
                        <p class="font-weight-bold text-primary text-uppercase mb-0 appear-animation"
                            data-appear-animation="maskUp" data-appear-animation-delay="500">
                        </p>
                    </div>
                    <p class="lead appear-animation" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="700">{!! $val->description !!}</p>
                    <hr class="solid my-4 appear-animation" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="900">
                    <div class="row align-items-center appear-animation" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="1000">
                    </div>
                </div>
            </div>


            <div class="row {{ $loop->last ? 'd-none' : '' }}">
                <div class="col">
                    <hr class="solid my-5">
                </div>
            </div>
        @endforeach

    </div>


    {{-- <section class="section section-default bg-color-light-scale-1 border-0 mb-5">
        <div class="container py-4">
            <h2 class="text-color-dark font-weight-bold text-center mb-0 pt-2">{{ __('Our Value Proposition') }}</strong>
            </h2>
            <p class="text-center text-5 mt-3 mb-5">We believe that effective and successful client wealth management begins long
                before investment</p>
            @foreach ($values as $val)
                <article class="post post-large">
                    <div class="post-content">
                        <h2 class="font-weight-semibold text-6 line-height-3 mb-3">{{ $val->title }}</h2>
                        <p>{!! $val->description !!}</p>
                    </div>
                </article>
            @endforeach

        </div>
    </section> --}}

    <div class="container py-5 my-4">
        <div class="row text-center py-3">
            <div class="col-md-10 mx-md-auto">
                <h1 class="word-rotator slide font-weight-bold text-8 mb-3 appear-animation"
                    data-appear-animation="fadeInUpShorter">
                    <span> Octagon is </span>
                    <span class="word-rotator-words bg-primary">
                        <b class="is-visible">incredibly</b>
                        <b>especially</b>
                        <b>extremely</b>
                    </span>
                    <span> Consulting.</span>
                </h1>
            </div>
        </div>
    </div>

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
