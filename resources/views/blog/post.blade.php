@extends('layouts.frontend.master')

@section('title')
    {{ $post->title }}
@endsection

@push('css')
    <style>
        .top-right {
            display: none;
        }

        .top-left {
            float: right !important;
        }

        .news-post .post-thumb img {
            background-color: #f0f0f0;
            /* To visualize empty space */
            aspect-ratio: var(--ratio);
            object-fit: contain;
            width: 100%;
            height: 100%;
        }

    </style>
@endpush

@section('content')
    <!-- Page Banner Section -->
    <section class="page-banner">
        <div class="image-layer lazy-image" data-bg="url('../../public/assets/images/mptfs-imgs/Blog-Banner.jpg')">
        </div>
        <div class="bottom-rotten-curve"></div>

        <div class="auto-container">
            <h1>{{ __('news.blog_detail_heading') }}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('mptfs.home') }}">{{ __('news.home') }}</a></li>
                <li class="active">{{ __('news.blog_detail_heading') }}</li>
            </ul>
        </div>
    </section>
    <!--End Banner Section -->

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side / Blog Sidebar-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12 offset-lg-2">

                    <!--Blog Posts-->
                    <div class="blog-post-detail">
                        <div class="inner">
                            <div class="post-meta">
                                <ul class="clearfix">
                                    <li><span class="icon fa fa-user"></span> {{ $post->user->name }}</li>
                                    <li><span class="fa fa-calendar-alt"></span> on
                                        {{ $post->created_at->diffForHumans() }}</li>
                                    <li><span class="icon fa fa-comments"></span> {{ $post->comments->count() }}</li>
                                    <li><span class="icon fa fa-eye"></span> {{ $post->view_count }}</li>
                                </ul>
                            </div>
                            <h2>{{ $post->title }}</h2>

                            <div class="content text-justify">
                                <div class="image-box">
                                    <figure class="image"><img class="lazy-image"
                                            data-src="{{ asset('public/storage/post/' . $post->image) }}" alt="">
                                    </figure>
                                </div>
                                <p>{!! html_entity_decode($post->body) !!}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Related Images -->
                    <section class="related-products" style="padding-bottom: 0px;">
                        <div class="auto-container">
                            <div class="sec-title">
                                <h2>{{ __('news.related_imgs_heading') }}</h2>
                            </div>

                            <div class="related-products-carousel love-carousel owl-theme owl-carousel"
                                data-options='{"loop": false, "margin": 30, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 5000, "smartSpeed": 500, "responsive":{ "0" :{ "items": "1" },"600" :{ "items": "1" }, "800" :{ "items" : "2" }, "1024":{ "items" : "2" }, "1366":{ "items" : "2" }}}'>
                                <!--Shop Item-->
                                @if ($post)
                                    @foreach ($post->images as $image)
                                        <div class="shop-item">
                                            <div class="inner-box">
                                                <div class="image">
                                                    <img class="lazy-image owl-lazy"
                                                        src="{{ asset('public/storage/post-images/' . $image->image) }}"
                                                        data-src="{{ asset('public/storage/post-images/' . $image->image) }}"
                                                        alt="" />
                                                    <div class="overlay-box">
                                                        <ul class="option-box">
                                                            <li><a href="{{ asset('public/storage/post-images/' . $image->image) }}"
                                                                    class="lightbox-image"
                                                                    data-fancybox="products"><span
                                                                        class="fa fa-search"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </section>
                    <!--End Related Images -->

                    <!-- Comments Area -->
                    {{-- <div class="comments-area">
                        <div class="group-title">
                            <h3>{{ __('news.comments') }} ( {{ $post->comments()->count() }} ) </h3>
                        </div>
                        @if ($post->comments->count() > 0)
                            @foreach ($post->comments as $comment)
                                <div class="comment-box">
                                    <div class="comment">
                                        <div class="author-thumb"><img class="lazy-image"
                                                data-src="{{ asset('public/storage/profile/' . $comment->user->image) }}"
                                                alt=""></div>
                                        <div class="comment-info">
                                            <h4 class="name">{{ $comment->user->name }}</h4>
                                            <div class="time">on
                                                {{ $comment->created_at->diffForHumans() }}</div>
                                        </div>
                                        <div class="text">{{ $comment->comment }}</div>
                                        <a href="#" class="reply-btn"><span class="arrow_back"></span>
                                            {{ __('news.btn_reply') }}</a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>{{ __('news.comment_not_found') }}</p>
                        @endif
                    </div> --}}

                    <!--Comment Form-->
                    {{-- <div class="comment-form default-form">
                        <div class="group-title">
                            <h4>{{ __('news.leave_comment') }}</h4>
                        </div>

                        @guest
                            <p>{{ __('news.msg') }} <a href="{{ route('login') }}" target="_blank"
                                    style="color: #f42a2a;">{{ __('news.btn_login') }}</a></p>
                        @else
                            <form method="POST" action="{{ route('comment.store', $post->id) }}">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-md-12 col-sm-12 form-group">
                                        <textarea name="comment" placeholder="Your Comments *"
                                            class="form-control {{ $errors->any() && $errors->first('tname') ? 'is-invalid' : '' }}"></textarea>
                                        @if ($errors->any())
                                            <p class="text-danger">{{ $errors->first('comment') }}</p>
                                        @endif
                                    </div>

                                    <div class="col-md-12 col-sm-12 form-group">
                                        <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span
                                                class="btn-title">{{ __('news.btn_post_comment') }}</span></button>
                                    </div>
                                </div>
                            </form>
                        @endguest

                    </div> --}}

                </div>
            </div>
        </div>
    </div>
    <!-- End Sidebar Page Container -->
@endsection
