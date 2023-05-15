@extends('layouts.frontend.master')

@section('title', 'Contact Us - MPTFS')

@push('css')
    <style>
        .contact-section .outer-container {
            min-height: 500px;
        }

        .contact-section .map-column {
            width: 100%;
        }

    </style>
@endpush

@section('content')

    <!-- Page Banner Section -->
    <section class="page-banner">
        <div class="image-layer lazy-image" data-bg="url('../public/assets/images/mptfs-imgs/Contact-Banner.jpg')"></div>
        <div class="bottom-rotten-curve"></div>

        <div class="auto-container">
            <h1>{{ __('home.contact_heading') }}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('mptfs.home') }}">{{ __('home.home') }}</a></li>
                <li class="active">{{ __('home.contact_heading') }}</li>
            </ul>
        </div>

    </section>
    <!--End Banner Section -->

    <!--Contact Info Section-->
    <section class="contact-info-section">
        <div class="auto-container">

            <div class="sec-title centered">
                <h2>{{ __('home.touch_heading') }}</h2>
            </div>

            <div class="info-boxes">
                <div class="row clearfix">
                    <!--Info Box-->
                    <div class="info-box col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInUp" data-wow-delay="600ms">
                            <div class="image-layer lazy-image"></div>
                            <div class="icon-box"><span class="flaticon-email"></span></div>
                            <h4>{{ __('home.email_heading') }}</h4>
                            <ul>
                                <li><a href="mailto:info@example.com">{{ __('home.email') }}</a></li>
                            </ul>
                        </div>
                    </div>

                    <!--Info Box-->
                    <div class="info-box col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInUp" data-wow-delay="300ms">
                            <div class="image-layer lazy-image"></div>
                            <div class="icon-box"><span class="flaticon-phone-call"></span></div>
                            <h4>{{ __('home.phone_heading') }}</h4>
                            <ul>
                                <li><a href="tel:0755 2674318">{{ __('home.phone') }}</a></li>
                            </ul>
                        </div>
                    </div>

                    <!--Info Box-->
                    <div class="info-box col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInUp" data-wow-delay="0ms">
                            <div class="image-layer lazy-image"></div>
                            <div class="icon-box"><span class="flaticon-home-location-marker"></span></div>
                            <h4>{{ __('home.address_heading') }}</h4>
                            <ul>
                                <li>{{ __('home.address') }}</li>
                            </ul>
                        </div>
                    </div>

                    <!--Info Box-->
                    <div class="info-box col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInUp" data-wow-delay="600ms">
                            <div class="image-layer lazy-image"></div>
                            <div class="icon-box"><span class="flaticon-email"></span></div>
                            <h4>{{ __('home.coordinators_heading') }}</h4>
                            <ul>
                                <li><a href="#">{{ __('home.coordinator_name1') }}</a></li>
                                <li><a href="#">{{ __('home.coordinator_name2') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!--Contact Section-->
    <section class="contact-section">
        <div class="bottom-rotten-curve1" style="position: absolute; left: 0; bottom: 0px; width: 100%; height: 20px;">
        </div>

        <div class="outer-container clearfix">
            <div class="form-column clearfix">
                {{-- <div class="inner clearfix">

                    <div class="sec-title centered">
                        <div class="sub-title">Inquiry</div>
                        <h2>Leave a Message</h2>
                        <div class="text">Cupidatat non proident sunt</div>
                    </div>

                    <!-- Contact Form-->
                    <div class="contact-form">
                        <form method="post" action="sendemail.php" id="contact-form1">
                            <div class="row clearfix">
                                <div class="col-md-6 col-sm-12 form-group">
                                    <input type="text" name="username" placeholder="Your name" required="">
                                </div>

                                <div class="col-md-6 col-sm-12 form-group">
                                    <input type="email" name="email" placeholder="Your Email" required="">
                                </div>

                                <div class="col-md-12 col-sm-12 form-group">
                                    <textarea name="message" placeholder="Write your message"></textarea>
                                </div>

                                <div class="col-md-12 col-sm-12 form-group text-center">
                                    <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="btn-title">Send Message</span></button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div> --}}
            </div>

            <div class="map-column clearfix">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3666.1151540171536!2d77.42970411428671!3d23.238896314041508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397c426438a739a5%3A0x171c8b1b9136f50d!2sMp%20Tiger%20Foundation%20Society%2C%20Third%20Floor%2C%20Bhopal%20Development%20Authority%2C%20Indira%20press%20complex%2C%20Bhopal%2C%20MP!5e0!3m2!1sen!2sin!4v1604731733269!5m2!1sen!2sin"
                    width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>
        </div>
    </section>

@endsection
