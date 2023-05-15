<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Quiz Result - MPTFS</title>

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../public/assets/images/mptfs-favicon.png" type="image/x-icon">
    <link rel="icon" href="../../public/assets/images/mptfs-favicon.png" type="image/x-icon">

    <!-- Stylesheets -->
    <link href="../../public/assets/css/bootstrap.css" rel="stylesheet">
    <link href="../../public/assets/css/style.css" rel="stylesheet">
    <!-- Responsive File -->
    <link href="../../public/assets/css/responsive.css" rel="stylesheet">
    <!-- Color File -->
    <link href="../../public/assets/css/color.css" rel="stylesheet">
    <!-- Style -->
    <link href="../../public/assets/css/my-style.css" rel="stylesheet">

    <!-- Custom Style -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');

        body {
            padding-right: 0 !important;
        }

        .main-header {
            z-index: 999;
        }

        .page-wrapper {
            position: unset;
        }

        .modal-body p {
            font-size: 14px !important;
        }

        .btn-primary {
            background-color: #0088CC !important;
            border-color: #0088CC #0088CC #006699 !important;
            color: #FFF !important;
        }

        .btn-primary:hover {
            background-color: #0088CC !important;
            border-color: #0088CC #0088CC #006699 !important;
            color: #FFF !important;
        }

        .score {
            animation-name: example;
            animation-duration: 4s;
            animation-iteration-count: infinite;
        }

        @keyframes example {
            0% {
                color: red;
            }

            25% {
                color: pink;
            }

            50% {
                color: blue;
            }

            75% {
                color: green;
            }

            100% {
                color: orange;
            }
        }

        /* .mptfs {
            animation-name: example1;
            animation-duration: 4s;
            animation-iteration-count: infinite;
        }

        @keyframes example1 {
            0% {
                color: #2E8B57;
            }

            25% {
                color: #556B2F;
            }

            50% {
                color: #228B22;
            }

            75% {
                color: #008000;
            }

            100% {
                color: #006400;
            }
        } */
    </style>
</head>

<body>

    <!-- Preloader -->
    <div class="preloader">
        <div class="icon"></div>
    </div>

    <!-- Floating Social Media Icons -->
    <div class="social-icons">
        <a href="https://www.facebook.com/mptigerfoundationsociety" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i>Facebook</a>
        <a href="https://www.twitter.com/mptfs" target="_blank" class="twitter"><i class="fab fa-twitter"></i>Twitter</a>
        <a href="https://www.youtube.com/channel/UCt7TIvdCEW4iUsxUqmSqswA" target="_blank" class="youtube"><i class="fab fa-youtube"></i>Youtube</a>
        <a href="https://www.instagram.com/mptfs.official/" target="_blank" class="instagram"><i class="fab fa-instagram"></i>Instagram</a>
    </div>

    <!-- Main Header -->
    <header class="main-header">
        <!-- Header Top -->
        <div class="header-top">
            <div class="auto-container">
                <div class="inner clearfix">
                    <div class="top-right">
                        <ul class="social-links clearfix">
                            <li class="social-title">Follow Us :</li>
                            <li><a href="https://www.facebook.com/mptigerfoundationsociety" target="_blank"><span class="fab fa-facebook-f"></span></a></li>
                            <li><a href="https://www.twitter.com/mptfs" target="_blank"><span class="fab fa-twitter"></span></a></li>
                            <li><a href="https://www.youtube.com/channel/UCt7TIvdCEW4iUsxUqmSqswA" target="_blank"><span class="fab fa-youtube"></span></a></li>
                            <li><a href="https://www.instagram.com/mptfs.official/" target="_blank"><span class="fab fa-instagram"></span></a></li>
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
                        <div class="logo"><a href="#"><img src="../../public/assets/images/logo-main.png" alt="MPTFS-Logo" title="MPTFS-Logo"></a></div>
                    </div>

                    <!--Nav Box-->
                    <div class="nav-outer clearfix">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler"><span class="icon flaticon-menu-1"></span></div>

                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li><a href="/mptfs.org">Home</a> </li>
                                    <li class="dropdown"><a>Know More</a>
                                        <ul>
                                            <li><a href="../../know-more/about_mptfs">About MPTFS</a></li>
                                            <li><a href="../../know-more/organizational_structure">Organizational Structure</a></li>
                                            <li><a href="../../know-more/tiger-state-mp">Tiger State MP</a></li>
                                            <li><a href="../../our-work/tiger-reserve">Tiger Reserve Of MP</a></li>
                                            <li class="dropdown"><a>Our Work</a>
                                                <ul>
                                                    <li><a href="../../our-work/training">Training And Reasearch</a></li>
                                                    <li><a href="../../our-work/awareness">Awareness Initiatives</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- <li class="dropdown"><a>Our Work</a>
                                        <ul>
                                            <li><a href="../../our-work/training">Training And Reasearch</a></li>
                                            <li><a href="../../our-work/awareness">Awareness Initiatives</a></li>
                                            <li><a href="../../our-work/tiger-reserve">Tiger Reserves Of MP</a></li>
                                        </ul>
                                    </li> -->
                                    <li class="dropdown"><a>Contribute</a>
                                        <ul>
                                            <li><a href="../../get-involved/support">How You Can Support</a></li>
                                            <li><a href="../../get-involved/love" target="_blank">I Love Wildlife</a></li>
                                            <li><a href="https://mptiger.mponline.gov.in/" target="_blank">Close To My Heart</a></li>
                                            <li><a href="../../get-involved/our-partners">Our Partners</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="../../news-corner/blog">Blog</a>
                                    </li>

                                    <li class="dropdown"><a>Info Corner</a>
                                        <ul>
                                            <li><a href="../../news-corner/event">Upcoming Events</a></li>
                                            <li><a href="../../news-corner/downloads">Downloads</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a>Gallery</a>
                                        <ul>
                                            <li><a href="../../home/gallery">Photos</a></li>
                                            <li><a href="../../news-corner/downloads">Downloads</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="../../home/contact">Contact</a></li>
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
                    <a href="#" title=""><img src="../../public/assets/images/sticky-logo.png" alt="MPTFS-Logo" title=""></a>
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
                <div class="nav-logo"><a href="#"><img src="../../public/assets/images/logo.png" alt="MPTFS-Logo" title=""></a></div>
                <div class="menu-outer">
                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                </div>
                <!--Social Links-->
                <div class="social-links">
                    <ul class="clearfix">
                        <li><a href="https://www.facebook.com/mptigerfoundationsociety"><span class="fab fa-facebook-square"></span></a></li>
                        <li><a href="https://www.twitter.com/mptfs"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="https://www.youtube.com/channel/UCt7TIvdCEW4iUsxUqmSqswA"><span class="fab fa-youtube"></span></a></li>
                        <li><a href="https://www.instagram.com/mptfs.official/"><span class="fab fa-instagram"></span></a></li>
                    </ul>
                </div>
            </nav>
        </div><!-- End Mobile Menu -->
    </header>
    <!-- End Main Header -->

    <!-- Start Page Wrapper -->
    <div class="page-wrapper">
