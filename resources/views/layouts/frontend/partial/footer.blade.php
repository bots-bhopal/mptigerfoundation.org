<style>
    .main-footer .news-widget .news-post {
        padding-left: 120px !important;
    }

    .news-post .post-thumb img {
        background-color: rgba(30, 36, 54, 1);
        aspect-ratio: var(--ratio);
        object-fit: contain;
        width: 100%;
        height: 100%;
    }

</style>

<!-- Call To Action Section -->
<section class="call-to-action-two">
    <div class="auto-container">
        <div class="inner clearfix">
            <div class="title-box wow fadeInLeft" data-wow-delay="0ms">
                <h2 style="color: #1e2436;">{{ __('footer.become_volunteer_heading') }}</h2>
            </div>
            <div class="link-box wow fadeInRight" data-wow-delay="0ms"><a href="https://forms.gle/zK8iaNKh91P3uqQZ8"
                    target="_blank" class="theme-btn btn-style-five"><span
                        class="btn-title">{{ __('footer.btn_get_involved_cap') }}</span></a></div>
        </div>
    </div>
</section>
<!--End Gallery Section -->

<!-- Main Footer -->
<div class="footer-curve" style="background: #ff9933; width:100%; display:flex; justify-content:center;">
    <img src="{{ asset('public/assets/images/bottom.png') }}" alt="">
</div>

<footer class="main-footer">

    <div class="auto-container">
        <!--Widgets Section-->
        <div class="widgets-section">
            <div class="row clearfix">

                <!--Column-->
                <div class="column col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget logo-widget">
                        <div class="widget-content">
                            <div class="footer-logo">
                                <a href="#"><img class="lazy-image"
                                        src="{{ asset('public/assets/images/side-logo.png') }}"
                                        data-src="{{ asset('public/assets/images/side-logo.png') }}" alt="" width="48"
                                        height="48" /></a>
                            </div>
                            <div class="text text-justify">{{ __('footer.about_para') }}</div>
                            <ul class="social-links clearfix">
                                <li><a href="https://www.facebook.com/mptigerfoundationsociety" target="_blank"><span
                                            class="fab fa-facebook-f"></span></a></li>
                                <li><a href="https://www.twitter.com/mptfs" target="_blank"><span
                                            class="fab fa-twitter"></span></a></li>
                                <li><a href="https://www.youtube.com/channel/UCt7TIvdCEW4iUsxUqmSqswA"
                                        target="_blank"><span class="fab fa-youtube"></span></a></li>
                                <li><a href="https://www.instagram.com/mptfs.official/" target="_blank"><span
                                            class="fab fa-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--Column-->
                <div class="column col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget links-widget">
                        <div class="widget-content">
                            <h3>{{ __('footer.quick_links_heading') }}</h3>
                            <ul>
                                <li><a href="{{ route('mptfs.home') }}">{{ __('footer.home') }}</a></li>
                                <li><a href="{{ route('mptfs.about') }}">{{ __('footer.about') }}</a></li>
                                <li><a href="{{ route('news.blog') }}">{{ __('footer.blog') }}</a></li>
                                <li><a href="{{ route('home.gallery') }}">{{ __('footer.gallery') }}</a></li>
                                <li><a href="{{ route('home.contact') }}">{{ __('footer.contact') }}</a></li>
                                <li><a href="{{ route('news.downloads') }}">{{ __('footer.download') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--Column-->
                <div class="column col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget info-widget">
                        <div class="widget-content">
                            <h3>{{ __('footer.contact_heading') }}</h3>
                            <ul class="contact-info">
                                <li>{{ __('footer.contact_li_1') }}</li>
                                <li><a style="cursor: default">{{ __('footer.contact_li_2') }}</a></li>
                                <li><a href="mailto:mptigerfoundation@mp.gov.in">{{ __('footer.contact_li_3') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--Column-->
                <div class="column col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget news-widget">
                        <div class="widget-content">
                            <h3>{{ __('footer.blog') }}</h3>
                            @foreach ($posts as $post)
                                <!--News Post-->
                                <div class="news-post">
                                    <div class="post-thumb"><a href="{{ route('news.blog') }}"><img
                                                class="lazy-image"
                                                data-src="{{ asset('public/storage/post/' . $post->image) }}"
                                                alt=""></a>
                                    </div>
                                    <h5><a
                                            href="{{ route('news.blog') }}">{{ Str::limit($post->title, '25') }}</a>
                                    </h5>
                                    <div class="date">{{ date('F d, Y', strtotime($post->created_at)) }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="auto-container">

            <!--Scroll to top-->
            <div class="clearfix text-center">
                <p class="footer-font">
                    <a href="{{ url('/') }}"
                        class="text-white"><strong>{{ __('footer.mptfs') }}</strong></a>
                    &copy; {{ __('footer.rights') }}<br>
                    {{ __('footer.developed_by') }} <a href="https://blueoceantech.in/" class="text-white"
                        target="_blank">{{ __('footer.bot') }}</a>
                </p>
            </div>
        </div>
    </div>

</footer>
