@extends('layouts.frontend.master')

@section('title', 'Support - MPTFS')

@push('css')
    <style>
        .about-feature-two .inner-box .my-li{
            list-style-type: disc;
            margin-left: 5px;
        }

        .team-section {
            padding-bottom: 0;
        }

        .call-to-action{
            background-color: #ffffff;
            padding: 0;
        }

        .call-to-action .sec-title .text {
            color: #000000;
        }
    </style>
@endpush

@section('content')

    <!-- Page Banner Section -->
    <section class="page-banner">
        <div class="image-layer lazy-image" data-bg="url('../public/assets/images/mptfs-imgs/Support-Banner.jpg')"></div>
        <div class="bottom-rotten-curve alternate"></div>

        <div class="auto-container">
            <h1>{{__('involved.support_heading')}}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('mptfs.home') }}">{{__('involved.home')}}</a></li>
                <li class="active">{{__('involved.support_heading')}}</li>
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
                            <h2>{{__('involved.support_heading_h2')}}</h2>
                            <div class="text text-justify">{{__('involved.support_div1')}}</div>
                        </div>
                    </div>
                </div>
                <!--Right Column-->
                <div class="right-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="images clearfix">
                            <figure class="wow fadeInRight" data-wow-delay="300ms"><img class="lazy-image" src="{{ asset('public/assets/images/mptfs-imgs/Support-Side.jpg') }}" data-src="{{ asset('public/assets/images/mptfs-imgs/Support-Side.jpg') }}" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--What We Do Section / Style Two-->
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
                                <h3 class="text-center">{{__('involved.support_heading_h3')}}</h3>
                                <div class="text text-justify">{{__('involved.support_div2')}}</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Team Section-->
    <section class="team-section">
        <div class="upper-boxes">
            <div class="auto-container">
                <div class="row clearfix">
                    <!--Strengthening Institute-->
                    <div class="about-feature-two col-lg-12 col-md-12 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="0ms">
                            <div class="image-layer lazy-image"></div>
                            <h4 class="text-center">{{__('involved.strength_heading')}}</h4>
                            <ul>
                                <li class="text text-justify my-li">
                                    {{__('involved.strength_li1')}}
                                </li>

                                <li class="text text-justify my-li">
                                    {{__('involved.strength_li2')}}
                                </li>

                                <li class="text text-left my-li">
                                    {{__('involved.strength_li3')}}
                                </li>

                                <li class="text text-justify my-li">
                                    {{__('involved.strength_li4')}}
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!--Awareness and Training-->
                    <div class="about-feature-two col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="300ms" style="padding-bottom: 128px!important;">
                            <div class="image-layer lazy-image"></div>
                            <h4 class="text-center">{{__('involved.aware_heading')}}</h4>
                            <ul>
                                <li class="text text-justify my-li">
                                    {{__('involved.aware_li1')}}
                                </li>

                                <li class="text text-justify my-li">
                                    {{__('involved.aware_li2')}}
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!--Community Development-->
                    <div class="about-feature-two col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="300ms">
                            <div class="image-layer lazy-image"></div>
                            <h4 class="text-center">{{__('involved.community_heading')}}</h4>
                            <ul>
                                <li class="text text-justify my-li">
                                    {{__('involved.community_li1')}}
                                </li>

                                <li class="text text-justify my-li">
                                    {{__('involved.community_li2')}}
                                </li>

                                <li class="text text-justify my-li">
                                    {{__('involved.community_li3')}}
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!--Bank Details-->
                    <div class="about-feature-two col-lg-12 col-md-12 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="300ms">
                            <div class="image-layer lazy-image" data-bg="{{url('public/assets/images/resource/featured-image-2.jpg')}}"></div>
                            <h4 class="text-center">{{__('involved.bank_heading')}}</h4>
                            <ul>
                                <li class="text text-justify">
                                    {{__('involved.bank__li1')}}
                                </li>

                                <li class="text text-justify">
                                    {{__('involved.bank__li2')}}
                                </li>

                                <li class="text text-justify">
                                    {{__('involved.bank__li3')}}
                                </li>

                                <li class="text text-justify">
                                    {{__('involved.bank__li4')}}
                                </li>

                                <li class="text text-justify">
                                    {{__('involved.bank__li5')}}
                                </li>

                                <li class="text text-justify">
                                    {{__('involved.bank__li6')}}
                                </li>

                                <li class="text text-justify">
                                    {{__('involved.bank__li7')}}
                                </li>

                                <li class="text text-justify">
                                    {{__('involved.bank__li8')}}
                                </li>

                                <li class="text text-justify">
                                    {{__('involved.bank__li9')}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="call-to-action">
        <!--Image Layer-->
        <div class="auto-container">
            <div class="inner" style="max-width: 900px;">
                <div class="sec-title centered">
                    <div class="text"><h3 style="text-shadow: 1px 2px 4px rgba(0, 0, 0, .5);">{{__('involved.help_para')}}</h3></div>
                    <div class="link-box clearfix">
                        <a href="https://mptiger.mponline.gov.in/" target="_blank" class="theme-btn btn-style-three"><span class="btn-title">{{__('home.btn_donate_cap')}}</span></a>
                        <a href="{{ route('love') }}" class="theme-btn btn-style-one"><span class="btn-title custom-title">{{__('home.btn_join_cap_1')}} <i class="fa fa-heart" style="font-size: 20px; position: relative; top: 2px; margin: 0 5px;"></i> {{__('home.btn_join_cap_2')}}</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
