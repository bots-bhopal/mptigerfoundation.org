<?php
define('BASE_URL', 'http://localhost/mptfs.org/');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MPTFS | Access Forbidden</title>
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" <?php echo 'href="' . BASE_URL . 'public/assets/images/mptfs-favicon.png"' ?> type="image/x-icon">
    <link rel="icon" <?php echo 'href="' . BASE_URL . 'public/assets/images/mptfs-favicon.png"' ?> type="image/x-icon">
    <link rel="stylesheet" <?php echo 'href="' . BASE_URL . 'public/assets/css/bootstrap.css"' ?>>
    <style>
        .btn-outline-purple {
            color: #A30564 !important;
            border-color: #A30564 !important;
        }

        .btn-outline-purple:hover {
            color: #fff !important;
            background-color: #A30564 !important;
            border-color: #A30564 !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 offset-lg-2">
                <img <?php echo 'src="' . BASE_URL . 'errors/403.jpg"' ?> class="img-fluid" alt="Access Forbidden" style="margin: 40px 0 40px 0;">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="<?php echo BASE_URL; ?>" class="btn btn-outline-purple">Go To Home</a>
            </div>
        </div>
    </div>
    <script <?php echo 'src="' . BASE_URL . 'public/assets/js/bootstrap.min.js"' ?>></script>
</body>

</html>
