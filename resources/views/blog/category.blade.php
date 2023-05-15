@extends('layouts.frontend.master')

@section('title', 'Category - MPTFS')

@push('css')
@endpush

@section('content')

    <!-- Page Banner Section -->
    <section class="page-banner">
        <div class="image-layer lazy-image" data-bg="url('../../public/assets/images/mptfs-imgs/Blog-Banner.jpg')"></div>
        <div class="bottom-rotten-curve"></div>

        <div class="auto-container">
            <h1>{{ __('news.category_heading') }}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('mptfs.home') }}">{{ __('news.home') }}</a></li>
                <li class="active">{{ __('news.category_heading') }}</li>
            </ul>
        </div>

    </section>
    <!--End Banner Section -->

    <div class="content-side col-lg-12 col-md-12 col-sm-12 pt-5">
        <h1 class="text-center"><b>{{ $categories->name }}</b></h1>
    </div>

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container" style="padding: 40px 0 80px;">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Content Side / Blog Sidebar-->
                <div class="content-side col-lg-12 col-md-12 col-sm-12">
                    <!--Blog Posts-->
                    <div class="blog-posts">
                        <div class="row clearfix">

                            @forelse ($posts as $post)
                                <!--News Block-->
                                <div class="news-block col-lg-4 col-md-12 col-sm-12">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><a
                                                    href="{{ route('post.details', $post->slug) }}"><img
                                                        class="lazy-image"
                                                        src="{{ asset('public/storage/post/' . $post->image) }}"
                                                        alt="{{ $post->title }}"></a></figure>
                                        </div>
                                        <div class="lower-content">
                                            <div class="date">{{ $post->created_at->format('d') }} <span
                                                    class="month">{{ $post->created_at->format('M') }}</span>
                                            </div>
                                            <h3><a
                                                    href="{{ route('post.details', $post->slug) }}">{{ Str::limit($post->title, '25') }}</a>
                                            </h3>
                                            <div class="text">{!! Str::limit($post->body, '40') !!}</div>
                                            <div class="post-meta">
                                                <ul class="clearfix">
                                                    <li><span class="icon fa fa-user"></span>{{ $post->user->name }}</li>
                                                    <li><span class="icon fa fa-comments"></span>
                                                        {{ $post->comments->count() }}</li>
                                                    <li><span class="icon fa fa-eye"></span> {{ $post->view_count }}</li>
                                                    {{-- <li><span class="icon fa fa-share-alt"></span></li> --}}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><a href="{{ route('post.details', $post->slug) }}"><img class="lazy-image" src="{{asset('public/storage/post/'.$post->image)}}" alt="{{ $post->title }}"></a></figure>
                                        </div>
                                        <div class="lower-content">
                                            <div class="date">{{ $post->created_at->format('d') }} <span class="month">{{ $post->created_at->format('M') }}</span></div>
                                            <h3><a href="{{ route('post.details', $post->slug) }}">{{ Str::limit($post->title, '25') }}</a></h3>
                                            <div class="text">{!! Str::limit($post->body, '80') !!}</div>
                                            <div class="post-meta">
                                                <ul class="clearfix">
                                                    <li><a href="#"><span class="icon fa fa-user"></span>{{ $post->user->name }}</a></li>
                                                    <li><a href="#"><span class="icon fa fa-comments"></span> {{ $post->comments->count() }} </a></li>
                                                    <li><a href="#"><span class="icon fa fa-eye"></span> {{ $post->view_count }} </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            @empty
                                <div class="col-lg-12 col-md-12 pb-4">
                                    <div class="card h-100">
                                        <div class="p-2 text-center">
                                            <h2>{{ __('news.post_not_found') }}</h2>
                                        </div><!-- single-post -->
                                    </div><!-- card -->
                                </div><!-- col-lg-4 col-md-6 -->
                            @endforelse
                        </div>
                    </div>

                    <div class="pagination-box">
                        @if ($posts->lastPage() > 1)
                            <ul class="styled-pagination text-center">

                                @if ($posts->onFirstPage())
                                    <li><a class="{{ $posts->currentPage() == 1 ? 'disabled' : '' }}"><span
                                                class="fa fa-angle-left"></span></a></li>
                                @else
                                    <li><a href="{{ $posts->previousPageUrl() }}"><span
                                                class="fa fa-angle-left"></span></a></li>
                                @endif

                                @for ($i = 1; $i <= $posts->lastPage(); $i++)
                                    <li>
                                        <a class="{{ $posts->currentPage() == $i ? ' active' : '' }}"
                                            href="{{ $posts->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($posts->hasMorePages())
                                    <li><a class="{{ $posts->currentPage() == $posts->lastPage() ? ' disabled' : '' }}"
                                            href="{{ $posts->nextPageUrl() }}"><span
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
        </div>
    </div>
    <!-- End Sidebar Page Container -->

@endsection
