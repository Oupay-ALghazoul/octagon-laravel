@php
    // $setting_home = \App\Models\SiteSetting::first()->translate(app()->getLocale(), 'fallbackLocale');
    // $services = \App\Models\Service::get()->translate(app()->getLocale(), 'fallbackLocale');;
    // $news = \App\Models\News::orderBy('id','desc')->skip(0)->take(3)->get()->translate(app()->getLocale(), 'fallbackLocale');;
    $locale = Session::get('locale') ?? 'en';
    $services = \App\Models\Service::withTranslation(['ar', 'ru'])->get();
    $slides = \App\Models\HomeSlide::withTranslations(['ar', 'ru'])->get();
    $whatWeDeliverItems = \App\Models\WhatWeDeliver::withTranslations(['ar', 'ru'])->get();
    app()->setLocale($locale);
    
@endphp

@extends('app')

@section('content')

<div class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual dots-inside dots-horizontal-center show-dots-hover dots-light nav-style-1 nav-inside nav-inside-plus nav-dark nav-lg nav-font-size-lg show-nav-hover mb-0"
    data-plugin-options="{'autoplayTimeout': 7000}" data-dynamic-height="['700px','700px','700px','550px','500px']"
    style="height: 700px;">
    <div class="owl-stage-outer">
        <div class="owl-stage">

            <!-- Carousel Slides -->
            @foreach ($slides as $slide)
                <div class="owl-item position-relative overlay overlay-show overlay-op-7 lazyload"
                    data-dynamic-height="['700px','700px','700px','550px','500px']"
                    style="background-image: url({{ Voyager::image($slide->image) }}); background-size: cover; background-position: center;">
                    <div class="container position-relative z-index-3 h-100">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="col-lg-7 text-center">
                                <div class="d-flex flex-column align-items-center justify-content-center h-100">
                                    <h1 class="text-color-light font-weight-extra-bold text-12-5 line-height-3 mb-2 appear-animation"
                                        data-appear-animation="blurIn" data-appear-animation-delay="500"
                                        data-plugin-options="{'minWindowWidth': 0}">
                                        {!! $slide->getTranslatedAttribute('title', $locale, 'en') !!}</h1>
                                    <p data-appear-animation="blurIn" data-appear-animation-delay="800"
                                        data-plugin-options="{'minWindowWidth': 0}"
                                        class="text-4-5 text-color-light font-weight-light opacity-7 text-center mb-5">
                                        {{ $slide->getTranslatedAttribute('sub_title', $locale, 'en') }}
                                    </p>
                                    <!--<a href="#"-->
                                    <!--    class="btn btn-light btn-outline text-color-light text-color-hover-dark font-weight-bold text-3 btn-px-5 py-3 appear-animation"-->
                                    <!--    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="2500"-->
                                    <!--    data-plugin-options="{'minWindowWidth': 0}">GEST STARTED NOW!</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
    <div class="owl-dots mb-5">
        @foreach ($slides as $slide)
            <button role="button" class="owl-dot {{$loop->index == 0 ? 'active' : ''}}"><span></span></button>
        @endforeach
    </div>
</div>

    <div class="home-intro light border border-bottom-0 mb-0">
        <div class="container">
            <div class="row align-items-center">
                <div style="text-align: justify" class="col-lg-12">
                    <p class="font-weight-bold text-color-dark">
                        {{-- Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla quasi voluptates tempore maxime non
                        libero quod voluptatem, similique iure, eaque nesciunt odio voluptatum obcaecati! Eius fugit ut
                        consequatur dicta quae. --}}
                    </p>
                    @if ($locale == 'en')                        
                    <p style="font-size: 1.2rem; font-weight: 400">
                        <strong style="font-weight: 400">OCTAGON</strong> is a privately owned consultancy firm with global expertise. Established in Dubai, UAE in 2022 by partners who collectively have over 55 years of international expertise in asset management, investment banking, strategic planning and consulting. OCTAGON strives to serve clients to best international standards and meet their needs when it comes to selecting right jurisdiction and structure, establishing and maintaining relationship with banks, transferring assets and protecting value of their wealth and providing lifestyle solutions.
                    </p>
                    <ol class="mt-4" style="font-size: 1.2rem; color:#333333;">
                        <li class="mt-3">
                            OCTAGON operates from Dubai and has extensive network of partners with international service providers in UAE, Oman, Mauritius, Luxemburg, Cyprus, Vietnam, Indonesia, Hong Kong, and Singapore. Throughout its extensive network OCTAGON can offer B2B and B2C clients the best tailored made solutions across the globe
                        </li>
                        <li class="mt-3"> OCTAGON in one stop shop that provides solutions in corporate finance, tax planning, structuring, recruitment and business development </li>
                        <li class="mt-3"> OCTAGON facilitates company formation and opening bank accounts and helps to maintain ongoing relationship with banks, as well as provides advice regarding investment products linked to residency.</li>
                        <li class="mt-3"> OCTAGON provides solutions in transferring portfolios of securities and opening brokerage accounts with access to global markets. Throughout its diversified expertise and international partners network OCTAGON can offer investment products across all asset classes and construct portfolios.</li>
                        <li class="mt-3">Alongside business related services OCTAGON provides lifestyle solutions tailored for HNWI clients.
                        </li>
                        <li class="mt-3">OCTAGON takes pride in providing clients with exceptional services and commits to excellence.
                        </li>
                        <li class="mt-3">OCTAGON is licensed corporate services provider and licensed to provide accounting, bookkeeping, tax, sourcing, procurement, project development, marketing research and industrial consultancy.
                        </li>
                    </ol>
                    @elseif ($locale == 'ar')
                    <p style="font-size: 1.2rem; font-weight: 400">
                        <strong style="font-weight: 400">اوكتاجون</strong>
                         هي شركة استشارية مملوكة للقطاع الخاص تتمتع بخبرة عالمية. تأسست في دبي ، الإمارات العربية المتحدة في عام 2022 من قبل شركاء لديهم أكثر من 55 عامًا من الخبرة الدولية في إدارة الأصول والخدمات المصرفية الاستثمارية والتخطيط الاستراتيجي والاستشارات.
                        تسعى اوكتاجون جاهدة لخدمة عملائها وفقًا لأفضل المعايير الدولية وتلبية احتياجاتهم عندما يتعلق الأمر باختيار الاختصاص والهيكل المناسبين، إنشاء والحفاظ على العلاقة مع البنوك، نقل الأصول وحماية قيمة ثرواتهم وتوفير حلول أسلوب الحياة.                        
                    </p>
                    <ol class="mt-4" style="font-size: 1.2rem; color:#333333;">
                        <li class="mt-3">
                            اوكتاجون تعمل من دبي ولديها شبكة واسعة من الشركاء ومزودي الخدمات الدوليين في الإمارات العربية المتحدة، سلطنة عمان، جمهورية موريشيوس، لوكسمبورغ ، قبرص ، جمهورية فيتنام الاشتراكية، جمهورية اندونيسيا، هونغ كونغ ، وجمهورية سنغافورة.
                            من خلال شبكتها الواسعة ، يمكن لـ اوكتاجون أن تقدّم أفضل الحلول المصممة خصيصًا في جميع أنحاء العالم للشركات والافراد. 
                        </li>
                        <li class="mt-3"> 
                            اوكتاجون في متجر واحد توفر حلولاً في تمويل الشركات، التخطيط الضريبي، الهيكلة والتوظيف وتطوير الأعمال.                        </li>
                        <li class="mt-3">
                            اوكتاجون تسهّل تكوين الشركة، فتح الحسابات المصرفية وتساعد في الحفاظ على العلاقة المستمرة مع البنوك، فضلاً عن تقديم المشورة بشأن المنتجات الاستثمارية المرتبطة بالإقامة.
                        </li>
                        <li class="mt-3"> 
                            اوكتاجون تقدّم حلولاً في تحويل محافظ الأوراق المالية، وفتح حسابات الوساطة مع الوصول إلى الأسواق العالمية. من خلال خبرتها المتنوعة وشبكة الشركاء الدوليين ، يمكن لـ اوكتاجون تقديم منتجات استثمارية عبر جميع فئات الأصول وإنشاء محافظ.
                        </li>
                        <li class="mt-3">
                            إلى جانب الخدمات المتعلقة بالأعمال، توفر اوكتاجون حلول نمط الحياة المصممة للعملاء الأثرياء.
                        </li>
                        <li class="mt-3">
                            اوكتاجون تفتخر بتزويد العملاء بخدمات استثنائية وتلتزم بالتميّز.
                        </li>
                        <li class="mt-3">
                            اوكتاجون هي شركة مرخصة لتقديم خدمات للشركات وهي مرخصة لتقديم خدمات المحاسبة، ضبط الدفاتر، الضرائب والتوريد، المشتريات، تطوير المشاريع وبحوث التسويق والاستشارات الصناعية.
                        </li>
                    </ol>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <section class="section what-we-deliver">

        <div class="container">

            <h2 class="font-weight-normal text-7 text-center mt-5"> {{ __("What We Deliver") }} </h2>

            <div class="row align-items-stretch">

                @foreach ($whatWeDeliverItems as $whatWeDeliverItem )
                    
                <div class="col-12 col-md-6 mb-4">
                    <div style="border-bottom: 3px solid var(--primary)" class="what-we-deliver-item bg-color-hover-primary d-flex align-items-center bg-white p-4 h-100">
                        <img style="width: 80px" class="mr-3" src="{{ Voyager::image($whatWeDeliverItem->logo) }}" alt="Generic placeholder image">
                        <div class="p-3">
                        <h4 class="mb-0">{{ $whatWeDeliverItem->translate($locale, "en")->title }}</h4>
                        <p class="mb-0">{{ $whatWeDeliverItem->translate($locale, "en")->sub_title }}</p>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>

    </section>

    <div hidden class="home-intro light border border-bottom-0 mb-0">
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
                        <a href="{{ url('contact') }}"
                            class="btn btn-primary btn-lg text-3 font-weight-semibold btn-py-2 px-4">Get
                            Started Now</a>
                        <!--<div class="learn-more">or <a href="index.html" class="font-weight-bold">{{ __('learn more') }}.</a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>


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
                {{-- <p class="lead appear-animation mb-0" data-appear-animation="fadeInUpShorter"
                    data-appear-animation-delay="300">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque
                    consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo.
                </p> --}}
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

    <section hidden class="section bg-color-grey-scale-1 border-0 pt-0 pt-md-5 m-0">
        <div class="container py-5 my-5">
            <div class="row align-items-center justify-content-center pb-4 pb-lg-0 my-5">
                <div class="col-lg-7 order-2 order-lg-1 pe-5 pt-4 pt-lg-0 mt-md-5 mt-lg-0 appear-animation"
                    data-appear-animation="fadeInRightShorter">
                    <h2 class="font-weight-normal text-6 mb-3"><strong
                            class="font-weight-extra-bold">{{ __('Who We Are') }}</strong>
                    </h2>
                    <p class="lead">{{ setting('site.who_we_are') }}</p>
                    {{-- <p class="pb-2 mb-4">Phasellus blandit massa enim. Nullam id varius elit. blandit massa enimariusius. --}}
                    </p>
                    <!--<a href="#" class="btn btn-dark font-weight-semibold btn-py-2 px-5">Our History</a>-->
                </div>
                <div class="col-9 col-lg-3 order-1 order-lg-2 scale-6_ pb-5 pb-lg-0 mt-0 mt-md-4 mb-5 mb-lg-0">
                    <img class="img-fluid appear-animation" src="img/home/who-we-are.jpeg"
                        data-appear-animation="fadeInRightShorter" data-appear-animation-delay="300"
                        data-plugin-options="{'accY': -400}" alt="">
                </div>
            </div>
        </div>
    </section>

    <div hidden class="container pb-1">

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
