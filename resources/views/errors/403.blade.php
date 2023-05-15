<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MPTFS | Access Forbidden</title>
    <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 offset-lg-2">
                <img src="{{asset('public/assets/images/errors/403.jpg')}}" class="img-fluid" alt="Access Forbidden" style="margin: 40px 0 40px 0;">
            </div>
        </div>

        <div class="row">
			<div class="col-lg-12 text-center">
                <a href="{{url('/')}}" class="btn btn-outline-purple">Go To Home</a>
			</div>
		</div>
    </div>
    <script src="{{asset('public/assets/js/jquery-1.12.0.min.js')}}"></script>
    <script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>
</body>
</html>
