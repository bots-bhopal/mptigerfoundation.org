@extends('layouts.frontend.master')

@section('title','News Detail')

@push('css')
    <style>
        .top-right {
            display: none;
        }

        .top-left {
            float: right !important;
        }
    </style>
@endpush

@section('content')

    @if (session('locale') == 'en')
        <!-- Page Banner Section -->
        <section class="page-banner">
            <div class="image-layer lazy-image" data-bg="url('../../public/assets/images/mptfs-imgs/Latest News - Banner.jpg')"></div>
            <div class="bottom-rotten-curve"></div>

            <div class="auto-container">
                <h1>{{__('news.news_detail_heading')}}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('mptfs.home') }}">{{__('news.home')}}</a></li>
                    <li class="active">{{__('news.news_detail_heading')}}</li>
                </ul>
            </div>

        </section>
        <!--End Banner Section -->

        <!--Sidebar Page Container-->
        <div class="sidebar-page-container">
            <div class="auto-container">
                <div class="row clearfix">

                    <!--Content Side / Blog Sidebar-->
                    <div class="content-side image-column col-lg-12 col-md-12 col-sm-12">
                        <!--Event Details-->
                        <div class="event-details">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img class="lazy-image loaded" src="images/resource/image-spacer-for-validation.png" data-src="{{asset('public/storage/news-english/'. $newses->image)}}" alt=""></figure>
                                    <a href="{{asset('public/storage/news-english/'. $newses->image)}}" class="lightbox-image icon"><span class="fa fa-search"></span></a>
                                </div>
                                <div class="lower-content">
                                    <h2>{{$newses->title}}</h2>
                                    <ul class="info clearfix">
                                        <li><span class="icon far fa-calendar"></span>{{ date('d-m-Y', strtotime($newses->created_at)) }}</li>
                                        <li><span class="icon far fa-clock"></span>{{ date('h:i A', strtotime($newses->created_at)) }}</li>
                                    </ul>
                                    <div class="text-content">
                                        <p>{!! html_entity_decode($newses->discription) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Sidebar Page Container -->
    @endif

    @if (session('locale') == 'hi')
        <!-- Page Banner Section -->
        <section class="page-banner">
            <div class="image-layer lazy-image" data-bg="url('../../public/assets/images/mptfs-imgs/Latest News - Banner.jpg')"></div>
            <div class="bottom-rotten-curve"></div>

            <div class="auto-container">
                <h1>{{__('news.news_detail_heading')}}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('mptfs.home') }}">{{__('news.home')}}</a></li>
                    <li class="active">{{__('news.news_detail_heading')}}</li>
                </ul>
            </div>

        </section>
        <!--End Banner Section -->

        <!--Sidebar Page Container-->
        <div class="sidebar-page-container">
            <div class="auto-container">
                <div class="row clearfix">

                    <!--Content Side / Blog Sidebar-->
                    <div class="content-side image-column col-lg-12 col-md-12 col-sm-12">
                        <!--Event Details-->
                        <div class="event-details">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img class="lazy-image loaded" src="images/resource/image-spacer-for-validation.png" data-src="{{asset('public/storage/news-hindi/'. $newses->image)}}" alt=""></figure>
                                    <a href="{{asset('public/storage/news-hindi/'. $newses->image)}}" class="lightbox-image icon"><span class="fa fa-search"></span></a>
                                </div>
                                <div class="lower-content">
                                    <h2>{{$newses->title}}</h2>
                                    <ul class="info clearfix">
                                        <li><span class="icon far fa-calendar"></span>{{ date('d-m-Y', strtotime($newses->created_at)) }}</li>
                                        <li><span class="icon far fa-clock"></span>{{ date('h:i A', strtotime($newses->created_at)) }}</li>
                                    </ul>
                                    <div class="text-content">
                                        <p>{!! html_entity_decode($newses->discription) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Sidebar Page Container -->
    @endif

@endsection

@push('js')

@endpush
