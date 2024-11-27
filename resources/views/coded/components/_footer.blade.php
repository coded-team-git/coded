<div class="container">
    <footer>
        <div class="top" style="{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'direction: rtl !important;' : '' }}">
            <div class="subscribe">
                <h1>{{ __('website/footer.offer') }}</h1>
            </div>
            <form action="" method="post">
                <label class="background d-flex"  for="in">
                    <input type="email" id="in" style="{{ LaravelLocalization::getCurrentLocale() == 'en' ? 'direction: ltr !important;' : '' }}" name="email" placeholder="{{ __('website/footer.email') }}"
                    class="custom_input">
                    <button type="submit" class="subm btn btn-sm btn-warning px-5">{{ __('website/footer.now') }}</button>
                </label>
            </form>

        </div>
        <div class="bottom">
            <div class="container">
                <div class="parent">
                    <div class="links_social" style="{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'direction: rtl !important;' : '' }}">
                        <div class="navbar"  >
                            <a href="{{ route('homePage') }}" class="hvr-float-shadow">{{ __('website/header.home') }}</a>
                            <a href="{{ route('contactUsPage') }}" class="hvr-float-shadow">{{ __('website/header.contact-us') }}</a>
                            <a href="{{ route('projectsPage') }}" class="hvr-float-shadow">{{ __('website/header.projects') }}</a>
                            <a href="{{ route('servicesPage') }}" class="hvr-float-shadow">{{ __('website/header.services') }}</a>
                            <a href="{{ route('aboutUsPage') }}" class="hvr-float-shadow">{{ __('website/header.about-us') }}</a>
                        </div>
                        <div class="social">
                            <a href="" class="hvr-float-shadow"><i class="fab fa-youtube"></i></a>
                            <a href="" class="hvr-float-shadow"><i class="fab fa-instagram"></i></a>
                            <a href="" class="hvr-float-shadow"><i class="fab fa-facebook-f"></i></a>
                            <a href="" class="hvr-float-shadow"><i class="fab fa-twitter"></i></a>
                        </div>

                    </div>
                    <div class="links_social1">
                        <p> {{ __('website/footer.rights') }} {{ Carbon\Carbon::now()->format('Y') }}</p>

                        {{--todo: LOGO --}}
                        {{-- <img src="assets/images/Group 5.svg" alt=""> --}}
                        <div class="lnk">
                            <a href="" class="hvr-float-shadow">{{ __('website/footer.T&C') }}</a>
                            <a href="" class="hvr-float-shadow">{{ __('website/footer.P&P') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
