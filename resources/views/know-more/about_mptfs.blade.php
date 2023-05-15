@extends('layouts.frontend.master')

@section('title', 'About - MPTFS')

@push('css')

@endpush

@section('content')

    <!-- Page Banner Section -->
    <section class="page-banner">
        <div class="image-layer lazy-image" data-bg="url('../public/assets/images/mptfs-imgs/about-banner.jpg')"></div>
        <div class="bottom-rotten-curve alternate"></div>

        <div class="auto-container">
            <h1>{{__('know.about_us_heading')}}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('mptfs.home') }}">{{__('know.home')}}</a></li>
                <li class="active">{{__('know.about_us_heading')}}</li>
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
                            <h2 class="h2-color">{{__('know.about_us_heading')}}</h2>
                            <div class="text text-justify">{{__('know.about_p1')}}</div>
                            <div class="text text-justify">{{__('know.about_p2')}}</div>
                        </div>
                    </div>
                </div>
                <!--Right Column-->
                <div class="right-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="images clearfix">
                            <figure class="wow fadeInRight" data-wow-delay="300ms"><img class="lazy-image" src="{{ asset('public/assets/images/mptfs-imgs/About-Us-Side-pic.jpg') }}" data-src="{{ asset('public/assets/images/mptfs-imgs/About-Us-Side-pic.jpg') }}" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!--What We Do Section / Style Two-->
    <section class="what-we-do style-two">
		<div class="image-layer lazy-image bg-color"></div>
        <div class="bottom-rotten-curve"></div>

        <div class="auto-container">
            <div class="row clearfix">

                <div class="content-column col-xl-12 col-lg-12 col-sm-12">
                    <div class="row clearfix">

                        <!--Service Block-->
                        <div class="service-block col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <h3 class="h3-color">{{__('know.vision_heading')}}</h3>
                                <div class="text-color text-justify">{{__('know.vision_para')}}</div>
                            </div>
                        </div>

                        <!--Service Block-->
                        <div class="service-block col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <h3 class="h3-color">{{__('know.mission_heading')}}</h3>
                                <div class="text-color text-justify">{{__('know.mission_para')}}</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

    <!--Team Section-->
    <section class="team-section">
    	<div class="bottom-rotten-curve"></div>

        <div class="auto-container">

        	<div class="sec-title centered">
                <h2>{{__('know.history_heading')}}</h2>
            </div>

            <div class="row clearfix">
                <!--Left Column-->
                <div class="left-column col-lg-12 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="sec-title">
                            <div class="text-color text-justify">{{__('know.history_div1')}}</div>
                            <div class="text-color text-justify">{{__('know.history_div2')}}</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!--What We Do Section / Style Two-->
    <section class="what-we-do style-two">
        <div class="image-layer lazy-image bg-color"></div>
        <div class="top-rotten-curve"></div>
        <div class="bottom-rotten-curve1" style="position: absolute; left: 0; bottom: 0px; width: 100%; height: 20px; background: url({{ asset('public/assets/images/background/rotten-curve-8.png') }}) center bottom no-repeat; background-size: 100% 100%; z-index: 1;"></div>

        <div class="auto-container">
            <div class="row clearfix">
                <div class="title-column col-xl-12 col-lg-12 col-sm-12">
                    <div class="inner">
                        <div class="sec-title">
                            <h2 class="h2-color text-center">{{__('know.key_focus_heading')}}</h2>
                        </div>
                    </div>
                </div>

                <div class="content-column col-xl-12 col-lg-12 col-sm-12">
                    <div class="row clearfix">


                        <!--Service Block-->
                        <div class="service-block col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <img src="{{asset('public/assets/images/icons/1st.png')}}" alt="">
                                </div>
                                <div class="text-color">{{__('know.key_focus_div1')}}</div>
                            </div>
                        </div>

                        <!--Service Block-->
                        <div class="service-block col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <img src="{{asset('public/assets/images/icons/2nd.png')}}" alt="">
                                </div>
                                <div class="text-color">{{__('know.key_focus_div2')}}</div>
                            </div>
                        </div>

                        <!--Service Block-->
                        <div class="service-block col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <img src="{{asset('public/assets/images/icons/3rd.png')}}" alt="">
                                </div>
                                <div class="text-color">{{__('know.key_focus_div3')}}</div>
                            </div>
                        </div>

                        <!--Service Block-->
                        <div class="service-block col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <img src="{{asset('public/assets/images/icons/4th.png')}}" alt="">
                                </div>
                                <div class="text-color">{{__('know.key_focus_div4')}}</div>
                            </div>
                        </div>

                        <!--Service Block-->
                        <div class="service-block col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <img src="{{asset('public/assets/images/icons/5th.png')}}" alt="">
                                </div>
                                <div class="text-color">{{__('know.key_focus_div5')}}</div>
                            </div>
                        </div>

                        <!--Service Block-->
                        <div class="service-block col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <img src="{{asset('public/assets/images/icons/6th.png')}}" alt="">
                                </div>
                                <div class="text-color">{{__('know.key_focus_div6')}}</div>
                            </div>
                        </div>

                        <div class="service-block col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <img src="{{asset('public/assets/images/icons/7th.png')}}" alt="">
                                </div>
                                <div class="text-color">{{__('know.key_focus_div7')}}</div>
                            </div>
                        </div>

                        <div class="service-block col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <img src="{{asset('public/assets/images/icons/8th.png')}}" alt="">
                                </div>
                                <div class="text-color">{{__('know.key_focus_div8')}}</div>
                            </div>
                        </div>

                        <div class="service-block col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <img src="{{asset('public/assets/images/icons/9th.png')}}" alt="">
                                </div>
                                <div class="text-color mt-0 mb-0">{{__('know.key_focus_div9')}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
