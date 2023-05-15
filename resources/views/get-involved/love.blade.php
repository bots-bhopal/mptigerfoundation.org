@extends('layouts.frontend.master')

@section('title', 'I Love Wildlife - MPTFS')

@push('css')
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <style>
        .about-section.alternate {
            padding: 50px 0px 120px;
        }

        .about-feature-two .inner-box .my-li{
            list-style-type: disc;
            margin-left: 5px;
        }

        .sec-title h2:nth-of-type(1), h2:nth-of-type(3) {
            top: 75px;
            font-size: 150px;
        }

        .btn-style-three .btn-title {
            padding: 20px 60px;
            border-radius: 100px;
        }

        .btn-style-three .btn-title:before {
            border-radius: 100px;
        }

        @media only screen and (max-width: 768px) and (min-width: 300px){
            .sec-title h2:nth-of-type(1), h2:nth-of-type(3) {
                top: 0;
                font-size: 80px;
            }
        }

        @media only screen and (max-width: 992px) and (min-width: 768px){
            .sec-title h2:nth-of-type(1), h2:nth-of-type(3) {
                top: 0;
                font-size: 100px;
            }
        }
    </style>
@endpush

@section('content')

    <!-- Page Banner Section -->
    <section class="page-banner">
        <div class="image-layer lazy-image" data-bg="url('public/assets/images/mptfs-imgs/tiger-love.jpg')"></div>
        <div class="bottom-rotten-curve alternate"></div>

        <div class="auto-container">
            <h1>{{__('involved.love_main_heading')}}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('mptfs.home') }}">{{__('involved.home')}}</a></li>
                <li class="active">{{__('involved.love_main_heading')}}</li>
            </ul>
        </div>
    </section>
    <!--End Banner Section -->

	<!--About Section-->
    <section class="about-section style-two alternate">
        <div class="circle-two"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <!--Wildlife Column-->
                <div class="left-column col-lg-12 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="sec-title d-lg-flex">
                            <h2 class="text-center">{{__('involved.love_heading_1')}}</h2>
                            <h2 class="text-center">
                                <img src="{{asset('public/assets/images/mptfs-imgs/lovewidlife.png')}}" class="img-fluid mb-3" width="550" height="550" alt="I-Love-Wildlife"/>
                            </h2>
                            <h2 class="text-center">{{__('involved.love_heading_2')}}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <!--Left Column-->
                <div class="left-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="sec-title mt-5">
                            <h3 class="text-center">{{__('involved.love_heading_pay')}}</h3>
                            <div class="text text-justify">{{__('involved.love_para')}}</div>
                        </div>
                    </div>
                </div>

                <!--Right Column-->
                <div class="right-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="images clearfix">
                            <figure class="wow fadeInRight" data-wow-delay="300ms"><img class="lazy-image" src="{{ asset('public/assets/images/mptfs-imgs/QR.jpg') }}" data-src="{{ asset('public/assets/images/mptfs-imgs/QR.jpg') }}" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <!--Donation Column-->
                <div class="left-column col-lg-12 col-md-12">
                    <div class="inner">
                        <div class="sec-title mt-5">
                            <h5 class="text-center">{{__('involved.heart_btn_1')}}</h5>
                            <div class="text-center mt-2">
                                <a href="{{route('close-heart')}}" target="_blank" class="theme-btn btn-style-three"><span class="btn-title cls-to-my-heart-btn">{{__('home.btn_donate_cap')}}</span></a>
                                {{-- <a href="{{route('close-heart')}}" target="_blank" class="theme-btn"><span class="text-primary"><b><i>Close to my heart</i></b></span></a> --}}
                            </div>
                            <h5 class="text-center">{{__('involved.heart_btn_2')}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
