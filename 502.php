<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>502 - Page Not Found</title>
<link rel="stylesheet" href="css/effect.css">
<link rel="icon" href="img/logo.png">

<!-- Login Page CSS -->
<link rel="stylesheet" href="css/style.css">

<!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

<!-- JS CSS -->
<link rel="stylesheet" href="js/bootstrap.js">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="bootstrap/bootstrap.css">

<script src="https://kit.fontawesome.com/4b9ba14b0f.js" crossorigin="anonymous"></script>

</head>

<style>
body {
  background-color: #EBEBEB;
  /* background-image: url('img/bg.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  */
}
</style>
<body>



<!-- 404 Start -->
<div class="container-fluid px-4">
    <div class="row vh-100 rounded align-items-center justify-content-center mx-0">
        <div class="col-md-6 text-center p-4">
        <i class="fa-solid fa-triangle-exclamation" style="color: #009CFF; font-size: 200px;"></i>
        <?php
        header("HTTP/1.0 404 - Page Not Found");
        echo "<h1><strong>ERROR</strong></h1>";
        ?>
            <h1 class="display-1 fw-bold">5<i class="far fa-question-circle fa-spin text-dark mx-1"></i>2</h1>
            <h1 class="mb-4">Page Not Found</h1>
            <p class="mb-4">We’re sorry, the page you have looked for does not exist in our website!
                Maybe go to our home page or try to use a search?</p>
            <a class="btn btn-primary rounded-pill py-3 px-5" href="index.php"><i class="fa-solid fa-house"></i> Go Back To Home</a>

        </div>
    </div>
</div>
<!-- 404 End -->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>