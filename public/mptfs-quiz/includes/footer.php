<!-- Call To Action Section -->
<section class="call-to-action-two">
    <div class="auto-container">
        <div class="inner clearfix">
            <div class="title-box wow fadeInLeft" data-wow-delay="0ms">
                <h2 style="color: #1e2436;">Become A Volunteer</h2>
            </div>
            <div class="link-box wow fadeInRight" data-wow-delay="0ms"><a href="https://forms.gle/zK8iaNKh91P3uqQZ8" target="_blank" class="theme-btn btn-style-five"><span class="btn-title">Fill Form</span></a></div>
        </div>
    </div>
</section>
<!--End Gallery Section -->

<!-- Main Footer -->
<div class="footer-curve" style="background: #ff9933; width:100%; display:flex; justify-content:center;">
    <img src="../../public/assets/images/bottom.png" alt="">
</div>

<footer class="main-footer">

    <div class="auto-container">
        <!--Widgets Section-->
        <div class="widgets-section">
            <div class="row clearfix">

                <!--Column-->
                <div class="column col-lg-4 col-md-6 col-sm-12">
                    <div class="footer-widget logo-widget">
                        <div class="widget-content">
                            <div class="footer-logo">
                                <a href="#"><img class="lazy-image" data-src="../../public/assets/images/side-logo.png" alt="" width="48" height="48" /></a>
                            </div>
                            <div class="text text-justify">
                            This is the offical website of MPTFS. It was formed by Madhya Pradesh State Government on 15th January 1997. The idea was to facilitate achieving the goal of wildlife conservation (with special emphasis on tiger) by ensuring participation from public and all other organizations committed for conservation.
                            </div>
                            <ul class="social-links clearfix">
                                <li><a href="https://www.facebook.com/mptigerfoundationsociety" target="_blank"><span class="fab fa-facebook-f"></span></a></li>
                                <li><a href="https://www.twitter.com/mptfs" target="_blank"><span class="fab fa-twitter"></span></a></li>
                                <li><a href="https://www.youtube.com/channel/UCt7TIvdCEW4iUsxUqmSqswA" target="_blank"><span class="fab fa-youtube"></span></a></li>
                                <li><a href="https://www.instagram.com/mptfs.official/" target="_blank"><span class="fab fa-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--Column-->
                <div class="column col-lg-4 col-md-6 col-sm-12">
                    <div class="footer-widget links-widget">
                        <div class="widget-content">
                            <h3>Quick Links</h3>
                            <ul>
                                <li><a href="/mptfs.org">Home</a></li>
                                <li><a href="../../know-more/about_mptfs">About</a></li>
                                <li><a href="../../news-corner/blog">Blog</a></li>
                                <li><a href="../../home/gallery">Gallery</a></li>
                                <li><a href="../../home/contact">Contact</a></li>
                                <li><a href="../../news-corner/downloads">Downloads</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--Column-->
                <div class="column col-lg-4 col-md-6 col-sm-12">
                    <div class="footer-widget info-widget">
                        <div class="widget-content">
                            <h3>Contacts</h3>
                            <ul class="contact-info">
                                <li>O/o Chief Wildlife Warden, Third Floor, Pragati Bhawan, Indira Press Complex, MP Nagar, Bhopal-462011, M.P.</li>
                                <li><a style="cursor: default">O/o PCCF Wildlife : 0755 2674318</a></li>
                                <li><a href="mailto:mptigerfoundation@mp.gov.in">mptigerfoundation@mp.gov.in</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--Column-->
                <!-- @if (session('locale') == 'en')
                <div class="column col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget news-widget">
                        <div class="widget-content">
                            <h3>{{ __('footer.latest_news') }}</h3>
                            @foreach ($newsesen as $news)
                            News Post
                            <div class="news-post">
                                <div class="post-thumb"><a href="{{ route('news.news') }}"><img class="lazy-image" src="../../public/assets/images/resource/post-thumb-2.jpg" data-src="../../public/storage/news-english/'.$news->image)}}" alt=""></a></div>
                                <h5><a href="{{ route('news.news') }}">{{ Str::limit($news->title, '25') }}</a></h5>
                                <div class="date">{{ date('F d, Y', strtotime($news->created_at)) }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif -->

                <!-- @if (session('locale') == 'hi')
                <div class="column col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget news-widget">
                        <div class="widget-content">
                            <h3>{{ __('footer.latest_news') }}</h3>
                            @foreach ($newseshi as $news)
                            News Post
                            <div class="news-post">
                                <div class="post-thumb"><a href="{{ route('news.news') }}"><img class="lazy-image" src="{{asset('public/assets/images/resource/post-thumb-2.jpg')}}" data-src="{{asset('public/storage/news-hindi/'.$news->image)}}" alt=""></a></div>
                                <h5><a href="{{ route('news.news') }}">{{ Str::limit($news->title, '25') }}</a></h5>
                                <div class="date">{{ date('F d, Y', strtotime($news->created_at)) }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif -->

            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="auto-container">

            <!--Scroll to top-->
            <div class="clearfix text-center">
                <p class="footer-font">
                    <a href="/mptfs.org" class="text-white"><strong>MP TIGER FOUNDATION SOCIETY (MPTFS)</strong></a>
                    &copy; All Right Reserved<br>
                    Developed by - <a href="https://blueoceantech.in/" class="text-white" target="_blank">Blue Ocean Tech Solutions Pvt. Ltd.</a>
                </p>
            </div>
        </div>
    </div>

</footer>

</div>
<!-- End Page Wrapper -->

<!--Scroll to Top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-up-arrow"></span></div>

<script src="../../public/assets/js/jquery.js"></script>
<script src="../../public/assets/js/popper.min.js"></script>
<script src="../../public/assets/js/bootstrap.min.js"></script>
<script src="../../public/assets/js/jquery-ui.js"></script>
<script src="../../public/assets/js/jquery.fancybox.js"></script>
<script src="../../public/assets/js/owl.js"></script>
<script src="../../public/assets/js/appear.js"></script>
<script src="../../public/assets/js/wow.js"></script>
<script src="../../public/assets/js/lazyload.js"></script>
<script src="../../public/assets/js/scrollbar.js"></script>
<script src="../../public/assets/js/script.js"></script>

</body>

</html>
