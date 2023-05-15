<!DOCTYPE html>
<html lang="{{session('locale')}}">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>

    <meta name="keywords" content="Madhya Pradesh Tiger Foundation Society, MPTFS, MPTFS Bhopal, Madhya Pradesh Tiger Foundation Society Bhopal, Madhya Pradesh Tiger Foundation Society Official Website, MPTFS Official Website"/>
    <meta name="description" content="This is the offical website of MPTFS. It was formed by Madhya Pradesh State Government on 15th January 1997. The idea was to facilitate achieving the goal of wildlife conservation (with special emphasis on tiger) by ensuring participation from public and all other organizations committed for conservation."/>

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('public/assets/images/mptfs-favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('public/assets/images/mptfs-favicon.png')}}" type="image/x-icon">

    <!-- Stylesheets -->
    <link href="{{asset('public/assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/css/style.css')}}" rel="stylesheet">
    <!-- Responsive File -->
    <link href="{{asset('public/assets/css/responsive.css')}}" rel="stylesheet">
    <!-- Color File -->
    <link href="{{asset('public/assets/css/color.css')}}" rel="stylesheet">
    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!-- Style -->
    <link href="{{asset('public/assets/css/my-style.css')}}" rel="stylesheet">
    @stack('css')
</head>

<body>

    <!-- Start Page Wrapper -->
    <div class="page-wrapper">

        @include('layouts.frontend.partial.header')

        <!-----------------------------------Page Content Start Here--------------------------------------->
        @yield('content')
        <!------------------------------------Page Content End Here---------------------------------------->

        @include('layouts.frontend.partial.footer')

    </div>
    <!-- End Page Wrapper -->

    <!--Scroll to Top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-up-arrow"></span></div>

    <script src="{{asset('public/assets/js/jquery.js')}}"></script>
    <script src="{{asset('public/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/assets/js/jquery-ui.js')}}"></script>
    <script src="{{asset('public/assets/js/jquery.fancybox.js')}}"></script>
    <script src="{{asset('public/assets/js/owl.js')}}"></script>
    <script src="{{asset('public/assets/js/appear.js')}}"></script>
    <script src="{{asset('public/assets/js/wow.js')}}"></script>
    <script src="{{asset('public/assets/js/lazyload.js')}}"></script>
    <script src="{{asset('public/assets/js/scrollbar.js')}}"></script>
    <script src="{{asset('public/assets/js/script.js')}}"></script>
    <!-- Toastr -->
    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    <script>
        @if($errors->any())
            @foreach($errors->all() as $error)
                toastr.error('{{ $error }}','Error',{
                    closeButton:true,
                    progressBar:true,
                });
            @endforeach
        @endif
    </script>
    @stack('js')
</body>
</html>
