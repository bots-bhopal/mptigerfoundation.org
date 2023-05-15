@extends('layouts.frontend.master')

@section('title', 'Tiger State MP')

@push('css')
    <style>
        .about-section {
            background-color: #fff;
        }

        .para-section.set-padding {
            padding: 0px 0px 0px;
        }

        .district-section.set-padding {
            padding: 0px 0px 0px;
        }

        .district-section .left-column .inner {
            max-width: none;
            padding-right: 40px;
        }

        .district-section .right-column .images img {
            width: 100%;
            border-radius: 20px;
        }

        .about-section.style-two .left-column .inner {
            max-width: none;
            padding-left: 40px;
        }

        .about-section.alternate .left-column .inner {
            max-width: none;
            padding-right: 0px;
        }

        .about-section.style-two .right-column .inner {
            max-width: none;
            padding-bottom: 10px;
        }

        @media only screen and (max-width: 1139px){
            .about-section.style-two .left-column .inner {
                max-width: none;
                /* padding-top: 20px; */
                padding-left: 0;
            }
        }
    </style>
@endpush

@section('content')

    <!-- Page Banner Section -->
    <section class="page-banner">
        <div class="image-layer lazy-image" data-bg="url('../public/assets/images/mptfs-imgs/Project-Tiger-Banner.jpg')"></div>
        <div class="bottom-rotten-curve alternate"></div>

        <div class="auto-container">
            <h1>{{__('know.ptiger_heading')}}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('mptfs.home') }}">{{__('know.home')}}</a></li>
                <li class="active">{{__('know.ptiger_heading')}}</li>
            </ul>
        </div>
    </section>
    <!--End Banner Section -->

	<!--About Section-->
    <section class="about-section style-two alternate">
        <div class="circle-one"></div>
        <div class="circle-two"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <!--Left Column-->
                <div class="left-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="sec-title">
                            <h2>{{__('know.ptiger_heading_h2')}}</h2>
                            <div class="text text-justify">{{__('know.ptiger_div1')}}</div>
                        </div>
                    </div>
                </div>
                <!--Right Column-->
                <div class="right-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="images clearfix">
                            <figure class="wow fadeInRight" data-wow-delay="300ms"><img class="lazy-image" src="{{ asset('public/assets/images/mptfs-imgs/Why-Save-Tigers-2.jpg') }}" data-src="{{ asset('public/assets/images/mptfs-imgs/Why-Save-Tigers-2.jpg') }}" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!--What We Do Section / Style Two-->
    <section class="what-we-do style-two" style="padding: 60px 0 40px!important;">
		<div class="image-layer lazy-image"></div>
        <div class="bottom-rotten-curve"></div>

        <div class="auto-container">
            <div class="row clearfix">

                <div class="content-column col-xl-12 col-lg-12 col-sm-12">
                    <div class="row clearfix">

                        <!--Service Block-->
                        <div class="service-block col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="inner-box" style="padding: 0px 15px;">
                                <div class="text text-justify">{{__('know.ptiger_div2')}}</div><br/>
                                <div class="text text-justify">{{__('know.ptiger_div3')}}</div><br/>
                                <div class="text text-justify">{{__('know.ptiger_div4')}}</div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Learning Section -->
    <section class="about-section style-two alternate" style="padding-bottom: 0px;">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Right Column-->
                <div class="right-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="images clearfix">
                            <figure class="wow fadeInRight" data-wow-delay="300ms"><img class="lazy-image" src="{{ asset('public/assets/images/mptfs-imgs/Why-Save-Tigers-1.jpg') }}" data-src="{{ asset('public/assets/images/mptfs-imgs/Why-Save-Tigers-1.jpg') }}" alt=""></figure>
                        </div>
                    </div>
                </div>

                <!--Left Column-->
                <div class="left-column col-lg-6 col-md-12 col-sm-12" style="margin-bottom: 0px!important;">
                    <div class="inner">
                        <div class="sec-title">
                            <div class="text text-justify" style="padding-top: 0px!important;">{{__('know.ptiger_learning')}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- All Program Section -->
    <section class="para-section set-padding">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Left Column-->
                <div class="left-column col-lg-12 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="sec-title">
                            <div class="text text-justify">{{__('know.ptiger_extra_p1')}}</div>
                            <div class="text text-justify">{{__('know.ptiger_extra_p2')}}</div>
                            <div class="text text-justify">{{__('know.ptiger_extra_p3')}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--About Section-->
    <section class="district-section style-two set-padding">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Left Column-->
                <div class="left-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="sec-title">
                            <h2>{{__('know.ptiger_heading_roar')}}</h2>
                            <div class="text text-justify">{{__('know.ptiger_extra_p4')}}</div>
                        </div>
                    </div>
                </div>
                <!--Right Column-->
                <div class="right-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="images clearfix">
                            <figure class="wow fadeInRight" data-wow-delay="300ms"><img class="lazy-image" src="{{ asset('public/assets/images/mptfs-imgs/Tiger-Census.jpg') }}" data-src="{{ asset('public/assets/images/mptfs-imgs/Tiger-Census.jpg') }}" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- All Program Section -->
    <section class="district-section style-two set-padding">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Left Column-->
                <div class="left-column col-lg-12 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="sec-title">
                            <div class="text text-justify">{{__('know.ptiger_extra_p5')}}</div>
                            <div class="text text-justify">{{__('know.ptiger_extra_p6')}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
