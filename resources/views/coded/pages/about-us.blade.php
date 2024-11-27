@extends('coded.layouts.app')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/Mostyle.css') }}">
@endpush
@section('content')
    {{-- $sections[0]->contents[0]->content --}}
    {{-- $sections[0]->name --}}



    <div class="container">
        <div class="row">
            <section class="marketing col-md-12" id="#">
                <div class="grid col-md-6 text-center continer-imgs">
                    <img src="{{ asset('assets/images/Vector first.png') }}" class="vector-img">
                    <img src="{{ asset('assets/images/Comp 1_2.gif') }}" class="gif-img">
                </div>
                <div class="col-md-6" id="continer-text">
                    <h3>{{ $sections[0]->name }}</h3>
                    <p class="info_par2">{{ $sections[0]->contents[0]->content }}
                    </p>

                </div>

            </section>
            <!-- *************************************************************************************************************** -->
            <section class="success col-lg-12" id="#">
                <div class="text">
                    <img src="{{ asset('assets/images/Rectangle 126.png') }}">
                    <h2 style="direction: {{ LaravelLocalization::getCurrentLocaleDirection() }}"><span>
                        {{ $sections[4]->name }}
                        <span id="number">10 </span> </h2>
                    <h3>{{ __('website/about-us.success') }}</h3>

                </div>

                <div class="box">
                    <div class="card-main">
                        <img src="{{ asset('assets/images/Vector (2).png') }}">
                        <h2>{{ $sections[1]->name }}</h2>
                    <p class="note">{{ $sections[1]->contents[0]->content }}
                    </p>

                    </div>
                    <div class="card-main" id="card-border">
                        <img src="{{ asset('assets/images/Asset 3 1.png') }}" class="img-width">
                        <h2>{{ $sections[2]->name }}</h2>
                    <p class="note">{{ $sections[2]->contents[0]->content }}
                    </p>
                    </div>
                    <div class="card-main" id="card-border">
                        <img src="{{ asset('assets/images/Vector (1).png') }}">
                        <h2>{{ $sections[3]->name }}</h2>
                        <p class="note">{{ $sections[3]->contents[0]->content }}
                        </p>

                    </div>
                </div>
                <p class="text-p col-lg-8">{{ $sections[4]->contents[0]->content }}
                </p>
            </section>
            <!-- *************************************************************************************************************** -->
            <section class="services col-lg-12">
                <div class="col-lg-5" id="content-text">

                    <h1><span>{{ __('website/about-us.we') }}</span> {{ __('website/about-us.in') }}</h1>

                    <h2>{{ __('website/about-us.service') }}<span class="radius">{{ $sections[5]->name }}</span></h2>

<p>
    {{ $sections[5]->contents[0]->content }}
</p>
                    <div class="services-box">

                        <div class="services-card">
                            <h3>{{ __('website/about-us.employees') }}</h3>
                            <span class="num" data-goal="{{ $countEmp }}">0</span>
                        </div>
                        <div class="services-card" id="border">
                            <h3>{{ __('website/about-us.clients') }}</h3>
                            <span class="num" data-goal="122">0</span>
                        </div>
                        <div class="services-card" id="border">
                            <h3>{{ __('website/home.projects')}}</h3>
                            <span class="num" data-goal="{{ $count }}">0</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" id="content-imge">
                    <img src="{{ asset('assets/images/Vector (6).png') }}" class ="first-img" alt="">
                    <img src="{{ asset('assets/images/Rectangle 122.png') }}"
                        style="position: absolute; top:50px;left: 100px" class="sec-img" alt="">
                </div>
            </section>



            <a href="{{ route('contactUsPage') }}" class="btn_sbmit">
                <i class="fas fa-chevron-left">
                </i>{{ __('website/home.order') }}</a>
        </div>
    </div>



    <script src="{{ asset('assets/js/Script.js') }}"></script>
    <script src="{{ asset('assets/js/myScript.js') }}"></script>
@endsection
