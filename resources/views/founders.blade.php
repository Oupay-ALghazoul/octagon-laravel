@php
    $locale = Session::get('locale') ?? 'en';
    $services = \App\Models\Service::withTranslation(['ar', 'ru'])->get();
    $founders = \App\Models\Founder::orderByRaw("COALESCE(`order`, 'zz') ASC")->withTranslations(['ar', 'ru'])->get();
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
                    <h1 class="font-weight-bold text-dark">{{ __('Our Team') }}</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="#">{{ __('Our Team') }}</a></li>
                        <li class="active">{{ __('About us') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-default bg-color-light-scale-1 border-0 mb-5">
        <div hidden class="container">
            {{-- <h2 class="text-color-dark font-weight-bold text-center mb-0 pt-2">{{ __('Founders') }}</strong></h2> --}}
            <div class="row justify-content-center pt-4 mt-5 mb-5">
                <div class="col-lg-10 text-center">
                    <div class="overflow-hidden mb-3">
                        <h3 class="font-weight-bold mb-0 appear-animation animated maskUp appear-animation-visible"
                            data-appear-animation="maskUp" style="animation-delay: 100ms;">Meet our founders
                            @foreach ($founders as $founder)
                                {{ $founder->name }} {{ !$loop->last ? 'and' : '' }}
                            @endforeach
                        </h3>
                    </div>
                    <div class="overflow-hidden mb-3">
                        <p class="lead mb-0 appear-animation animated maskUp appear-animation-visible"
                            data-appear-animation="maskUp" data-appear-animation-delay="200"
                            style="animation-delay: 200ms;">
                            With over 40 years of combined experience in corporate finance and investments, they have worked
                            with some of the most demanding clients in the multiple industries.
                            <br>
                            Our expertise is now available to our clients who are looking for guidance and support in
                            their
                            financial endeavors.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-4">

            @foreach ($founders as $founder)
                <div class="row {{ $loop->index % 2 != 0 ? 'd-none' : ' ' }}">
                    <div class="col-md-7 order-2">
                        <div class="overflow-hidden">
                            <h2 class="text-color-dark font-weight-bold text-8 mb-0 pt-0 mt-0 appear-animation"
                                data-appear-animation="maskUp" data-appear-animation-delay="300"> {{ $founder->translate($locale, 'en')->name}} </h2>
                        </div>
                        <div class="overflow-hidden mb-3">
                            <p class="font-weight-bold text-primary text-uppercase mb-0 appear-animation"
                                data-appear-animation="maskUp" data-appear-animation-delay="500">  {{ $founder->translate($locale, 'en')->job_title}}
                            </p>
                        </div>
                        <p class="lead appear-animation" data-appear-animation="fadeInUpShorter"
                            data-appear-animation-delay="700">
                        <div style="font-size: 1.2rem">
                            {!! $founder->translate($locale, 'en')->description !!}
                        </div>
                        </p>
                        {{-- <p class="pb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800"></p> --}}
                        <hr class="solid my-4 appear-animation" data-appear-animation="fadeInUpShorter"
                            data-appear-animation-delay="900">
                        <div class="row align-items-center appear-animation" data-appear-animation="fadeInUpShorter"
                            data-appear-animation-delay="200">
                            <div class="col-lg-6">
                                <a target="_blank" style="background: #0073b2 !important; color: #fff; padding: 5px 16px;"
                                    href="{{ $founder->linkedin }}" class="btn btn-modern mt-1">
                                    Connect on
                                    <i style="font-size: 18px;" class="fab fa-linkedin-in p-1 mx-1"></i>
                                </a>
                            </div>
                            {{-- <div class="col-sm-6 text-lg-end my-4 my-lg-0">
                            <strong class="text-uppercase text-1 me-3 text-dark">follow me</strong>
                            <ul class="social-icons float-lg-end">
                                <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div> --}}
                        </div>
                    </div>
                    <div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation"
                        data-appear-animation="fadeInRightShorter">
                        <img src="{{ Voyager::image($founder->image) }}" class="img-fluid" alt="">
                    </div>
                </div>

                {{--  --}}

                <div class="row {{ $loop->index % 2 == 0 ? 'd-none' : ' ' }}">
                    <div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation"
                        data-appear-animation="fadeInLeftShorter">
                        <img src="{{ Voyager::image($founder->image) }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7 order-2">
                        <div class="overflow-hidden">
                            <h2 class="text-color-dark font-weight-bold text-8 mb-0 pt-0 mt-0 appear-animation"
                                data-appear-animation="maskUp" data-appear-animation-delay="300">{{ $founder->translate($locale, 'en')->name}}</h2>
                        </div>
                        <div class="overflow-hidden mb-3">
                            <p class="font-weight-bold text-primary text-uppercase mb-0 appear-animation"
                                data-appear-animation="maskUp" data-appear-animation-delay="500">{{ $founder->translate($locale, 'en')->job_title}}
                            </p>
                        </div>
                        <p class="lead appear-animation" data-appear-animation="fadeInUpShorter"
                            data-appear-animation-delay="700">
                        <div style="font-size: 1.2rem">
                            {!! $founder->translate($locale, 'en')->description !!}
                        </div>
                        </p>
                        {{-- <p class="pb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800"></p> --}}
                        <hr class="solid my-4 appear-animation" data-appear-animation="fadeInUpShorter"
                            data-appear-animation-delay="900">
                        <div class="row align-items-center appear-animation" data-appear-animation="fadeInUpShorter"
                            data-appear-animation-delay="200">
                            <div class="col-lg-6">
                                <a target="_blank" style="background: #0073b2 !important; color: #fff; padding: 5px 16px;"
                                    href="{{ $founder->linkedin }}" class="btn btn-modern mt-1">
                                    Connect on
                                    <i style="font-size: 18px;" class="fab fa-linkedin-in p-1 mx-1"></i>
                                </a>
                            </div>
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

        <div class="container">
            <div class="row justify-content-center pt-4 mt-5 mb-5">
                <div class="col-lg-10 text-center">
                    <div class="overflow-hidden mb-3">
                        @if ($locale == 'en')                        
                            <p class="lead mb-0 appear-animation animated maskUp appear-animation-visible"
                                data-appear-animation="maskUp" data-appear-animation-delay="200"
                                style="animation-delay: 200ms;">
                                Our passion for finance, combined with extensive experience and wide network, allows to deliver
                                exceptional results to the clients. We are committed to providing personalized and tailored
                                solutions to each client, taking into account their unique circumstances and financial
                                objectives.
                            </p>
                        @elseif ($locale == 'ar')
                            <p class="lead mb-0 appear-animation animated maskUp appear-animation-visible"
                                data-appear-animation="maskUp" data-appear-animation-delay="200"
                                style="animation-delay: 200ms;">
                                يسمح شغفنا بالتفوّق بتقديم نتائج استثنائية للعملاء، الخبرة العالية والشبكة الواسعة.
                                <br>
                                نحن ملتزمون بتقديم حلول مخصصة لكل عميل، مع مراعاة ظروفهم الفريدة وأهدافهم المالية.
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div hidden class="container py-5 my-4">
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
                    <span> Consulting</span>
                </h1>
            </div>
        </div>
    </div>

    <section hidden class="section section-primary">
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

    <div hidden class="container">
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
