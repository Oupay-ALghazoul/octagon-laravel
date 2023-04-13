@php
    $locale = Session::get('locale') ?? 'en';
    $langFlag = 'flag-us';
    $langName = 'English';
    switch ($locale) {
        case 'ar':
            $langFlag = 'flag-ae';
            $langName = 'Arabic';
            break;
        case 'ru':
            $langFlag = 'flag-ru';
            $langName = 'Russian';
            break;
    }
    $services = \App\Models\Service::withTranslation(['ar', 'ru'])->get();
    app()->setLocale($locale);
@endphp

<!DOCTYPE html>
<html {{ $locale == 'ar' ? 'dir=rtl' : '' }}>

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Octagon for Consultancy</title>

    <meta name="keywords" content="WebSite Template" />
    <meta name="description" content="Octagon - Website for Consultancy">
    <meta name="author" content="Oupay Alghazoul">

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <link id="googleFonts"
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap"
        rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="vendor/animate/animate.compat.css">
    <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.min.css">

    <!-- Theme CSS -->
    @if ($locale == 'ar')
        <!-- RTL CSS -->
        <link rel="stylesheet" href="css/rtl-theme.css">
        <link rel="stylesheet" href="css/rtl-theme-elements.css">
    @else
        <link rel="stylesheet" href="css/theme.css">
        <link rel="stylesheet" href="css/theme-elements.css">
    @endif
    <link rel="stylesheet" href="css/theme-blog.css">
    <link rel="stylesheet" href="css/theme-shop.css">

    <!-- Skin CSS -->
    <link id="skinCSS" rel="stylesheet" href="css/skins/default.css">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Head Libs -->
    <script src="vendor/modernizr/modernizr.min.js"></script>

</head>

<body data-plugin-page-transition>
    <div class="body">
        <header id="header" class="header-effect-shrink"
            data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
            <div class="header-body border-color-primary border-bottom-0">
                <div class="header-top header-top-borders">
                    <div class="container h-100">
                        <div class="header-row h-100">
                            <div class="header-column justify-content-start">
                                <div class="header-row">
                                    <nav class="header-nav-top">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item nav-item-borders py-2 d-none d-sm-inline-flex">
                                                <span class="ps-0"><i
                                                        class="far fa-dot-circle text-4 text-color-primary"
                                                        style="top: 1px;"></i> {{ setting('site.address') }}</span>
                                            </li>
                                            <li class="nav-item nav-item-borders py-2">
                                                <a href="tel:123-456-7890"><i
                                                        class="fab fa-whatsapp text-4 text-color-primary"
                                                        style="top: 0;"></i> {{ setting('site.contact_number') }}</a>
                                            </li>
                                            <li class="nav-item nav-item-borders py-2 d-none d-md-inline-flex">
                                                <a href="mailto:mail@domain.com"><i
                                                        class="far fa-envelope text-4 text-color-primary"
                                                        style="top: 1px;"></i> {{ setting('site.contact_email') }}</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="header-column justify-content-end">
                                <div class="header-row">
                                    <nav class="header-nav-top">
                                        <ul class="nav nav-pills">
                                            {{-- <li class="nav-item nav-item-borders py-2 d-none d-lg-inline-flex">
													<a href="#">Blog</a>
												</li> --}}
                                            <li class="nav-item nav-item-borders py-2 pe-0 dropdown">
                                                <a class="nav-link" href="#" role="button" id="dropdownLanguage"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <img src="img/blank.gif" class="flag {{ $langFlag }}"
                                                        alt="English" />
                                                    {{ $langName }}
                                                    <i class="fas fa-angle-down"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="dropdownLanguage">
                                                    <a class="dropdown-item"
                                                        href="{{ route('change-lang', [
                                                            'lang' => 'en',
                                                        ]) }}"><img
                                                            src="img/blank.gif" class="flag flag-us" alt="English" />
                                                        English</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('change-lang', [
                                                            'lang' => 'ar',
                                                        ]) }}"><img
                                                            src="img/blank.gif" class="flag flag-ae"
                                                            alt="English" />
                                                        Arabic </a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('change-lang', [
                                                            'lang' => 'ru',
                                                        ]) }}"><img
                                                            src="img/blank.gif" class="flag flag-ru"
                                                            alt="English" /> Russian </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-container container">
                    <div class="header-row">
                        <div class="header-column">
                            <div class="header-row">
                                <div class="header-logo">
                                    <a href="index.html">
                                        <img alt="Octagon" width="160" height="48" data-sticky-width="82"
                                            data-sticky-height="40" src="img/logos/octagon-logo.svg">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="header-column justify-content-end">
                            <div class="header-row">
                                <div class="header-nav header-nav-line header-nav-bottom-line">
                                    <div
                                        class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                        <nav class="collapse">
                                            <ul class="nav nav-pills" id="mainNav">
                                                <li class="nav-item">
                                                    <a class="{{ request()->is('index') ? 'active' : '' }}"
                                                        href="index">
                                                        {{ __('Home') }}
                                                    </a>
                                                </li>
                                                {{-- <li class="nav-item">
                                                    <a class="{{ request()->is('services') ? 'active' : '' }}"
                                                        href="services">
                                                        {{__('Services')}} 
                                                    </a>
                                                </li> --}}
                                                <li class="nav-item dropdown">
                                                    <a class="dropdown-item dropdown-toggle {{ request()->is('services') ? 'active' : '' }}" href="#">
                                                        {{ __('Services') }}
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        @foreach ($services as $service)
                                                            <li class="dropdown-submenu">
                                                                <a class="dropdown-item"
                                                                    href="#">{{ $service->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="{{ request()->is('about-us') ? 'active' : '' }}"
                                                        href="about-us">
                                                        {{ __('About us') }}
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="{{ request()->is('contact') ? 'active' : '' }}"
                                                        href="contact">
                                                        {{ __('Contact') }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <!-- <ul class="header-social-icons social-icons d-none d-sm-block">
           <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
           <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
           <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
          </ul> -->
                                    <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse"
                                        data-bs-target=".header-nav-main nav">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div role="main" class="main">
            @yield('content')
        </div>

        <footer id="footer">
            <div class="container">
                <div class="footer-ribbon">
                    <span>{{ __('Get in Touch') }}</span>
                </div>
                <div class="row py-5 my-4">
                    <div class="col-md-6 mb-4 mb-lg-0">
                        <a href="index.html" class="logo pe-0 pe-lg-3">
                            <img alt="Octagon Website" src="img/logos/octagon-logo.svg" class="opacity-7 bottom-4"
                                height="68">
                        </a>
                        <p class="mt-2 mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu pulvinar
                            magna. Phasellus semper scelerisque purus, et semper nisl lacinia sit amet. Praesent
                            venenatis turpis vitae purus semper...</p>
                        <p class="mb-0"><a href="#" class="btn-flat btn-xs text-color-light"><strong
                                    class="text-2">{{ __('VIEW MORE') }}</strong><i
                                    class="fas fa-angle-right p-relative top-1 ps-2"></i></a></p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-3 mb-3">{{ __('Contact Us') }}</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list list-icons list-icons-lg">
                                    <li class="mb-1"><i class="far fa-dot-circle text-color-primary"></i>
                                        <p class="m-0"> {{ setting('site.address') }}</p>
                                    </li>
                                    <li class="mb-1"><i class="fab fa-whatsapp text-color-primary"></i>
                                        <p class="m-0"><a
                                                href="tel:8001234567">{{ setting('site.contact_number') }}</a></p>
                                    </li>
                                    <li class="mb-1"><i class="far fa-envelope text-color-primary"></i>
                                        <p class="m-0"><a
                                                href="mailto:mail@example.com">{{ setting('site.contact_email') }}
                                            </a>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list list-icons list-icons-sm">
                                    {{-- <li><i class="fas fa-angle-right"></i><a href="page-faq.html"
                                            class="link-hover-style-1 ms-1"> FAQ's</a></li>
                                    <li><i class="fas fa-angle-right"></i><a href="sitemap.html"
                                            class="link-hover-style-1 ms-1"> Sitemap</a></li> --}}
                                    <li><i class="fas fa-angle-right"></i><a href="contact-us"
                                            class="link-hover-style-1 ms-1"> {{ __('Contact Us') }} </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright footer-copyright-style-2">
                <div class="container py-2">
                    <div class="row py-4">
                        <div class="col d-flex align-items-center justify-content-center">
                            <p>© {{ __('Copyright 2023. All Rights Reserved') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Vendor -->
    <script src="vendor/plugins/js/plugins.min.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="js/theme.js"></script>

    <!-- Theme Custom -->
    <script src="js/custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="js/theme.init.js"></script>

</body>

</html>
