@extends('coded.layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/l.css') }} " />

<div class="top-up">
    <div class="container">
        <div class="row" id="fir">
            <div class="parent parents mb-5 pb-5 col-lg-12 d-flex justify-content-center">
                <div class="col-md-6 intmark wow fadeInLeft">

                    {{-- <img src="{{asset('assets/img/Comp 1_1.gif')}}" alt="error" /> --}}
                </div>
                <div class="col-md-6 int wow fadeInRight " id="sec">
                    <h4>{{$sections[0]->name}}</h4>
                    <p>
                        {{$sections[0]->contents[0]->content}}
                    </p>
                </div>
            </div>
            <div class="parent col-md-12">
                <h2>{{ __('website/services.trast') }}</h2>

                <div class="com col-lg-12">
                    <div class="col-lg-12 d-flex icons wow fadeInRight">
                        <div class="col-md-2 images ">
                            <img src="{{asset('assets/img/image 1.png')}}" alt="" />
                        </div>
                        <div class="col-md-2 images">
                            <img src="{{asset('assets/img/img2.png')}}" alt="" />
                        </div>
                        <div class="col-md-2 images">
                            <img src="{{asset('assets/img/image 2.png')}}" alt="" />
                        </div>
                        <div class="col-md-2 images">
                            <img src="{{asset('assets/img/image 3.png')}}" alt="" />
                        </div>
                        <div class="col-md-2 images">
                            <img src="{{asset('assets/img/image 4.png')}}" alt="" />
                        </div>

                    </div>
                    <img class="vector" src="{{asset('assets/img/Vector')}}" alt="error" />
                </div>
            </div>
        </div>
    </div>
</div>

<div class="down">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <h3 class="wow pulse">{{ $sections[1]->name }}</h3>
                <div class="d-flex justify-content-center column">
                    <div class="col-md-6 acc">
                        <div class="accordions wow fadeInLeft">


                            @foreach($services as $service)
                            <div class="accordion">
                                <input type="checkbox" id="{{$service->name}}" />
                                <label for="{{$service->name}}" id="acc-label" class="acc-label">{{$service->name}}</label>

                            </div>

                            @endforeach

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="img d-flex align-items-center wow fadeInRight">
                            <img src="{{asset('assets/img/Rectangle 128.png')}}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
