@extends('layouts.frontend.master')

@section('title', 'Training & Research - MPTFS')

@push('css')
    <style>
        .about-section .right-column .images img{
            /* min-height: 500px; */
        }
    </style>
@endpush

@section('content')

    <!-- Page Banner Section -->
    <section class="page-banner">
        <div class="image-layer lazy-image" data-bg="url('../public/assets/images/mptfs-imgs/Training-n-Research-Banner.jpg')"></div>
        <div class="bottom-rotten-curve alternate"></div>

        <div class="auto-container">
            <h1>{{__('work.taining_heading')}}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('mptfs.home') }}">{{__('work.home')}}</a></li>
                <li class="active">{{__('work.taining_heading')}}</li>
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
                            <h2>{{__('work.training_heading_h2')}}</h2>
                            <div class="text text-justify">{{__('work.training_div1')}}</div>
                            <div class="text text-justify">{{__('work.training_div2')}}</div>
                            <div class="row">
                            <div class="col-lg-6">
                            <ul>
                                <li class="text text-left">
                                    <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('work.training_li1')}}
                                </li>

                                <li class="text text-left">
                                    <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('work.training_li2')}}
                                </li>

                                <li class="text text-left">
                                    <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('work.training_li3')}}
                                </li>

                                <li class="text text-left">
                                    <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('work.training_li4')}}
                                </li>

                                <li class="text text-left">
                                    <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('work.training_li5')}}
                                </li>
                            </ul>
                            </div>
                            <div class="col-lg-6">
                            <ul>
                                <li class="text text-left">
                                    <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('work.training_li6')}}
                                </li>

                                <li class="text text-left">
                                    <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('work.training_li7')}}
                                </li>

                                <li class="text text-left">
                                    <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('work.training_li8')}}
                                </li>

                                <li class="text text-left">
                                    <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('work.training_li9')}}
                                </li>
                            </ul>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Right Column-->
                <div class="right-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="images clearfix">
                            <figure class="wow fadeInRight" data-wow-delay="300ms"><img class="lazy-image" src="{{ asset('public/assets/images/mptfs-imgs/Training-n-Research-1-Cut-Vertically.jpg') }}" data-src="{{ asset('public/assets/images/mptfs-imgs/Training-n-Research-1-Cut-Vertically.jpg') }}" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!--What We Do Section / Style Two-->
    <section class="mission-vision" style="padding: 130px 0 100px!important;">
		<div class="image-layer lazy-image"></div>
        <div class="top-rotten-curve"></div>
        <div class="bottom-rotten-curve"></div>

        <div class="auto-container">
            <div class="row clearfix">

                <!--Left Column-->
                <div class="left-column col-lg-12 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="sec-title">
                            <div class="vision">
                                <div class="row clearfix">
                                    <div class="text-column col-lg-6 col-md-12 col-sm-12">
                                        <div class="inner">
                                            <div class="sec-title">
                                                <h2>{{__('work.research_heading_h2')}}</h2>
                                                <div class="text text-justify">{{__('work.research_div1')}}</div>
                                                <div class="text text-justify">{{__('work.research_div2')}}</div>
                                                <ul>
                                                    <li class="text text-justify">
                                                        <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('work.research_li1')}}
                                                    </li>

                                                    <li class="text text-justify">
                                                        <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('work.research_li2')}}
                                                    </li>

                                                    <li class="text text-justify">
                                                        <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('work.research_li3')}}
                                                    </li>

                                                    <li class="text text-justify">
                                                        <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('work.research_li4')}}
                                                    </li>

                                                    <li class="text text-justify">
                                                        <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('work.research_li5')}}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                                        <div class="inner">
                                            <div class="image wow fadeInLeft" data-wow-delay="0ms"><img class="lazy-image" src="{{ asset('public/assets/images/mptfs-imgs/Training-n-Research-2-Cut-Vertically.jpg') }}" data-src="{{ asset('public/assets/images/mptfs-imgs/Training-n-Research-2-Cut-Vertically.jpg') }}" alt=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
