<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MPTFS | Service Unavailable</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('public/assets/images/mptfs-favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('public/assets/images/mptfs-favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.css')}}">
    <link href="{{asset('public/assets/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
    <style>
		.btn-outline-aqua {
			color: #047BAB !important;
			border-color: #047BAB !important;
		}

		.btn-outline-aqua:hover {
			color: #fff !important;
			background-color: #047BAB !important;
			border-color: #047BAB !important;
		}
	</style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 offset-lg-2">
                <img src="{{asset('public/assets/images/errors/503.jpg')}}" class="img-fluid" alt="Service Unavailable" style="margin: 40px 0 40px 0;">
            </div>
        </div>

        <div class="row">
			<div class="col-lg-12 text-center">
                <button class="btn btn-outline-aqua" onclick="window.location.reload()">Reload  <i class="fa fa-sync" aria-hidden="true"></i></button>
                {{-- <a href="{{url('/')}}" class="btn btn-outline-aqua">Reload  <i class="fa fa-sync" aria-hidden="true"></i></a> --}}
			</div>
		</div>
    </div>
    <script src="{{asset('public/assets/js/jquery-1.12.0.min.js')}}"></script>
    <script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>
</body>
</html>
