@extends('layouts.frontend.master')

@section('title', 'Awareness Initiative - MPTFS')

@push('css')
@endpush

@section('content')
    <!-- Page Banner Section -->
    <section class="page-banner">
        <div class="image-layer lazy-image"
            data-bg="url('../public/assets/images/mptfs-imgs/Awareness-Initiatives-Banner.jpg')"></div>
        <div class="bottom-rotten-curve"></div>

        <div class="auto-container">
            <h1>{{ __('work.aware_heading') }}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('mptfs.home') }}">{{ __('work.home') }}</a></li>
                <li class="active">{{ __('work.aware_heading') }}</li>
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
                    <h2>{{ __('work.aware_heading') }}</h2>
                </div>

                <div class="row clearfix">
                    @forelse ($awareness as $aware)
                        <!--News Block-->
                        <div class="news-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box wow fadeInUp" data-wow-delay="0ms">
                                <div class="image-box">
                                    <figure class="image"><img class="lazy-image"
                                            src="{{ asset('public/storage/awareness-image/' . $aware->image) }}"
                                            alt="{{ $aware->title }}"></figure>
                                </div>
                                <div class="lower-content">
                                    <h3><a
                                            href="{{ route('awareness.detail', $aware->slug) }}">{{ Str::limit($aware->title, '25') }}</a>
                                    </h3>
                                    <div class="text">{!! Str::limit($aware->discription, '100') !!}</div>
                                    <div class="link text-left">
                                        <a href="{{ route('awareness.detail', $aware->slug) }}"
                                            class="theme-btn btn-style-one"><span
                                                class="btn-title">{{ __('home.about_btn_cap') }}</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-12 col-md-12 pb-4">
                            <div class="card h-100">
                                <div class="p-2 text-center">
                                    <h2>{{ __('work.aware_not_found') }}</h2>
                                </div><!-- single-post -->
                            </div><!-- card -->
                        </div><!-- col-lg-4 col-md-6 -->
                    @endforelse
                </div>

                <div class="pagination-box">
                    @if ($awareness->lastPage() > 1)
                        <ul class="styled-pagination text-center">

                            @if ($awareness->onFirstPage())
                                <li><a class="{{ $awareness->currentPage() == 1 ? 'disabled' : '' }}"><span
                                            class="fa fa-angle-left"></span></a></li>
                            @else
                                <li><a href="{{ $awareness->previousPageUrl() }}"><span
                                            class="fa fa-angle-left"></span></a></li>
                            @endif

                            @for ($i = 1; $i <= $awareness->lastPage(); $i++)
                                <li>
                                    <a class="{{ $awareness->currentPage() == $i ? ' active' : '' }}"
                                        href="{{ $awareness->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if ($posts->hasMorePages())
                                <li><a class="{{ $awareness->currentPage() == $awareness->lastPage() ? ' disabled' : '' }}"
                                        href="{{ $awareness->nextPageUrl() }}"><span
                                            class="fa fa-angle-right"></span></a>
                                </li>
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
@endsection
