@php
    // $setting_home = \App\Models\SiteSetting::first()->translate(app()->getLocale(), 'fallbackLocale');
    // $services = \App\Models\Service::get()->translate(app()->getLocale(), 'fallbackLocale');;
    // $news = \App\Models\News::orderBy('id','desc')->skip(0)->take(3)->get()->translate(app()->getLocale(), 'fallbackLocale');;
    $locale = Session::get('locale') ?? 'en';
    $services = \App\Models\Service::get();
    $slides = \App\Models\HomeSlide::get();
    app()->setLocale($locale);
@endphp

@extends('app')


@section('content')
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-dark">{{__('Contact Us')}}</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="#">{{__('Home')}}</a></li>
                        <li class="active">{{__('Contact Us')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-4">

        <div class="row mb-2">
            <div class="col-12 col-lg-6">

                <h2 class="font-weight-bold text-7 mt-2 mb-0">{{__('Contact Us')}}</h2>
                <p class="mb-4">{{ __("Feel free to ask for details, don't save any questions!") }}</p>

                <form class="contact-form" action="{{ url('contact') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="contact-form-success alert alert-success d-none mt-4">
                        <strong>Success!</strong> Your message has been sent to us.
                    </div>

                    <div class="contact-form-error alert alert-danger d-none mt-4">
                        <strong>Error!</strong> There was an error sending your message.
                        <span class="mail-error-message text-1 d-block"></span>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="form-label mb-1 text-2"> {{ __('Full Name') }} </label>
                            <input type="text" value="" data-msg-required="Please enter your name." maxlength="100"
                                class="form-control text-3 h-auto py-2" name="name" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="form-label mb-1 text-2"> {{ __('Email Address') }} </label>
                            <input type="email" value="" data-msg-required="Please enter your email address."
                                data-msg-email="Please enter a valid email address." maxlength="100"
                                class="form-control text-3 h-auto py-2" name="email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label mb-1 text-2"> {{ __('Phone Number') }} </label>
                            <input type="tel" value="" data-msg-required="Please enter the Phone Number."
                                maxlength="100" class="form-control text-3 h-auto py-2" name="phone" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label mb-1 text-2"> {{ __('Message') }} </label>
                            <textarea maxlength="5000" data-msg-required="Please enter your message." rows="5"
                                class="form-control text-3 h-auto py-2" name="message" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <input type="submit" value="{{ __('Send Message') }}" class="btn btn-primary btn-modern"
                                data-loading-text="Loading...">
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-12 col-lg-6">
                <div class="appear-animation animated fadeIn appear-animation-visible" data-appear-animation="fadeIn" data-appear-animation-delay="800" style="animation-delay: 800ms;">
                    <h2 class="font-weight-bold text-7 mt-2 mb-0"> {{__('Contact Info')}} </h2>
                    <ul class="list list-icons list-icons-style-2 mt-2 p-3">
                        <li><i class="fas fa-map-marker-alt top-6"></i> <strong class="text-dark">{{__('Contact Us')}}:</strong> {{ setting('site.address') }} </li>
                        <li><i class="fas fa-phone top-6"></i> <strong class="text-dark">{{__('Phone')}}:</strong> <span dir="ltr">{{ setting('site.contact_number') }} </span></li>
                        <li><i class="fas fa-envelope top-6"></i> <strong class="text-dark">{{__('Email')}}:</strong> <a href="mailto:{{ setting('site.contact_email') }}">{{ setting('site.contact_email') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row mb-5 d-none">
            <div class="col-lg-4">

                <div class="overflow-hidden mb-3">
                    <h4 class="pt-5 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200"
                        data-plugin-options="{'accY': -200}">Get in <strong>Touch</strong></h4>
                </div>
                <div class="overflow-hidden mb-3">
                    <p class="lead text-4 mb-0 appear-animation" data-appear-animation="maskUp"
                        data-appear-animation-delay="400" data-plugin-options="{'accY': -200}">Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius.</p>
                </div>
                <div class="overflow-hidden">
                    <p class="mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="600"
                        data-plugin-options="{'accY': -200}">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Curabitur eget leo at velit imperdiet varius.</p>
                </div>

            </div>
            <div class="col-lg-4 offset-lg-1 appear-animation" data-appear-animation="fadeIn"
                data-appear-animation-delay="800" data-plugin-options="{'accY': -200}">

                <h4 class="pt-5">Our <strong>Office</strong></h4>
                <ul class="list list-icons list-icons-style-3 mt-2">
                    <li><i class="fas fa-map-marker-alt top-6"></i> <strong>Address:</strong> 1234 Street Name, City Name
                    </li>
                    <li><i class="fas fa-phone top-6"></i> <strong>Phone:</strong> (123) 456-789</li>
                    <li><i class="fas fa-envelope top-6"></i> <strong>Email:</strong> <a
                            href="mailto:mail@example.com">mail@example.com</a></li>
                </ul>

            </div>
            <div class="col-lg-3 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="1000"
                data-plugin-options="{'accY': -200}">

                <h4 class="pt-5">Business <strong>Hours</strong></h4>
                <ul class="list list-icons list-dark mt-2">
                    <li><i class="far fa-clock top-6"></i> Monday - Friday - 9am to 5pm</li>
                    <li><i class="far fa-clock top-6"></i> Saturday - 9am to 2pm</li>
                    <li><i class="far fa-clock top-6"></i> Sunday - Closed</li>
                </ul>

            </div>
        </div>

    </div>

    <div class="container-fluid">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3613.002902132003!2d55.170899!3d25.1017631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6b7202f4ae41%3A0x12533f787f8d656!2sdu%20-%20Salam%20Tower!5e0!3m2!1sen!2sfr!4v1681722740275!5m2!1sen!2sfr"
            height="450" style="border:0; width: 100%" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3612.994459964501!2d55.1711540222168!3d25.102048873901367!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f133c2faae9a7%3A0xd41ce2c9f5ec768d!2sCarrefour!5e0!3m2!1sen!2seg!4v1681485005456!5m2!1sen!2seg" height="450" style="border:0; width: 100%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
    </div>
@endsection
