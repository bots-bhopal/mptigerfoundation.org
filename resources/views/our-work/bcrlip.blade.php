@extends('layouts.frontend.master')

@section('title', 'BCRLIP - MPTFS')

@push('css')

@endpush

@section('content')

    <!-- Page Banner Section -->
    <section class="page-banner">
        <div class="image-layer lazy-image" data-bg="url('../public/assets/images/mptfs-imgs/BCRLIP-Banner.jpg')"></div>
        {{-- <div class="bottom-rotten-curve alternate"></div> --}}

        <div class="auto-container">
            <h1>{{__('work.bcrlip_heading')}}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="#">{{__('work.home')}}</a></li>
                <li class="active">{{__('work.bcrlip_heading')}}</li>
            </ul>
        </div>
    </section>
    <!--End Banner Section -->

    <!-- Funfacts Section -->
	<section class="facts-section">
		<div class="auto-container">
			<div class="inner-container">

				<!-- Fact Counter -->
				<div class="fact-counter">
					<div class="row clearfix">
                        <div class="content-column col-xl-12 col-lg-12 col-sm-12">
                            <div class="row clearfix">

                                <!--Service Block-->
                                <div class="service-block col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="inner-box text-white">
                                        <h3 class="text-center" style="font-size: 60px;">{{__('work.bcrlip_heading_h3')}}</h3>
                                        <div class="text text-justify" style="font-size: 18px;">{{__('work.bcrlip_div1')}}</div>
                                    </div>
                                </div>

                            </div>
                        </div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- End Funfacts Section -->

	<!--About Section-->
    <section class="about-section style-two alternate">
        <div class="top-rotten-curve"></div>
        <div class="circle-two"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <!--Left Column-->
                <div class="left-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="sec-title">
                            <h2>{{__('work.bcrlip_heading_h2')}}</h2>
                            <div class="text text-justify">{{__('work.bcrlip_div2')}}</div>
                            <div class="text text-justify">{{__('work.bcrlip_div3')}}</div>
                            <ul>
                                <li class="text text-justify">
                                    <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('work.bcrlip_li1')}}
                                </li>

                                <li class="text text-justify">
                                    <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('work.bcrlip_li2')}}
                                </li>

                                <li class="text text-justify">
                                    <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('work.bcrlip_li3')}}
                                </li>

                                <li class="text text-justify">
                                    <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('work.bcrlip_li4')}}
                                </li>

                                <li class="text text-justify">
                                    <img src="{{asset('public/assets/images/mptfs-favicon.png')}}" alt="" style="margin-right: 5px;">{{__('work.bcrlip_li5')}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--Right Column-->
                <div class="right-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="images clearfix">
                            <figure class="wow fadeInRight" data-wow-delay="300ms"><img class="lazy-image" src="{{ asset('public/assets/images/mptfs-imgs/BCRLIP-Side-Pic.jpg') }}" data-src="{{ asset('public/assets/images/mptfs-imgs/BCRLIP-Side-Pic.jpg') }}" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
