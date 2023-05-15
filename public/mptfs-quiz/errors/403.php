<?php
	include('../includes/setting.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Basic -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Favicon -->
	<link rel="shortcut icon" <?php echo 'href="'. BASE_URL . 'img/logo/favicon.png"'?> type="image/x-icon" />
	<link rel="apple-touch-icon" <?php echo 'href="'. BASE_URL . 'img/logo/favicon.png"'?>>

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

	<link rel="stylesheet" <?php echo 'href="'. BASE_URL . 'assets/css/bootstrap.min.css"'?>>
	<title>403 - Access Forbidden</title>

	<style>
		.btn-outline-danger {
		    color: #E94949!important;
		    border-color: #E94949!important;
		}

		.btn-outline-danger:hover {
		    color: #fff!important;
		    background-color: #E94949!important;
		    border-color: #E94949!important;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-12 offset-lg-2">
				<img <?php echo 'src="'. BASE_URL . 'errors/403.jpg"'?> class="img-fluid" alt="Access Forbidden" >
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 text-center">
				<a href="<?php echo BASE_URL; ?>" class="btn btn-outline-danger">Back To Home</a>
			</div>
		</div>
	</div>
</body>
</html>