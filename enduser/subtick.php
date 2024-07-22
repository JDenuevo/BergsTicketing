    <?php
include 'authentication.php';
$name = $_SESSION['name'];
$name2 = $_SESSION['fullname'];
$email1 = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Submit Ticket | BITS</title>
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
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../summernote/summernote-lite.css">

<!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

<!-- JS CSS -->
<link rel="stylesheet" href="../js/bootstrap.js">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="../bootstrap/bootstrap.css">
<script src="../js/jquery-3.6.0.min.js"></script>
<script src="../summernote/summernote-lite.js"></script>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


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

 :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }
        
        html,
        body {
            height: 100%;
            width: 100%;
        }
        input.form-control.border-0{
            transition:border .3s linear
        }
        input.form-control.border-0:focus{
            box-shadow:unset !important;
            border-color:var(--bs-info) !important
        }
        .note-editor.note-frame .note-editing-area .note-editable, .note-editor.note-airframe .note-editing-area .note-editable {
            background: var(--bs-white);
        }
</style>

<body>
    <nav>
      <div class="container">
        <div class="container-fluid container-lg">
          <div class="row justify-content-center align-items-center mx-auto">
            <div class="col-6">
              <a class="navbar-brand" href="dashboard.php">
                <img src="<?php echo "../admin/".$upload_sl; ?>" class="img-fluid"alt="Logo" width="100" height="50" class="d-inline-block align-text-top">
              </a>
            </div>
            <div class="col-6 d-flex flex-column align-items-end align-lg-end justify-content-end">
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
                        <a class="nav-link px-lg-3" aria-current="page" href="dashboard.php"><i class="fa-solid fa-house"></i> Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link px-lg-3" href="faqs.php"><i class="fa-solid fa-file-circle-question"></i> FAQ</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link px-lg-3 fw-bold active" href="subtick.php"><i class="fa-solid fa-ticket"></i> Submit a Ticket</a>
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
                        <a class="nav-link px-lg-3" aria-current="page" href="dashboard.php"><i class="fa-solid fa-house"></i> Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link px-lg-3" href="faqs.php"><i class="fa-solid fa-file-circle-question"></i> FAQ</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link px-lg-3 fw-bold active" href="subtick.php"><i class="fa-solid fa-ticket"></i> Submit a Ticket</a>
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
        
        </div>
      </div>
    </nav>
    
    <!-- Blank Start -->
    <div class="container-fluid px-5">
      <div class="vh-100 mx-0">

        <form action="subtick_qry.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                    <label> Requester : </label> 
                   <input class="form-control" name="requester" type="text" value="<?php echo $name ?? $name2; ?>" readonly>
                </div>
            
                <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                    <label> Email : </label> 
                    <input class="form-control" name="email" type="text" value="<?php echo $email1; ?>" readonly>
                </div>
                
                <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                    <label> Department : </label> 
                    <input class="form-control" name="department" type="text" value="<?php 
                    $sql = "SELECT department FROM bits_login WHERE email = '$email1'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $department = $row['department'];
                    echo $department;
                    ?>" readonly>
                </div>
            </div>
            
            <div class="row mt-2">
                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                    <label> Subject : </label> 
                    <input class="form-control" name="subject" type="text" required>
                </div>
                
                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                    <label> Priority : </label> 
                    <div class="input-group mb-3">
                      <select class="form-select" name="priority" id="inputGroupSelect03" aria-label="Example select with button addon" required>
                        <option value="">Choose...</option>
                        <option value="1">High</option>
                        <option value="2">Medium</option>
                        <option value="3">Low</option>
                      </select>
                    </div>
                </div>
            </div>

                <div class="card-body">
                    <div class="form-group col-12">
                        <label for="content" class="control-label">Description : </label>
                        <textarea name="content" id="content" class="summernote" required><?php echo isset($_SESSION['POST']['content']) ? $_SESSION['POST']['content'] : (isset($_GET['page']) ? file_get_contents("./pages/{$_GET['page']}") : '')  ?></textarea>
                    </div>
                </div>
                <div class="">
                    <label> Attachments : </label> 
                        <div class="card-body">
                            <input type="file" name="files[]" multiple>
                        </div>
                        <br>
                        <button class="btn btn-primary btn-sm"> Submit </button>
                </div>
        </div>
    </div>
                
            </form>
            <br>
             <?php
            // Display error messages if they were passed in the URL
            if (isset($_GET['msgs'])) {
                $message = $_GET['msgs'];
                
                if (strpos($message, "success") !== false) {
                    echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Submit a Ticket',
                            text: '$message',
                            showConfirmButton: false,
                            showClass: {
                                popup: 'animate__animated animate__fadeIn'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOut'
                            }
                        });
                        setTimeout(function() {
                            Swal.close();
                        }, 4000);
                    </script>";
                } else {
                    echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Submit a Ticket',
                            text: '$message',
                            showConfirmButton: false,
                            showClass: {
                                popup: 'animate__animated animate__fadeIn'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOut'
                            }
                        });
                        setTimeout(function() {
                            Swal.close();
                        }, 4000);
                    </script>";
                }
                
                unset($_GET['msgs']);
            }
            ?>

                </div>
            </div>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        
    <script>
      $('.summernote').summernote({
        placeholder: 'Create you content here.',
        tabsize: 5,
        height: '50vh',
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>


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

  
     <script>
    if (window.performance) {
      if (performance.navigation.type == 1) {
        // Reloaded the page using the browser's reload button
        window.location.href = "subtick.php";
      }
    }
    </script>
    
    
    </body>
</html>
<?php mysqli_close($conn); ?>