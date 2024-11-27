<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>coded</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/hover-min.css') }}" />
    <style>
        .link-active:before {
            left: 0;
            right: 0
        }
    </style>
</head>

<body>
    <header>
        <div class="lang d-flex justify-content-between ">
            <a href="{{ LaravelLocalization::getLocalizedURL(__('website/header.lan')) }}"
                class="l d-flex align-items-center justify-content-center btn btn-secondary">
                {{ Str::upper(__('website/header.lan')) }}
            </a>
            {{-- ! end of switch lang btn  --}}

            <a href="{{ route('form') }}"
                class="m d-flex align-items-center justify-content-center mx-3 btn btn-warning">{{ __('website/header.free') }}</a>
        </div>
        <div class="nav ">

            @if (LaravelLocalization::getCurrentLocale() == 'ar')
                <a href="{{ route('form') }}"
                    class="hvr-underline-from-center
                {{ Route::currentRouteName() == 'form' ? 'link-active' : '' }}">{{ __('website/header.contact-us') }}
                </a>

                <a href="{{ route('workUs') }}"
                    class="hvr-underline-from-center{{ Route::currentRouteName() == 'workUs' ? 'link-active' : '' }}">{{ __('website/header.projects') }}</a>

                    <a href="{{ route('last') }}"
                    class="hvr-underline-from-center {{ Route::currentRouteName() == 'last' ? 'link-active' : '' }}">{{ __('website/header.services') }}</a>

                    <a href="{{ route('services') }}"
                    class="hvr-underline-from-center {{ Route::currentRouteName() == 'services' ? 'link-active' : '' }}">{{ __('website/header.about-us') }}</a>

                    <a href="{{ route('index') }}"
                    class="hvr-underline-from-center {{ Route::currentRouteName() == 'index' ? 'link-active' : '' }}">{{ __('website/header.home') }}</a>
            @else
                <a href="{{ route('index') }}"
                    class="hvr-underline-from-center {{ Route::currentRouteName() == 'index' ? 'link-active' : '' }}">{{ __('website/header.home') }}</a>
                <a href="{{ route('services') }}"
                    class="hvr-underline-from-center {{ Route::currentRouteName() == 'services' ? 'link-active' : '' }}">{{ __('website/header.about-us') }}</a>
                <a href="{{ route('last') }}"
                    class="hvr-underline-from-center {{ Route::currentRouteName() == 'last' ? 'link-active' : '' }}">{{ __('website/header.services') }}</a>

                <a href="{{ route('last') }}"
                    class="hvr-underline-from-center {{ Route::currentRouteName() == 'last' ? 'link-active' : '' }}">{{ __('website/header.services') }}</a>

                <a href="{{ route('form') }}"
                    class="hvr-underline-from-center
                {{ Route::currentRouteName() == 'form' ? 'link-active' : '' }}">{{ __('website/header.contact-us') }}
                </a>
            @endif

        </div>
        <div class="logo d-flex justify-content-center align-items-center">
            {{-- <img width="48px" src="{{ asset('assets/images/2oKyL5LM1KHU3AxTDettg1j6kVz.svg') }}" alt="" /> --}}
            <p style="font-weight: bold;color: #00adb5
; font-size: 1.3rem; margin-bottom: 0">
                coded
            </p>
        </div>
    </header>
    <div class="bars">
        <div class="d-flex justify-content-between align-items-center w-100">
            <i id="click" class="fas fa-bars"></i>
            <img src="{{ asset('assets/images/Group 5.svg') }}" alt="">
        </div>

        <div id="barhidden" class="barhidden">
            <a href="{{ route('form') }}" class="hvr-grow-shadow">تواصل معنا</a>
            <a href="{{ route('workUs') }}" class="hvr-grow-shadow">اعمالنا</a>
            <a href="{{ route('last') }}" class="hvr-grow-shadow">خدماتنا</a>
            <a href="{{ route('services') }}" class="hvr-grow-shadow">تعرف علينا</a>
            <a href="{{ route('index') }}" class="hvr-grow-shadow">الرئيسية</a>
        </div>
    </div>
    @yield('content')


    <div class="container">
        <footer>
            <div class="top">
                <form action="" method="post">
                    <label class="background d-flex" for="in">
                        <button type="submit" class="subm btn btn-sm btn-warning px-5">إشترك الأن</button>
                        <input type="email" id="in" name="email" placeholder="ادخل بريدك الإلكتروني"
                            class="custom_input">
                    </label>
                </form>
                <div class="subscribe">
                    <h1>اشترك معنا لتصلك أحدث عروضنا</h1>
                </div>
            </div>
    </div>
    <div class="bottom">
        <div class="container">
            <div class="parent">
                <div class="links_social">
                    <div class="social">
                        <a href="" class="hvr-float-shadow"><i class="fab fa-youtube"></i></a>
                        <a href="" class="hvr-float-shadow"><i class="fab fa-instagram"></i></a>
                        <a href="" class="hvr-float-shadow"><i class="fab fa-facebook-f"></i></a>
                        <a href="" class="hvr-float-shadow"><i class="fab fa-twitter"></i></a>
                    </div>
                    <div class="navbar">
                        <a href="{{ route('form') }}" class="hvr-float-shadow">تواصل معنا</a>
                        <a href="{{ route('workUs') }}" class="hvr-float-shadow">اعمالنا</a>
                        <a href="{{ route('last') }}" class="hvr-float-shadow">خدماتنا</a>
                        <a href="{{ route('services') }}" class="hvr-float-shadow">تعرف علينا</a>
                        <a href="{{ route('index') }}" class="hvr-float-shadow">الرئيسية</a>
                    </div>
                </div>
                <div class="links_social1">
                    <p> جميع الحقوق محفوظة لدينا 2024</p>
                    {{-- <img src="assets/images/Group 5.svg" alt=""> --}}
                    <div class="lnk">
                        <a href="" class="hvr-float-shadow">الشروط والأحكام</a>
                        <a href="" class="hvr-float-shadow">سياسة الخصوصية</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/myScript.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>
</body>
@yield('script')

</html>
