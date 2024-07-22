<?php
include 'authentication.php';
include 'home.php';
$email1 = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home | BITS</title>
<link rel="stylesheet" href="../css/effect.css">
<?php 
$sql1 = "SELECT * FROM bits_sys_modify WHERE isActive = 1 AND upload_dir LIKE '%uploads/sl-%' LIMIT 1";
$result1 = $conn->query($sql1);
while ($row5 = $result1->fetch_assoc()) {
$upload_sl = $row5['upload_dir'];
}
?>
<link rel="icon" href="<?php echo "../admin/".$upload_sl; ?>">

<!-- Login Page CSS -->
<link rel="stylesheet" href="../css/style.css">

<!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

<!-- JS CSS -->
<link rel="stylesheet" href="../js/bootstrap.js">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="../bootstrap/bootstrap.css">

</head>

<style>
/* Default styles for all screen sizes */
.navbar-nav .nav-link.active {
  position: relative;
}

.navbar-nav .nav-link.active::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 2px;
  background-color: #0d6efd; /* Customize the color as desired */
}

/* Media query for large screens */
@media (min-width: 992px) {
  .navbar-nav .nav-link.active::before {
    height: 3px; /* Increase the height for larger screens */
  }
}

/* Media query for medium screens */
@media (max-width: 991px) {
  .navbar-nav .nav-link.active::before {
    height: 1px; /* Decrease the height for medium screens */
  }
}

/* Media query for small screens */
@media (max-width: 767px) {
  .navbar-nav .nav-link.active::before {
    height: 1px; /* Keep a small height for small screens */
  }
}

</style>

<body>
    <nav>
      <div class="container">
        <div class="container-fluid container-lg">
          <div class="row justify-content-center align-items-center mx-auto">
            <div class="col">
              <a class="navbar-brand" href="#">
                <img src="<?php echo "../admin/".$upload_sl; ?>" class="img-fluid"alt="Logo" width="100" height="50" class="d-inline-block align-text-top">
              </a>
            </div>
            <div class="col d-flex flex-column align-items-end align-lg-end justify-content-end">
              <div class="text-muted">
                Welcome <span class="fw-bold" id="name">
                <?php
                $sql = "SELECT * FROM bits_login WHERE email = '$email1'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                  $name = $row['fullname'];
                  $user_id = $row['id'];
                  }
                  if (!empty($name)) {
                        echo $name;
                    } else {
                        echo '';
                    }
                ?></span>
              </div>
              <div class="mt-2">
                <i class="fa-solid fa-user-pen"></i> <a href="editprof.php" class="fw-bold text-decoration-none">Edit Profile</a>
                <div class="vr mx-2"></div>
                <i class="fa-solid fa-right-from-bracket"></i> <a href="logout.php" class="fw-bold text-decoration-none">Sign out</a>
              </div>
            </div>
          </div>
 
          <hr>
          
          <div class="d-flex flex-column">
            <nav class="navbar navbar-expand-lg p-0 mb-3">
              <div class="container-fluid">

                <div class="collapse navbar-collapse">

                    <ul class="navbar-nav text-uppercase">
                      <li class="nav-item">
                        <a class="nav-link px-lg-3 fw-bold active" aria-current="page" href="dashboard.php"><i class="fa-solid fa-house"></i> Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link px-lg-3" href="faqs.php"><i class="fa-solid fa-file-circle-question"></i> FAQ</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link px-lg-3" href="subtick.php"><i class="fa-solid fa-ticket"></i> Submit a Ticket</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link px-lg-3" href="recent_tickets.php"><i class="fa-solid fa-clock-rotate-left"></i> Recent Tickets</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link px-lg-3" href="histick.php"><i class="fa-solid fa-file-lines"></i> Ticket History</a>
                      </li>
                      <li class="nav-item">
                        <a type="button" class="nav-link px-lg-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-flag"></i> Reports</a>
                      </li>
                    </ul>
                    
                    <?php include 'notify.php'; ?>
                    
                    <?php include 'report.php'; ?>
    
                </div>
                    
              </div>
            </nav>

          </div>
          
        </div>
        
        <div class="col-6">
            <h4> How can we help you today? </h4>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
                </div>
        </div>
                    
          <div class="d-flex justify-content-between">
            <div>
                <a href="subtick.php" class="text-decoration-none text-truncate me-2"><i class="fa-solid fa-square-plus"></i> New Support Ticket</a>
                <a href="histick.php" class="text-decoration-none text-truncate"><i class="fa-solid fa-ticket"></i> Check Ticket Status</a>
            </div>
            
                <?php include 'notify_mobile.php'; ?>
            
            
                <button class="btn btn-sm btn-secondary d-lg-none d-xl-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fa-solid fa-bars"></i>
                </button>
            

          </div>
          
          <div class="d-flex flex-column d-lg-none d-xl-none">
            <nav class="navbar navbar-expand-lg p-0 mb-3">
              <div class="container-fluid">

                <div class="collapse navbar-collapse" id="navbarmain">

                    <ul class="navbar-nav text-uppercase">
                      <li class="nav-item">
                        <a class="nav-link px-lg-3 fw-bold active" aria-current="page" href="dashboard.php"><i class="fa-solid fa-house"></i> Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link px-lg-3" href="faqs.php"><i class="fa-solid fa-file-circle-question"></i> FAQ</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link px-lg-3" href="subtick.php"><i class="fa-solid fa-ticket"></i> Submit a Ticket</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link px-lg-3" href="recent_tickets.php"><i class="fa-solid fa-clock-rotate-left"></i> Recent Tickets</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link px-lg-3" href="histick.php"><i class="fa-solid fa-file-lines"></i> Ticket History</a>
                      </li>
                      <li class="nav-item">
                        <a type="button" class="nav-link px-lg-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-flag"></i> Reports</a>
                      </li>
                    </ul>
               
                </div>
              </div>
            </nav>

          </div>

          <hr>
          
             <div class="card col-8 shadow">
                    <h4 class="mx-3 my-3 fw-bold">Knowledge Base</h4>
                    <hr class="mx-2">
                  <div class="card-body">
                      
                      <div class="row">
                          <div class="col-6">
                              <label class="fw-bold fs-5 mb-2">SAP TIP OF THE DAY<span style="color: grey;"> (19) </span></label>
                            <div class="d-flex align-items-center mx-1">
                                <i class="fas fa-book-open me-2"></i>
                                <p class="card-text mb-0">Read The News About Contact Persons.</p>
                            </div>
                            <div class="d-flex align-items-center mx-1">
                                <i class="fas fa-book-open me-2"></i>
                                <p class="card-text mb-0">It's End of Fiscal Year in Inv. Counting.</p>
                            </div> 
                            <div class="d-flex align-items-center mx-1">
                                <i class="fas fa-book-open me-2"></i>
                                <p class="card-text mb-0">UDF's Are Available in Activity Reports.</p>
                            </div>  
                            <div class="d-flex align-items-center mx-1">
                                <i class="fas fa-book-open me-2"></i>
                                <p class="card-text mb-0">When One items Has Multiple Codes.</p>
                            </div>  
                            <div class="d-flex align-items-center mx-1">
                                <i class="fas fa-book-open me-2"></i>
                                <p class="card-text mb-0">User Management Gets User-Friendlier.</p>
                            </div>  
                        </div>
                          <div class="col-6">
                              <label class="fw-bold fs-5 mb-2">PAYROLL ENTERPRISE FAQ<span style="color: grey;"> (2) </span></label>
                            <div class="d-flex align-items-center mx-1">
                                <i class="fas fa-book-open me-2"></i>
                                <p class="card-text mb-0">How to Restore and Backup Database in Pay...</p>
                            </div>
                            <div class="d-flex align-items-center mx-1">
                                <i class="fas fa-book-open me-2 "></i>
                                <p class="card-text mb-0">Your End Closing and Leave Renewal.</p>
                            </div>
                          </div>
                      </div>
                      
                      <br><br><br><br><br>
                      
                       <div class="row">
                          <div class="col-6">
                              <label class="fw-bold fs-5 mb-2">SAP FAQ<span style="color: grey;"> (12) </span></label>
                            <div class="d-flex align-items-center mx-1">
                                <i class="fas fa-book-open me-2"></i>
                                <p class="card-text mx-0">How to load/import SAP License.</p>
                            </div>
                            <div class="d-flex align-items-center mx-1">
                                <i class="fas fa-book-open me-2"></i>
                                <p class="card-text mb-0">How to Create and Use a Financial Report Te....</p>
                            </div>
                            <div class="d-flex align-items-center mx-1">
                                <i class="fas fa-book-open me-2"></i>
                                <p class="card-text mb-0">How to Backup or create an automatic back....</p>
                            </div>
                            <div class="d-flex align-items-center mx-1">
                                <i class="fas fa-book-open me-2"></i>
                                <p class="card-text mb-0">How to install SAP Client to Workstation.</p>
                            </div>
                            <div class="d-flex align-items-center mx-1">
                                <i class="fas fa-book-open me-2"></i>
                                <p class="card-text mb-0">Softflix Trobuleshooting.</p>
                            </div>
                          </div>
                          <div class="col-6">
                              <label class="fw-bold fs-5 mb-2">SAGE 50<span style="color: grey;"> (1) </span></label>
                            <div class="d-flex align-items-center mx-1">
                                <i class="fas fa-book-open me-2"></i>
                                <p class="card-text mb-0">How to create a new company in SAGE 50.</p>
                            </div>
                          </div>
                      </div>
                          
                  </div>
              </div>
              
              
        </div>
      </div>
    </nav>

    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4">
      <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
          
      </div>
    </div>
    <!-- Blank End -->

</div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/chart/chart.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>

</html>
<?php mysqli_close($conn); ?>