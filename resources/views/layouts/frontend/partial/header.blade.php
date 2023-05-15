<!-- Preloader -->
<div class="preloader">
    <div class="icon"></div>
</div>

<!-- Floating Social Media Icons -->
<div class="social-icons">
    <a href="https://www.facebook.com/mptigerfoundationsociety" target="_blank" class="facebook"><i
            class="fab fa-facebook-f"></i>Facebook</a>
    <a href="https://www.youtube.com/channel/UCt7TIvdCEW4iUsxUqmSqswA" target="_blank" class="youtube"><i
            class="fab fa-youtube"></i>Youtube</a>
    <a href="https://www.twitter.com/mptfs" target="_blank" class="twitter"><i
            class="fab fa-twitter"></i>Twitter</a>
    <a href="https://www.instagram.com/mptfs.official/" target="_blank" class="instagram"><i
            class="fab fa-instagram"></i>Instagram</a>
</div>

<!-- Main Header -->
<header class="main-header">
    <!-- Header Top -->
    <div class="header-top">
        <div class="auto-container">
            <div class="inner clearfix">
                <div class="top-left">
                    <ul class="social-links clearfix">
                        <li class="social-title">{{ __('navbar.topbar_follow') }}</li>
                        <li><a href="https://www.facebook.com/mptigerfoundationsociety" target="_blank"><span
                                    class="fab fa-facebook-f"></span></a></li>
                        <li><a href="https://www.twitter.com/mptfs" target="_blank"><span
                                    class="fab fa-twitter"></span></a></li>
                        <li><a href="https://www.youtube.com/channel/UCt7TIvdCEW4iUsxUqmSqswA" target="_blank"><span
                                    class="fab fa-youtube"></span></a></li>
                        <li><a href="https://www.instagram.com/mptfs.official/" target="_blank"><span
                                    class="fab fa-instagram"></span></a></li>
                    </ul>
                </div>

                <div class="top-right">
                    <ul class="info clearfix">
                        <li class="nav-item dropdown" style="margin-right: 20px;">
                            <a class="nav-link dropdown-toggle p-0" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if (Session::has('locale'))
                                    @if (session('locale') == 'hi')
                                        {{ 'Choose Language / भाषा चुनें :- हिंदी' }}
                                    @else
                                        {{ 'Choose Language / भाषा चुनें :- English' }}
                                    @endif
                                @else
                                    {{ Config::get('app.locale') }}
                                @endif
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"
                                    href="{{ url('language/en') }}">{{ __('navbar.topbar_english') }}</a>
                                <a class="dropdown-item"
                                    href="{{ url('language/hi') }}">{{ __('navbar.topbar_hindi') }}</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Upper -->
    <div class="header-upper">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <!--Logo-->
                <div class="logo-box">
                    <div class="logo"><a href="{{ url('/') }}">
                            <img src="{{ asset('public/assets/images/logo-main.png') }}" alt="MPTFS-Logo"
                                title="MPTFS-Logo"></a>
                    </div>
                </div>

                <!--Nav Box-->
                <div class="nav-outer clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler"><span class="icon flaticon-menu-1"></span></div>

                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="{{ '/' == request()->path() ? 'current ' : '' }}"><a
                                        href="{{ url('/') }}">{{ __('navbar.menu_home') }}</a> </li>
                                <li class="{{ '/contact' == request()->path() ? 'current ' : '' }} dropdown">
                                    <a>{{ __('navbar.menu_know_more') }}</a>
                                    <ul>
                                        <li><a
                                                href="{{ url('know-more/about_mptfs') }}">{{ __('navbar.menu_about_mptfs') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ url('know-more/organizational_structure') }}">{{ __('navbar.menu_organizational_structure') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ url('know-more/tiger-state-mp') }}">{{ __('navbar.menu_tiger_state') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ url('our-work/tiger-reserve') }}">{{ __('navbar.menu_tiger_reserve_of_mp') }}</a>
                                        </li>
                                        <li class="dropdown"><a>{{ __('navbar.menu_our_works') }}</a>
                                            <ul>
                                                <li><a
                                                        href="{{ url('our-work/training') }}">{{ __('navbar.menu_training_and_research') }}</a>
                                                </li>
                                                <li><a
                                                        href="{{ url('our-work/awareness') }}">{{ __('navbar.menu_awareness_initiatives') }}</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class="dropdown"><a>{{ __('navbar.menu_get_involved') }}</a>
                                    <ul>
                                        <li><a
                                                href="{{ url('get-involved/support') }}">{{ __('navbar.menu_support') }}</a>
                                        </li>
                                        <li><a href="{{ url('i-love-wildlife') }}"
                                                target="_blank">{{ __('navbar.menu_love') }}</a></li>
                                        <li><a href="{{ url('close-to-my-heart') }}"
                                                target="_blank">{{ __('navbar.menu_donate') }}</a></li>
                                        <li><a
                                                href="{{ url('get-involved/our-partners') }}">{{ __('navbar.menu_partners') }}</a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="{{ url('news-corner/blog') }}">{{ __('navbar.menu_our_blog') }}</a>
                                </li>

                                <li class="dropdown"><a>{{ __('navbar.menu_news_corner') }}</a>
                                    <ul>
                                        <li><a
                                                href="{{ url('news-corner/event') }}">{{ __('navbar.menu_latest_events') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ url('news-corner/downloads') }}">{{ __('navbar.menu_downloads') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a>{{ __('navbar.menu_gallery') }}</a>
                                    <ul>
                                        <li><a href="{{ url('home/gallery') }}">{{ __('navbar.menu_photos') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ url('news-corner/downloads') }}">{{ __('navbar.menu_downloads') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="{{ 'home/contact' == request()->path() ? 'current ' : '' }}"><a
                                        href="{{ url('home/contact') }}">{{ __('navbar.menu_contact_us') }}</a>
                                </li>
                                <li><a href="{{ asset('public/mptfs-quiz') }}" target="_blank"
                                        style="color: #ff5831;">{{ __('navbar.menu_quiz_result') }}</a></li>
                                <li><a href="{{ route('login') }}" target="_blank"><i class="fas fa-user"></i></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!-- Main Menu End-->
                </div>
            </div>
        </div>
    </div>
    <!--End Header Upper-->

    <!-- Sticky Header  -->
    <div class="sticky-header">
        <div class="auto-container clearfix">
            <!--Logo-->
            <div class="logo pull-left">
                <a href="#" title=""><img src="{{ asset('public/assets/images/sticky-logo.png') }}" alt="MPTFS-Logo"
                        title=""></a>
            </div>
            <!--Right Col-->
            <div class="pull-right">
                <!-- Main Menu -->
                <nav class="main-menu clearfix">
                    <!--Keep This Empty / Menu will come through Javascript-->
                </nav><!-- Main Menu End-->
            </div>
        </div>
    </div><!-- End Sticky Menu -->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon flaticon-cancel"></span></div>

        <nav class="menu-box">
            <div class="nav-logo"><a href="{{ route('mptfs.home') }}"><img
                        src="{{ asset('public/assets/images/logo.png') }}" alt="MPTFS-Logo" title=""></a></div>
            <div class="menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
            <!--Social Links-->
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="https://www.facebook.com/mptigerfoundationsociety"><span
                                class="fab fa-facebook-square"></span></a></li>
                    <li><a href="https://www.twitter.com/mptfs"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="https://www.youtube.com/channel/UCt7TIvdCEW4iUsxUqmSqswA"><span
                                class="fab fa-youtube"></span></a></li>
                    <li><a href="https://www.instagram.com/mptfs.official/"><span class="fab fa-instagram"></span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div><!-- End Mobile Menu -->
</header>
<!-- End Main Header -->
