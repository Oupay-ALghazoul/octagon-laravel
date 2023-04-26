
@php
    $locale = Session::get('locale') ?? 'en';
    $services = \App\Models\Service::withTranslation(['ar', 'ru'])->get();
    $subCategory = \App\Models\SubCategory::withTranslation(['ar', 'ru'])->find(request()->route('id'));
    app()->setLocale($locale);
    
@endphp

@extends('app')
@section('content')
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
    {{-- <section style="background-size: cover; background-image: url({{ Voyager::image($subCategory->image) }});" class="page-header page-header-modern bg-color-light-scale-s1 page-header-lg"> --}}
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-dark">{{$subCategory->title}}</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li class="active">{{ __('Services') }}</li>
                        <li><a href="#">{{$subCategory->service->name}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container pb-1 d-none">

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
                    <p class="lead mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">
                        {{ setting('site.services_title') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-2 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="500">
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

    <section class="section bg-color-grey section-height-3 border-0 mt-5 mb-0">
        <div class="container">

            <div class="row">
                <div class="col">

                    <div class="row align-items-center pt-5 pb-3 appear-animation" data-appear-animation="fadeInRightShorter">
                        <div class="col-md-8 pe-md-5 mb-5 mb-md-0">
                            <h2 class="font-weight-normal text-6 mb-3"><strong class="font-weight-extra-bold">{{$subCategory->title}}</strong></h2>
                            <p class="text-4">{!! $subCategory->description !!}</p>
                        </div>
                        <div class="col-md-4 px-5 px-md-3">
                            <img class="img-fluid scale-2 my-4" src="{{ Voyager::image($subCategory->image) }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>				


@endsection
