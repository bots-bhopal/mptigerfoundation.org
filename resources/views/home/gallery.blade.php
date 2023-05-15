@extends('layouts.frontend.master')

@section('title', 'Gallery - MPTFS')

@push('css')
    <style>
        .news-section {
            padding: 120px 0px 120px;
        }

        .news-block .image-box {
            height: 250px;
        }

        .news-block .image-box img {
            height: 250px;
        }

    </style>
@endpush

@section('content')

    @if (session('locale') == 'en')
        <!-- Page Banner Section -->
        <section class="page-banner">
            <div class="image-layer lazy-image" data-bg="url('../public/assets/images/mptfs-imgs/Other-PA(s).jpg')"></div>
            <div class="bottom-rotten-curve"></div>

            <div class="auto-container">
                <h1>{{ __('home.gallery_page_heading') }}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('mptfs.home') }}">{{ __('home.home') }}</a></li>
                    <li class="active">{{ __('home.gallery_page_heading') }}</li>
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
                        <h2>{{ __('home.gallery_heading') }}</h2>
                    </div>

                    <div class="row clearfix">
                        @forelse ($photos as $photo)
                            <!--News Block-->
                            <div class="news-block col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box wow fadeInUp" data-wow-delay="0ms">
                                    <div class="overlay-box">
                                        <div class="image-box">
                                            <figure class="image"><a
                                                    href="{{ asset('public/storage/gallery/' . $photo->filename) }}"
                                                    class="lightbox-image" data-fancybox="products"><img
                                                        class="lazy-image"
                                                        src="{{ asset('public/storage/gallery/' . $photo->filename) }}"
                                                        alt="{{ $photo->original_filename }}"></a></figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-lg-12 col-md-12 pb-4">
                                <div class="card h-100">
                                    <div class="p-2 text-center">
                                        <h2>{{ __('home.gallery_not_found') }}</h2>
                                    </div><!-- single-post -->
                                </div><!-- card -->
                            </div><!-- col-lg-4 col-md-6 -->
                        @endforelse
                    </div>

                    <!-- Pagination Section Start Here -->
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="d-flex justify-content-center">
                                {!! $photos->links() !!}
                            </div>
                        </div>
                    </div>
                    <!-- Pagination Section End Here -->
                </div>

            </div>
        </section>
        <!-- End Sidebar Page Container -->
    @endif


    @if (session('locale') == 'hi')
        <!-- Page Banner Section -->
        <section class="page-banner">
            <div class="image-layer lazy-image" data-bg="url('../public/assets/images/mptfs-imgs/Other-PA(s).webp')"></div>
            <div class="bottom-rotten-curve"></div>

            <div class="auto-container">
                <h1>गैलरी</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('mptfs.home') }}">होम</a></li>
                    <li class="active">गैलरी</li>
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
                        <h2>गैलरी</h2>
                    </div>

                    <div class="row clearfix">
                        @forelse ($photos as $photo)
                            <!--News Block-->
                            <div class="news-block col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box wow fadeInUp" data-wow-delay="0ms">
                                    <div class="overlay-box">
                                        <div class="image-box">
                                            <figure class="image"><a
                                                    href="{{ asset('public/storage/gallery/' . $photo->filename) }}"
                                                    class="lightbox-image" data-fancybox="products"><img
                                                        class="lazy-image"
                                                        src="{{ asset('public/storage/gallery/' . $photo->filename) }}"
                                                        alt="{{ $photo->original_filename }}"></a></figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-lg-12 col-md-12 pb-4">
                                <div class="card h-100">
                                    <div class="p-2 text-center">
                                        <h2>कोई गैलरी नहीं मिली !!</h2>
                                    </div><!-- single-post -->
                                </div><!-- card -->
                            </div><!-- col-lg-4 col-md-6 -->
                        @endforelse
                    </div>

                    <!-- Pagination Section Start Here -->
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="d-flex justify-content-center">
                                {!! $photos->links() !!}
                            </div>
                        </div>
                    </div>
                    <!-- Pagination Section End Here -->
                </div>

            </div>
        </section>
        <!-- End Sidebar Page Container -->
    @endif

@endsection
