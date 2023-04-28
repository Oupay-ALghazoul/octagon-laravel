@php
    $locale = Session::get('locale') ?? 'en';
    $services = \App\Models\Service::withTranslation(['ar', 'ru'])->get();
    $founders = \App\Models\Founder::withTranslations(['ar', 'ru'])->get();
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
        <div class="row justify-content-center pt-4 mt-5 mb-5">
            <div class="col-lg-10 text-center">
                <div class="overflow-hidden mb-3">
                    <h2 class="font-weight-bold mb-0 appear-animation animated maskUp appear-animation-visible"
                        data-appear-animation="maskUp" style="animation-delay: 100ms;">Meet our founders
                        @foreach ($founders as $founder)
                            {{ $founder->name }} {{ !$loop->last ? 'and' : '' }}
                        @endforeach
                        .
                    </h2>
                </div>
                <div class="overflow-hidden mb-3">
                    <p class="lead mb-0 appear-animation animated maskUp appear-animation-visible"
                        data-appear-animation="maskUp" data-appear-animation-delay="200" style="animation-delay: 200ms;">
                        With over 40 years of combined experience in corporate finance and investments, they have worked
                        with some of the most demanding clients in the industry.
                        <br>
                        Their expertise is now available to our clients who are looking for guidance and support in their
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
                            data-appear-animation="maskUp" data-appear-animation-delay="300">{{ $founder->name }}</h2>
                    </div>
                    <div class="overflow-hidden mb-3">
                        <p class="font-weight-bold text-primary text-uppercase mb-0 appear-animation"
                            data-appear-animation="maskUp" data-appear-animation-delay="500">{{ $founder->job_title }}</p>
                    </div>
                    <p class="lead appear-animation" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="700">{{ $founder->description }}</p>
                    {{-- <p class="pb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800"></p> --}}
                    <hr class="solid my-4 appear-animation" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="900">
                    <div class="row align-items-center appear-animation" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="1000">
                        <div class="col-lg-6">
                            <a href="#" class="btn btn-modern btn-dark mt-3">Get In Touch</a>
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
                <div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
                    <img src="{{ Voyager::image($founder->image) }}" class="img-fluid" alt="">
                </div>
            </div>

            {{--  --}}

            <div class="row {{ $loop->index % 2 == 0 ? 'd-none' : ' ' }}">
                <div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInLeftShorter">
                    <img src="{{ Voyager::image($founder->image) }}" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 order-2">
                    <div class="overflow-hidden">
                        <h2 class="text-color-dark font-weight-bold text-8 mb-0 pt-0 mt-0 appear-animation"
                            data-appear-animation="maskUp" data-appear-animation-delay="300">{{ $founder->name }}</h2>
                    </div>
                    <div class="overflow-hidden mb-3">
                        <p class="font-weight-bold text-primary text-uppercase mb-0 appear-animation"
                            data-appear-animation="maskUp" data-appear-animation-delay="500">{{ $founder->job_title }}</p>
                    </div>
                    <p class="lead appear-animation" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="700">{{ $founder->description }}</p>
                    {{-- <p class="pb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800"></p> --}}
                    <hr class="solid my-4 appear-animation" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="900">
                    <div class="row align-items-center appear-animation" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="1000">
                        <div class="col-lg-6">
                            <a href="#" class="btn btn-modern btn-dark mt-3">Get In Touch</a>
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
                    <p class="lead mb-0 appear-animation animated maskUp appear-animation-visible"
                        data-appear-animation="maskUp" data-appear-animation-delay="200" style="animation-delay: 200ms;">
                        Our passion for finance, combined with extensive experience and wide network, allows to deliver
                        exceptional results to the clients. We are committed to providing personalized and tailored
                        solutions to each client, taking into account their unique circumstances and financial objectives.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <section
        class="call-to-action call-to-action-default with-button-arrow content-align-center call-to-action-in-footer call-to-action-in-footer-margin-top">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-9">
                    <div class="call-to-action-content">
                        <h2 class="font-weight-normal text-6 mb-0">Porto is <strong
                                class="font-weight-extra-bold">everything</strong> you need to create an <strong
                                class="font-weight-extra-bold">awesome</strong> website!</h2>
                        <p class="mb-0">The Best HTML Site Template on ThemeForest</p>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3">
                    <div class="call-to-action-btn">
                        <a href="http://themeforest.net/item/porto-responsive-html5-template/4106987" target="_blank"
                            class="btn btn-dark btn-lg text-3 font-weight-semibold px-4 py-3">Get Started Now</a><span
                            class="arrow hlb d-none d-md-block" data-appear-animation="rotateInUpLeft"
                            style="top: -40px; left: 70%;"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="home-intro light border border-bottom-0 mb-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <p class="font-weight-bold text-color-dark">
                        {{ __('The fastest way to grow your business with the leader in') }} <span
                            class="highlighted-word highlighted-word-animation-1 text-color-primary font-weight-semibold text-5">
                            {{ __('Consultancy') }} </span>
                        <span>{{ __('Check out our options and features included') }}.</span>
                    </p>
                </div>
                <div class="col-lg-4">
                    <div class="get-started text-start text-lg-end">
                        <a href="#" class="btn btn-primary btn-lg text-3 font-weight-semibold btn-py-2 px-4">Get
                            Started Now</a>
                        <div class="learn-more">or <a href="index.html"
                                class="font-weight-bold">{{ __('learn more') }}.</a></div>
                    </div>
                </div>
            </div>

        </div>
    </div>


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
                    <span> Consulting</span>
                </h1>
                {{-- <p class="lead appear-animation mb-0" data-appear-animation="fadeInUpShorter"
                    data-appear-animation-delay="300">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque
                    consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo.
                </p> --}}
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

    <section class="section bg-color-grey-scale-1 border-0 pt-0 pt-md-5 m-0">
        <div class="container py-5 my-5">
            <div class="row align-items-center justify-content-center pb-4 pb-lg-0 my-5">
                <div class="col-lg-7 order-2 order-lg-1 pe-5 pt-4 pt-lg-0 mt-md-5 mt-lg-0 appear-animation"
                    data-appear-animation="fadeInRightShorter">
                    <h2 class="font-weight-normal text-6 mb-3"><strong
                            class="font-weight-extra-bold">{{ __('Who') }}</strong> {{ __('We Are') }}
                    </h2>
                    <p class="lead">{{ setting('site.who_we_are') }}</p>
                    {{-- <p class="pb-2 mb-4">Phasellus blandit massa enim. Nullam id varius elit. blandit massa enimariusius. --}}
                    </p>
                    <a href="#" class="btn btn-dark font-weight-semibold btn-py-2 px-5">Our History</a>
                </div>
                <div class="col-9 col-lg-3 order-1 order-lg-2 scale-6 pb-5 pb-lg-0 mt-0 mt-md-4 mb-5 mb-lg-0">
                    <img class="img-fluid appear-animation" src="img/home/who-we-are.jpeg"
                        data-appear-animation="fadeInRightShorter" data-appear-animation-delay="300"
                        data-plugin-options="{'accY': -400}" alt="">
                </div>
            </div>
        </div>
    </section>

    <div class="container pb-1">

        <div class="row pt-4">
            <div class="col">
                <div class="overflow-hidden mb-3">
                    <h2 class="font-weight-bold text-8 mb-0 appear-animation" data-appear-animation="maskUp">
                        {{ __('We Are Here To Help You') }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10">
                <div class="overflow-hidden">
                    <p class="lead mb-0 appear-animation" data-appear-animation="maskUp"
                        data-appear-animation-delay="200">
                        {{ setting('site.services_title') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-2 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="500">
                <a href="#" class="btn btn-modern btn-dark mt-1">Get a Quote!</a>
            </div>
        </div>

        <div class="row">
            <div class="col py-3">
                <hr class="solid mt-5 mb-2">
            </div>
        </div>

        <div class="row">
            <div class="featured-boxes featured-boxes-style-2">
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-md-6 col-lg-4 appear-animation" data-appear-animation="fadeInRightShorter"
                            data-appear-animation-delay="{{ $loop->index * 200 + 700 }}">
                            <div class="featured-box featured-box-effect-4">
                                <div class="box-content">
                                    <i
                                        class="icon-featured {{ $service->icon }} icons {{ $loop->index % 2 != 0 ? 'text-color-primary bg-color-grey' : 'text-color-light bg-color-primary' }}"></i>
                                    <h4 class="font-weight-bold">{{ $service->name }}</h4>
                                    <p class="px-3">{{ $service->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
