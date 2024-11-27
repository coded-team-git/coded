<header>
    <div class="lang d-flex justify-content-between ">
        <a href="{{ LaravelLocalization::getLocalizedURL(__('website/header.lan')) }}"
            class="l d-flex align-items-center justify-content-center btn btn-secondary">
            {{ Str::upper(__('website/header.lan')) }}
        </a>
        {{-- ! end of switch lang btn  --}}

        <a href="{{ route('contactUsPage') }}"
            class="m d-flex align-items-center justify-content-center mx-3 btn btn-warning">{{ __('website/header.free') }}</a>
    </div>
    <div class="nav "
        style="{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'direction: rtl !important;' : '' }}">
        <a href="{{ route('homePage') }}"
            class="hvr-underline-from-center {{ Route::currentRouteName() == 'homePage' ? 'link-active' : '' }}">{{ __('website/header.home') }}</a>

        <a href="{{ route('aboutUsPage') }}"
            class="hvr-underline-from-center {{ Route::currentRouteName() == 'aboutUsPage' ? 'link-active' : '' }}">{{ __('website/header.about-us') }}</a>

        <a href="{{ route('servicesPage') }}"
            class="hvr-underline-from-center {{ Route::currentRouteName() == 'servicesPage' ? 'link-active' : '' }}">{{ __('website/header.services') }}</a>

        <a href="{{ route('projectsPage') }}"
            class="hvr-underline-from-center{{ Route::currentRouteName() == 'projectsPage' ? 'link-active' : '' }}">{{ __('website/header.projects') }}</a>

        <a href="{{ route('contactUsPage') }}"
            class="hvr-underline-from-center
            {{ Route::currentRouteName() == 'contactUsPage' ? 'link-active' : '' }}">{{ __('website/header.contact-us') }}
        </a>


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
        {{-- <img src="{{ asset('assets/images/Group 5.svg') }}" alt=""> --}}
    </div>

    <div id="barhidden" class="barhidden">
        <a href="{{ route('contactUsPage') }}" class="hvr-grow-shadow">{{ __('website/header.contact-us') }}</a>
        <a href="{{ route('projectsPage') }}" class="hvr-grow-shadow">{{ __('website/header.projects') }}</a>
        <a href="{{ route('servicesPage') }}" class="hvr-grow-shadow">{{ __('website/header.services') }}</a>
        <a href="{{ route('aboutUsPage') }}" class="hvr-grow-shadow">{{ __('website/header.about-us') }}</a>
        <a href="{{ route('homePage') }}" class="hvr-grow-shadow">{{ __('website/header.home') }}</a>
    </div>
</div>
