@extends('layouts.frontend.master')

@section('title', 'MP Tiger Foundation Society - MPTFS')

@push('css')
    <style>
        .news-section {
            padding: 50px 0px 50px;
            margin: 0px 0px 40px;
        }

        .what-we-do.style-two{
            padding: 50px 0 0px!important;
        }

        .what-we-do{
            padding: 50px 0 0!important;
        }

        .upcoming-events{
            padding: 50px 0!important;
        }

        .about-section.style-two{
            padding: 0 0 50px!important;
        }

        .about-section .upper-boxes{
            margin-bottom: 0px!important;
        }

        .team-carousel-section{
            padding: 50px 0 50px!important;
        }

        .call-to-action{
            padding: 50px 0 50px!important;
        }

        .custom-title{
            padding: 15px 50px!important;
        }

        .team-block .lower-box h3 {
            margin-bottom: 20px;
        }
    </style>
@endpush

@section('content')

    <!-- Banner Section -->
    <section class="banner-section style-two">
        <div class="banner-carousel love-carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 0, "autoHeight":false, "singleItem" : true, "autoplay": true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "1" } , "1024":{ "items" : "1" }}}'>

            <!-- Slide Item -->
            <div class="slide-item">
				<div class="image-layer lazy-image" data-bg="url('public/assets/images/mptfs-banner/Banner-1.jpg')"></div>

                <div class="auto-container">
                    <div class="content-box">
                        <h2>{{__('home.slider_cap_h2_part_1')}}<br>{{__('home.slider_cap_h2_part_2')}}</h2>
                        <div class="btn-box"><a href="{{route('mptfs.about')}}" class="theme-btn btn-style-one"><span class="btn-title">{{__('home.slider_btn_cap')}}</span></a></div>
                    </div>
                </div>
            </div>

            <!-- Slide Item -->
            <div class="slide-item">
                <div class="image-layer lazy-image" data-bg="url('public/assets/images/mptfs-banner/Banner-3.jpg')"></div>

                <div class="auto-container">
                    <div class="content-box">
                        <h2>{{__('home.slider_cap_h2_part_1')}}<br>{{__('home.slider_cap_h2_part_2')}}</h2>
                        <div class="btn-box"><a href="{{route('mptfs.about')}}" class="theme-btn btn-style-one"><span class="btn-title">{{__('home.slider_btn_cap')}}</span></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Banner Section -->

    <!--About Section-->
    <section class="about-section style-two">
        <div class="top-rotten-curve"></div>
        <div class="upper-boxes">
            <div class="auto-container">
                <div class="row clearfix">
                    <!--About Feature-->
                    <div class="about-feature-two col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="0ms">
							<div class="image-layer lazy-image"></div>
                            <h4>{{__('home.vision_box_heading')}}</h4>
                            <div class="text text-justify">
                                {{__('home.vision_box_para')}}
                            </div>
                        </div>
                    </div>
                    <!--About Feature-->
                    <div class="about-feature-two col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="300ms">
							<div class="image-layer lazy-image"></div>
                            <h4>{{__('home.mission_box_heading')}}</h4>
                            <div class="text text-justify">
                                {{__('home.mission_box_para')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="what-we-do style-two">
            <div class="image-layer lazy-image" data-bg="url('public/assets/images/mptfs-imgs/non-profit.jpg')"></div>

            <div class="auto-container">
                <div class="row clearfix">
                    <div class="title-column col-xl-6 col-lg-12 col-sm-12">
                        <div class="inner">
                            <div class="sec-title">
                                <h2>
                                    {{__('home.non_profit_h1_1')}}<br>
                                    {{__('home.non_profit_h1_2')}}<br>
                                    {{__('home.non_profit_h1_3')}}<br>
                                    {{__('home.non_profit_h1_4')}}
                                </h2>
                                <div class="link-box clearfix"><a href="{{route('mptfs.about')}}" class="theme-btn btn-style-one"><span class="btn-title">{{__('home.about_btn_cap')}}</span></a></div>
                            </div>
                        </div>
                    </div>

                    <div class="content-column col-xl-6 col-lg-12 col-sm-12">
                        <div class="row clearfix">
                            <!--Service Block-->
                            <div class="service-block col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <img src="{{asset('public/assets/images/icons/conserv.png')}}" alt="">
                                    </div>
                                    <h3>{{__('home.non_profit_heading1')}}</h3>
                                    <div class="text">{{__('home.non_profit_div1')}}</div>
                                </div>
                            </div>

                            <!--Service Block-->
                            <div class="service-block col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <img src="{{asset('public/assets/images/icons/aware.png')}}" alt="">
                                    </div>
                                    <h3>{{__('home.non_profit_heading2')}}</h3>
                                    <div class="text">{{__('home.non_profit_div2')}}</div>
                                </div>
                            </div>

                            <!--Service Block-->
                            <div class="service-block col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <img src="{{asset('public/assets/images/icons/research.png')}}" alt="">
                                    </div>
                                    <h3>{{__('home.non_profit_heading3')}}</h3>
                                    <div class="text">{{__('home.non_profit_div3')}}</div>
                                </div>
                            </div>

                            <!--Service Block-->
                            <div class="service-block col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <img src="{{asset('public/assets/images/icons/conflict.png')}}" alt="">
                                    </div>
                                    <h3>{{__('home.non_profit_heading4')}}</h3>
                                    <div class="text">{{__('home.non_profit_div4')}}</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="auto-container" style="padding-top: 100px;">
            <div class="row clearfix">
                <!--Left Column-->
                <div class="left-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="sec-title">
                            <h2>{{__('home.about_h2_part_1')}}<br>{{__('home.about_h2_part_2')}}</h2>
                            <div class="text text-justify">{{__('home.about_para')}}</div>
							<div class="link-box clearfix"><a href="{{route('mptfs.tiger.state')}}" class="theme-btn btn-style-one"><span class="btn-title">{{__('home.about_btn_cap')}}</span></a></div>
                        </div>
                    </div>
                </div>
                <!--Right Column-->
                <div class="right-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="images clearfix">
                            <figure class="image wow fadeInUp" data-wow-delay="0ms"><img class="lazy-image" src="{{asset('public/assets/images/mptfs-imgs/Why-Save-Tigers-Home.jpg')}}" data-src="{{asset('public/assets/images/mptfs-imgs/Why-Save-Tigers-Home.jpg')}}" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Upcoming Events Section-->
    <section class="upcoming-events">

        <div class="auto-container">
            <div class="sec-title centered">
                <h2>{{__('home.our_event_heading')}}</h2>
            </div>

            <div class="events-box wow fadeInUp" data-wow-delay="0ms">
                <!--Event Block-->
                @forelse ($events as $event)
                    <div class="event-block-two">
                        <div class="inner-box">
                            <div class="row clearfix">
                                <div class="title-column col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner">
                                        <div class="image-box"><a href="{{route('event.detail', $event->slug)}}"><img class="lazy-image" src="{{asset('public/assets/images/mptfs-imgs/help.jpg')}}" data-src="{{asset('public/storage/event-image/'.$event->image)}}" alt=""></a></div>
                                        <div class="title"><h3><a href="{{route('event.detail', $event->slug)}}">{{Str::limit($event->title, '25')}}</a></h3></div>
                                    </div>
                                </div>
                                <div class="info-column col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner">
                                        <div class="clearfix">
                                            <ul class="info clearfix">
                                                <li><span class="icon far fa-calendar"></span>{{ date('d-m-Y', strtotime($event->date)) }}</li>
                                                <li><span class="icon far fa-clock"></span>{{ date('h:i A', strtotime($event->time)) }}</li>
                                                <li><span class="icon fa fa-map-marker-alt"></span>{{$event->place}}</li>
                                            </ul>
                                            <div class="link-box"><a href="{{route('event.detail', $event->slug)}}" class="theme-btn btn-style-one"><span class="btn-title">{{__('home.btn_view_event_cap')}}</span></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12 col-md-12 p-0">
                        <div class="card h-100">
                            <div class="p-2 text-center">
                                <h2>{{__('home.event_not_found')}}</h2>
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @endforelse
            </div>
            <div class="link text-center mt-4"><a href="{{ route('event.blog') }}" class="theme-btn btn-style-one"><span class="btn-title">{{__('home.btn_all_event_cap')}}</span></a></div>
        </div>
    </section>

    <!--Milestone Carousel Section-->
    <section class="team-carousel-section no-padding-top">
        <div class="auto-container">

            <div class="title-box clearfix">
                <div class="sec-title">
                    <div class="sub-title">{{__('home.title-milestone')}}</div>
                    <h2>{{__('home.h2-milestone')}}</h2>
                </div>
            </div>

            <!--Team Carousel-->
            <div class="team-carousel love-carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 30, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 5000, "smartSpeed": 500, "responsive":{ "0" :{ "items": "1" },"600" :{ "items": "1" }, "800" :{ "items" : "2" }, "1024":{ "items" : "3" }, "1366":{ "items" : "3" }}}'>
                @foreach ($milestones as $milestone)
                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box"><a href="#"><img src="{{asset('public/storage/milestone_image/'. $milestone->image)}}" alt=""></a></figure>
                            <div class="lower-box">
                                <div class="content">
                                    <h3><a href="{{ route('home.milestone.detail', $milestone->slug) }}">{{ $milestone->title }}</a></h3>
                                    <a href="{{ route('home.milestone.detail', $milestone->slug) }}" class="designation">Click here to Read More....</a>
                                    <div class="social-links"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div><!--End Team Carousel-->
        </div>
    </section>

    <!--Call To Action Section-->
    <section class="call-to-action">
        <!--Image Layer-->
		<div class="image-layer lazy-image" data-bg="url('public/assets/images/mptfs-imgs/help.jpg')"></div>
        <div class="auto-container">
            <div class="inner" style="max-width: 900px;">
                <div class="sec-title centered">
                    <h2>{{__('home.help_heading')}}</h2>
                    <div class="text">{{__('home.help_para')}}</div>
                    <div class="link-box clearfix">
                        <a href="https://mptiger.mponline.gov.in/" target="_blank" class="theme-btn btn-style-three"><span class="btn-title">{{__('home.btn_donate_cap')}}</span></a>
                        <a href="{{ route('love') }}" class="theme-btn btn-style-one"><span class="btn-title custom-title">{{__('home.btn_join_cap_1')}} <i class="fa fa-heart" style="font-size: 20px; position: relative; top: 2px; margin: 0 5px;"></i> {{__('home.btn_join_cap_2')}}</span></a>
                        <a href="{{ route('support') }}" class="theme-btn btn-style-three"><span class="btn-title">{{__('home.btn_know_more')}}</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Article Section-->
    <section class="news-section" style="background-color: #edf1f5;">
        <div class="auto-container">
            <div class="title-box clearfix">
                <div class="sec-title">
                    <h2>{{__('home.latest_article_heading')}}</h2>
                </div>
                <div class="link"><a href="{{ route('news.blog') }}" class="theme-btn btn-style-one"><span class="btn-title">{{__('home.btn_all_article_cap')}}</span></a></div>
            </div>

            <div class="row clearfix">
                @forelse ($posts as $post)
                <!--News Block-->
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-delay="0ms">
                        <div class="image-box">
                            <figure class="image"><a href="{{ route('post.details', $post->slug) }}"><img class="lazy-image" src="{{asset('public/storage/post/'.$post->image)}}" alt="{{ $post->title }}"></a></figure>
                        </div>
                        <div class="lower-content">
                            <div class="date">{{ $post->created_at->format('d') }} <span class="month">{{ $post->created_at->format('M') }}</span></div>
                            <h3><a href="{{ route('post.details', $post->slug) }}">{{ Str::limit($post->title, '25') }}</a></h3>
                            <div class="text">{!! Str::limit($post->body, '40', '.....') !!}</div>
                            <div class="post-meta">
                                <ul class="clearfix">
                                    <li><span class="icon fa fa-user"></span>{{ $post->user->name }}</li>
                                    <li><span class="icon fa fa-comments"></span>{{ $post->comments->count() }}</li>
                                    <li><span class="icon fa fa-eye"></span> {{ $post->view_count }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="col-lg-12 col-md-12 pb-4">
                        <div class="card h-100">
                            <div class="p-2 text-center">
                                <h2>{{__('home.article_not_found')}}</h2>
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @endforelse
            </div>

        </div>
    </section>

    <!--Partners Carousel Section-->
    <section class="team-carousel-section no-padding-top">
        <div class="bottom-rotten-curve1" style="position: absolute; left: 0; bottom: 0px; width: 100%; height: 20px; background: url({{ asset('public/assets/images/background/rotten-curve-8.png') }}) center bottom no-repeat; background-size: 100% 100%; z-index: 1;"></div>
        <div class="auto-container">

            <div class="title-box clearfix">
                <div class="sec-title">
                    <h2>{{__('home.h2-partners')}}</h2>
                </div>
            </div>

            <!--Team Carousel-->
            <div class="team-carousel love-carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 30, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 5000, "smartSpeed": 500, "responsive":{ "0" :{ "items": "1" },"600" :{ "items": "1" }, "800" :{ "items" : "2" }, "1024":{ "items" : "3" }, "1366":{ "items" : "3" }}}'>
                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/Blueocean.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/bhel.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/bank-of-baroda.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/sbi.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/dena-bank.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/pata-nahi.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/ressurect-books.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/birla-gold.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/db.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/Jaypee.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/MP.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/hcl.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/idfc.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/IIFM.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/jehanuma.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/primal.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/pugdandi.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/saving-tiger.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/taj-safari.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/the-guardbook.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/the-last-wilderness.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/the-royal-bank-of-sctlnd.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/tiger-films.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/Traffic.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/wildlife-consrv.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/wildlife-trust-india.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/wwf.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="slide-item">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('public/assets/images/partners/adit-jain.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

            </div><!--End Team Carousel-->
        </div>
    </section>
@endsection
