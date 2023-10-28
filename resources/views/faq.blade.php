@php
    $locale = Session::get('locale') ?? 'en';
    $FrequentlyAskedQuestions = \App\Models\FrequentlyAskedQuestion::withTranslation(['ar', 'ru'])->get();
    app()->setLocale($locale);

@endphp

@extends('app')

@section('content')
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-dark">
                        {{ __('FAQ') }}
                    </h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="/">{{ __('Home') }}</a></li>
                        <li class="active"> {{ __('FAQ') }} </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-4">

        <div class="row">
            <div class="col">

                <h2 class="font-weight-normal text-7 mb-2">{{__("Frequently Asked Questions")}}</h2>

                <hr class="solid my-5">

                <div class="toggle toggle-primary m-0" data-plugin-toggle>
                @foreach ( $FrequentlyAskedQuestions as $q)
                    
                    <section class="toggle">
                        <a class="toggle-title">{{ $q->question }}</a>
                        <div class="toggle-content">
                            <p>{!! $q->answer !!}</p>
                        </div>
                    </section>

                @endforeach
            </div>
            </div>
        </div>
    @endsection
