<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('public/assets/images/mptfs-favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('public/assets/images/mptfs-favicon.png')}}" type="image/x-icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('public/assets/portal/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Daterange Picker -->
    <link rel="stylesheet" href="{{asset('public/assets/portal/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('public/assets/portal/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('public/assets/portal/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Dropzone CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/dz/dropzone.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/dz/custom-dz.css')}}">
    <!-- Toggle Switch -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('public/assets/portal/plugins/select2/css/select2.min.css')}}">
    <!-- flag-icon-css -->
    <link rel="stylesheet" href="{{asset('public/assets/portal/plugins/flag-icon-css/css/flag-icon.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/assets/portal/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('public/assets/portal/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!-- Style -->
    <link href="{{asset('public/assets/css/my-style.css')}}" rel="stylesheet">
    @stack('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
            @include('layouts.backend.partial.navbar')
        <!-- End Navbar -->

        <!--Sidebar -->
            @include('layouts.backend.partial.sidebar')
        <!-- End Sidebar -->

        <!-- Main content wrapper -->
            @yield('content')
        <!-- End content wrapper -->

        <!-- Footer -->
            @include('layouts.backend.partial.footer')
        <!-- End Footer -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('public/assets/portal/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('public/assets/portal/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Moment -->
    <script src="{{asset('public/assets/portal/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('public/assets/portal/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
    <!-- Daterange Picker -->
    <script src="{{asset('public/assets/portal/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('public/assets/portal/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Dropzone JS -->
    <script src="{{ asset('public/assets/dz/dropzone.min.js') }}"></script>
    <script src="{{ asset('public/assets/dz/custom-dz.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('public/assets/portal/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('public/assets/portal/dist/js/adminlte.min.js')}}"></script>
    <!-- CKEditor -->
    <script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
    <script>
        $(function () {
            // Initialize CKEDITOR
            $('.ckeditor').ckeditor();
        });

        // Change Height
        CKEDITOR.replace('pbody', {
            width: '100%',
            height: 400
        });

        // Toggle Switch
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 0 : 1;
                var user_id = $(this).data('id');

                $.ajax({
                type: "GET",
                dataType: "json",
                url: 'changeuserstatus',
                data: {'status': status, 'user_id': user_id},
                success: function(data){
                    if(status == 0)
                    {
                        toastr['success'](data.message);
                    }
                    else if(status == 1)
                    {
                        toastr['error'](data.message);
                    }
                    else
                    {
                        toastr['warning'](data.message);
                    }
                }
                });
            });
        })
    </script>

    <!-- Select2 -->
    <script src="{{asset('public/assets/portal/plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        });
    </script>
    <!-- Toggle Switch -->
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- Toastr -->
    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

    <script>
        toastr.options = {
        "closeButton": true,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        }
    </script>

    @if(session('success'))
        <script>toastr.success("{!! session('success') !!}")</script>
    @endif
    @if(session('error'))
        <script>toastr.error("{!! session('error') !!}")</script>
    @endif
    @stack('js')
</body>
</html>
