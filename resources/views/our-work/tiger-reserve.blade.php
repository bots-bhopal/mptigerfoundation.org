@extends('layouts.frontend.master')

@section('title', 'Tiger Conservation in MP - MPTFS')

@push('css')

@endpush

@section('content')

    <!-- Page Banner Section -->
    <section class="page-banner">
        <div class="image-layer lazy-image" data-bg="url('../public/assets/images/mptfs-imgs/TIGER-Banner.jpg')"></div>

        <div class="auto-container">
            <h1>{{__('work.tiger_heading')}}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('mptfs.home') }}">{{__('work.home')}}</a></li>
                <li class="active">{{__('work.tiger_heading')}}</li>
            </ul>
        </div>
    </section>
    <!--End Banner Section -->

	<!--Tiger Reserve of MP -->
    <section class="about-section style-two alternate">
        <div class="top-rotten-curve"></div>
        <div class="circle-two"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <!--Left Column-->
                <div class="left-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <h2 style="font-size: 42px;">{{__('work.tiger_romp')}}</h2>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="sec-title">
                                    <ul>
                                        <li class="text text-justify">
                                            <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('work.tiger_li1')}}
                                        </li>

                                        <li class="text text-justify">
                                            <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('work.tiger_li2')}}
                                        </li>

                                        <li class="text text-justify">
                                            <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('work.tiger_li3')}}
                                        </li>

                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="sec-title">
                                    <ul>
                                        <li class="text text-justify">
                                            <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('work.tiger_li4')}}
                                        </li>

                                        <li class="text text-justify">
                                            <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('work.tiger_li5')}}
                                        </li>

                                        <li class="text text-justify">
                                            <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('work.tiger_li6')}}
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
                            <figure class="wow fadeInRight" data-wow-delay="300ms"><img class="lazy-image" src="{{ asset('public/assets/images/mptfs-imgs/Tiger-Reserves-Side.jpg') }}" data-src="{{ asset('public/assets/images/mptfs-imgs/Tiger-Reserves-Side.jpg') }}" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--The Project Tiger -->
    <section class="what-we-do style-two" style="padding: 130px 0 100px!important;">
		<div class="image-layer lazy-image"></div>
        <div class="bottom-rotten-curve"></div>

        <div class="auto-container">
            <div class="row clearfix">

                <div class="content-column col-xl-12 col-lg-12 col-sm-12">
                    <div class="row clearfix">

                        <!--Service Block-->
                        <div class="service-block col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="inner-box">
                                <h3 class="text-center">{{__('know.ptiger_heading_h3')}}</h3>
                                <div class="text text-justify">{{__('know.ptiger_div5')}}</div>
                                <div class="text text-justify">{{__('know.ptiger_div6')}}</div>
                                    <ul>
                                        <li class="text text-justify">
                                            <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('know.ptiger_li1')}}
                                        </li>

                                        <li class="text text-justify">
                                            <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('know.ptiger_li2')}}
                                        </li>

                                        <li class="text text-justify">
                                            <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('know.ptiger_li3')}}
                                        </li>

                                        <li class="text text-justify">
                                            <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('know.ptiger_li4')}}
                                        </li>

                                        <li class="text text-justify">
                                            <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('know.ptiger_li5')}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--NTCA Section-->
    <section class="team-section">
        <div class="upper-boxes">
            <div class="auto-container">
                <div class="row clearfix">
                    <!--Strengthening Institute-->
                    <div class="service-block col-lg-12 col-md-12 col-sm-12">
                        <div class="inner-box">
                            <h3 class="text-center">{{__('know.ptiger_ntca_heading')}}</h3>
                            <div class="text text-justify">{{__('know.ptiger_ntca_div')}}
                                <br><small>(Source:- http://www.tigernet.nic.in/alluser/aboutntca.aspx)</small>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
