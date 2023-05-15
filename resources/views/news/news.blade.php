@extends('layouts.frontend.master')

@section('title', 'News - MPTFS')

@push('css')

@endpush

@section('content')

    @if (session('locale') == 'en')
        <!-- Page Banner Section -->
        <section class="page-banner">
            <div class="image-layer lazy-image" data-bg="url('../public/assets/images/mptfs-imgs/Latest News - Banner.jpg')"></div>
            <div class="bottom-rotten-curve"></div>

            <div class="auto-container">
                <h1>{{__('news.news_heading')}}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('mptfs.home') }}">{{__('news.home')}}</a></li>
                    <li class="active">{{__('news.news_heading')}}</li>
                </ul>
            </div>
        </section>
        <!--End Banner Section -->

        <!--Sidebar Page Container-->
        <section class="news-section">
            <div class="top-rotten-curve"></div>
            <div class="auto-container">

                <!--Content Side / Blog Sidebar-->
                <div class="content-side col-lg-12 col-md-12 col-sm-12">
                    <div class="sec-title centered">
                        <h2>{{__('news.side_latest')}}</h2>
                    </div>

                    <div class="row clearfix">
                        @forelse ($newses as $news)
                            <!--News Block-->
                            <div class="news-block col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box wow fadeInUp" data-wow-delay="0ms">
                                    <div class="image-box">
                                        <figure class="image"><img class="lazy-image" src="{{asset('public/storage/news-english/'.$news->image)}}" alt="{{ $news->title }}"></figure>
                                    </div>
                                    <div class="lower-content">
                                        <h3><a href="{{ route('news.detail', $news->slug) }}">{{ Str::limit($news->title, '25') }}</a></h3>
                                        <div class="text">{!! Str::limit($news->discription, '80') !!}</div>
                                        <div class="link text-center"><a href="{{ route('news.detail', $news->slug) }}" class="theme-btn btn-style-one"><span class="btn-title">{{__('home.about_btn_cap')}}</span></a></div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-lg-12 col-md-12 pb-4">
                                <div class="card h-100">
                                    <div class="p-2 text-center">
                                        <h2>{{__('news.news_not_found')}}</h2>
                                    </div><!-- single-post -->
                                </div><!-- card -->
                            </div><!-- col-lg-4 col-md-6 -->
                        @endforelse
                    </div>

                    <div class="pagination-box">
                        @if ($newses->lastPage() > 1)
                            <ul class="styled-pagination text-center">

                                @if ($events->onFirstPage())
                                    <li><a class="{{ ($newses->currentPage() == 1) ? 'disabled' : '' }}"><span class="fa fa-angle-left"></span></a></li>
                                @else
                                    <li><a href="{{$newses->previousPageUrl()}}"><span class="fa fa-angle-left"></span></a></li>
                                @endif

                                @for ($i = 1; $i <= $newses->lastPage(); $i++)
                                    <li>
                                        <a class="{{ ($newses->currentPage() == $i) ? ' active' : '' }}" href="{{ $newses->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($posts->hasMorePages())
                                    <li><a class="{{ ($newses->currentPage() == $newses->lastPage()) ? ' disabled' : '' }}" href="{{$newses->nextPageUrl()}}"><span class="fa fa-angle-right"></span></a></li>
                                @else
                                    <li><a><span class="fa fa-angle-right"></span></a></li>
                                @endif

                            </ul>
                        @endif
                    </div>
                </div>

            </div>
        </section>
        <!-- End Sidebar Page Container -->
    @endif


    @if (session('locale') == 'hi')
        <!-- Page Banner Section -->
        <section class="page-banner">
            <div class="image-layer lazy-image" data-bg="url('../public/assets/images/mptfs-imgs/Latest News - Banner.jpg')"></div>
            <div class="bottom-rotten-curve"></div>

            <div class="auto-container">
                <h1>{{__('news.news_heading')}}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('mptfs.home') }}">{{__('news.home')}}</a></li>
                    <li class="active">{{__('news.news_heading')}}</li>
                </ul>
            </div>
        </section>
        <!--End Banner Section -->

        <!--Sidebar Page Container-->
        <section class="news-section">
            <div class="top-rotten-curve"></div>
            <div class="auto-container">

                <!--Content Side / Blog Sidebar-->
                <div class="content-side col-lg-12 col-md-12 col-sm-12">
                    <div class="sec-title centered">
                        <h2>{{__('news.side_latest')}}</h2>
                    </div>

                    <div class="row clearfix">
                        @forelse ($newses as $news)
                            <!--News Block-->
                            <div class="news-block col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box wow fadeInUp" data-wow-delay="0ms">
                                    <div class="image-box">
                                        <figure class="image"><img class="lazy-image" src="{{asset('public/storage/news-hindi/'.$news->image)}}" alt="{{ $news->title }}"></figure>
                                    </div>
                                    <div class="lower-content">
                                        <h3><a href="{{ route('news.detail', $news->slug) }}">{{ Str::limit($news->title, '25') }}</a></h3>
                                        <div class="text">{!! Str::limit($news->discription, '80') !!}</div>
                                        <div class="link text-center"><a href="{{ route('news.detail', $news->slug) }}" class="theme-btn btn-style-one"><span class="btn-title">{{__('home.about_btn_cap')}}</span></a></div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-lg-12 col-md-12 pb-4">
                                <div class="card h-100">
                                    <div class="p-2 text-center">
                                        <h2>{{__('news.news_not_found')}}</h2>
                                    </div><!-- single-post -->
                                </div><!-- card -->
                            </div><!-- col-lg-4 col-md-6 -->
                        @endforelse
                    </div>

                    <div class="pagination-box">
                        @if ($newses->lastPage() > 1)
                            <ul class="styled-pagination text-center">

                                @if ($events->onFirstPage())
                                    <li><a class="{{ ($newses->currentPage() == 1) ? 'disabled' : '' }}"><span class="fa fa-angle-left"></span></a></li>
                                @else
                                    <li><a href="{{$newses->previousPageUrl()}}"><span class="fa fa-angle-left"></span></a></li>
                                @endif

                                @for ($i = 1; $i <= $newses->lastPage(); $i++)
                                    <li>
                                        <a class="{{ ($newses->currentPage() == $i) ? ' active' : '' }}" href="{{ $newses->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($posts->hasMorePages())
                                    <li><a class="{{ ($newses->currentPage() == $newses->lastPage()) ? ' disabled' : '' }}" href="{{$newses->nextPageUrl()}}"><span class="fa fa-angle-right"></span></a></li>
                                @else
                                    <li><a><span class="fa fa-angle-right"></span></a></li>
                                @endif

                            </ul>
                        @endif
                    </div>
                </div>

            </div>
        </section>
        <!-- End Sidebar Page Container -->
    @endif

@endsection
