@extends('layouts.frontend.master')

@section('title', 'Blog - MPTFS')

@push('css')
@endpush

@section('content')

    @if (session('locale') == 'en')
        <!-- Page Banner Section -->
        <section class="page-banner">
            <div class="image-layer lazy-image" data-bg="url('../public/assets/images/mptfs-imgs/Latest-Events-Banner.jpg')">
            </div>
            <div class="bottom-rotten-curve"></div>

            <div class="auto-container">
                <h1>{{ __('news.event_heading') }}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('mptfs.home') }}">{{ __('news.home') }}</a></li>
                    <li class="active">{{ __('news.event_heading') }}</li>
                </ul>
            </div>

        </section>
        <!--End Banner Section -->

        <!--Sidebar Page Container-->
        <div class="sidebar-page-container">
            <div class="auto-container">
                <div class="row clearfix">

                    <!--Content Side / Blog Sidebar-->
                    <div class="content-side col-lg-12 col-md-12 col-sm-12">
                        <!--Upcoming Events Section-->
                        <div class="auto-container">

                            <div class="sec-title centered">
                                {{-- <div class="sub-title">{{__('news.upcoming_event_title')}}</div> --}}
                                <h2>{{ __('news.our_events_heading') }}</h2>
                            </div>

                            <div class="events-box wow fadeInUp" data-wow-delay="0ms">

                                <!--Event Block-->
                                @forelse ($events as $event)
                                    <div class="event-block-two">
                                        <div class="inner-box">
                                            <div class="row clearfix">
                                                <div class="title-column col-lg-6 col-md-12 col-sm-12">
                                                    <div class="inner">
                                                        <div class="image-box"><a
                                                                href="{{ route('event.detail', $event->slug) }}"><img
                                                                    class="lazy-image"
                                                                    src="{{ asset('public/assets/images/main-slider/devendra (8).jpg') }}"
                                                                    data-src="{{ asset('public/storage/event-image/' . $event->image) }}"
                                                                    alt=""></a></div>
                                                        <div class="title">
                                                            <h3><a
                                                                    href="{{ route('event.detail', $event->slug) }}">{{ Str::limit($event->title, '25') }}</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="info-column col-lg-6 col-md-12 col-sm-12">
                                                    <div class="inner">
                                                        <div class="clearfix">
                                                            <ul class="info clearfix">
                                                                <li><span
                                                                        class="icon far fa-calendar"></span>{{ date('d-m-Y', strtotime($event->date)) }}
                                                                </li>
                                                                <li><span
                                                                        class="icon far fa-clock"></span>{{ date('h:i A', strtotime($event->time)) }}
                                                                </li>
                                                                <li><span
                                                                        class="icon fa fa-map-marker-alt"></span>{{ $event->place }}
                                                                </li>
                                                            </ul>
                                                            <div class="link-box"><a
                                                                    href="{{ route('event.detail', $event->slug) }}"
                                                                    class="theme-btn btn-style-one"><span
                                                                        class="btn-title">{{ __('news.btn_view_event_cap') }}</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-lg-12 col-md-12 pb-4">
                                        <div class="card h-100">
                                            <div class="p-2 text-center">
                                                <h2>{{ __('news.event_not_found') }}</h2>
                                            </div><!-- single-post -->
                                        </div><!-- card -->
                                    </div><!-- col-lg-4 col-md-6 -->
                                @endforelse

                            </div>
                            {{-- <div class="link text-center mt-4"><a href="{{ route('event.blog') }}" class="theme-btn btn-style-one"><span class="btn-title">All Events</span></a></div> --}}

                        </div>

                        <div class="pagination-box">
                            @if ($events->lastPage() > 1)
                                <ul class="styled-pagination text-center">

                                    @if ($events->onFirstPage())
                                        <li><a class="{{ $events->currentPage() == 1 ? 'disabled' : '' }}"><span
                                                    class="fa fa-angle-left"></span></a></li>
                                    @else
                                        <li><a href="{{ $events->previousPageUrl() }}"><span
                                                    class="fa fa-angle-left"></span></a></li>
                                    @endif

                                    @for ($i = 1; $i <= $events->lastPage(); $i++)
                                        <li>
                                            <a class="{{ $events->currentPage() == $i ? ' active' : '' }}"
                                                href="{{ $events->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    @if ($posts->hasMorePages())
                                        <li><a class="{{ $events->currentPage() == $events->lastPage() ? ' disabled' : '' }}"
                                                href="{{ $events->nextPageUrl() }}"><span
                                                    class="fa fa-angle-right"></span></a></li>
                                    @else
                                        <li><a><span class="fa fa-angle-right"></span></a></li>
                                    @endif

                                </ul>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Sidebar Page Container -->
    @endif

    @if (session('locale') == 'hi')
         Page Banner Section 
        <section class="page-banner">
            <div class="image-layer lazy-image"
                data-bg="url('../public/assets/images/mptfs-imgs/Latest-Events-Banner.webp')"></div>
            <div class="bottom-rotten-curve"></div>

            <div class="auto-container">
                <h1>{{ __('news.event_heading') }}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('mptfs.home') }}">{{ __('news.home') }}</a></li>
                    <li class="active">{{ __('news.event_heading') }}</li>
                </ul>
            </div>

        </section>
        End Banner Section 

        Sidebar Page Container
        <div class="sidebar-page-container">
            <div class="auto-container">
                <div class="row clearfix">

                    Content Side / Blog Sidebar
                    <div class="content-side col-lg-12 col-md-12 col-sm-12">
                        Upcoming Events Section
                        <div class="auto-container">

                            <div class="sec-title centered">
                                {{-- <div class="sub-title">{{__('news.upcoming_event_title')}}</div> --}}
                                <h2>{{ __('news.our_events_heading') }}</h2>
                            </div>

                            <div class="events-box wow fadeInUp" data-wow-delay="0ms">

                                Event Block
                                @forelse ($events as $event)
                                    <div class="event-block-two">
                                        <div class="inner-box">
                                            <div class="row clearfix">
                                                <div class="title-column col-lg-6 col-md-12 col-sm-12">
                                                    <div class="inner">
                                                        <div class="image-box"><a
                                                                href="{{ route('event.detail', $event->slug) }}"><img
                                                                    class="lazy-image"
                                                                    src="{{ asset('public/assets/images/main-slider/devendra (8).jpg') }}"
                                                                    data-src="{{ asset('public/storage/event-image/' . $event->image) }}"
                                                                    alt=""></a></div>
                                                        <div class="title">
                                                            <h3><a
                                                                    href="{{ route('event.detail', $event->slug) }}">{{ Str::limit($event->title, '25') }}</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="info-column col-lg-6 col-md-12 col-sm-12">
                                                    <div class="inner">
                                                        <div class="clearfix">
                                                            <ul class="info clearfix">
                                                                <li><span
                                                                        class="icon far fa-calendar"></span>{{ date('d-m-Y', strtotime($event->date)) }}
                                                                </li>
                                                                <li><span
                                                                        class="icon far fa-clock"></span>{{ date('h:i A', strtotime($event->time)) }}
                                                                </li>
                                                                <li><span
                                                                        class="icon fa fa-map-marker-alt"></span>{{ $event->place }}
                                                                </li>
                                                            </ul>
                                                            <div class="link-box"><a
                                                                    href="{{ route('event.detail', $event->slug) }}"
                                                                    class="theme-btn btn-style-one"><span
                                                                        class="btn-title">{{ __('news.btn_view_event_cap') }}</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-lg-12 col-md-12 pb-4">
                                        <div class="card h-100">
                                            <div class="p-2 text-center">
                                                <h2>{{ __('news.event_not_found') }}</h2>
                                            </div><!-- single-post -->
                                        </div><!-- card -->
                                    </div><!-- col-lg-4 col-md-6 -->
                                @endforelse

                            </div>
                            {{-- <div class="link text-center mt-4"><a href="{{ route('event.blog') }}" class="theme-btn btn-style-one"><span class="btn-title">All Events</span></a></div> --}}

                        </div>

                        <div class="pagination-box">
                            @if ($events->lastPage() > 1)
                                <ul class="styled-pagination text-center">

                                    @if ($events->onFirstPage())
                                        <li><a class="{{ $events->currentPage() == 1 ? 'disabled' : '' }}"><span
                                                    class="fa fa-angle-left"></span></a></li>
                                    @else
                                        <li><a href="{{ $events->previousPageUrl() }}"><span
                                                    class="fa fa-angle-left"></span></a></li>
                                    @endif

                                    @for ($i = 1; $i <= $events->lastPage(); $i++)
                                        <li>
                                            <a class="{{ $events->currentPage() == $i ? ' active' : '' }}"
                                                href="{{ $events->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    @if ($posts->hasMorePages())
                                        <li><a class="{{ $events->currentPage() == $events->lastPage() ? ' disabled' : '' }}"
                                                href="{{ $events->nextPageUrl() }}"><span
                                                    class="fa fa-angle-right"></span></a></li>
                                    @else
                                        <li><a><span class="fa fa-angle-right"></span></a></li>
                                    @endif

                                </ul>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Sidebar Page Container -->
    @endif

@endsection
