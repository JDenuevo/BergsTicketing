<?php 
include 'authentication.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard | BITS</title>
<link rel="stylesheet" href="../css/effect.css">
<?php 
$sql1 = "SELECT * FROM bits_sys_modify WHERE isActive = 1 AND upload_dir LIKE '%uploads/sl-%' LIMIT 1";
$result1 = $conn->query($sql1);
while ($row5 = $result1->fetch_assoc()) {
$upload_sl = $row5['upload_dir'];
}
?>
<link rel="icon" href="<?php echo $upload_sl; ?>">

<!-- Login Page CSS -->
<link rel="stylesheet" href="../css/style.css">

<!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

<!-- JS CSS -->
<link rel="stylesheet" href="../js/bootstrap.js">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="../bootstrap/bootstrap.css">

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
<div class="container-xxl position-relative bg-white d-flex p-0">
  <!-- Sidebar Start -->
  <div class="sidebar pe-4 pb-3" style="width: 295px;">
    <nav class="navbar bg-light navbar-light">
        <a href="dashboard.php" class="navbar-brand mx-5 mb-3">
            <?php 
$sql1 = "SELECT * FROM bits_sys_modify WHERE isActive = 1 AND upload_dir LIKE '%uploads/al-%' LIMIT 1";
$result1 = $conn->query($sql1);
while ($row5 = $result1->fetch_assoc()) {
$upload_al = $row5['upload_dir'];
}
?>
          <img src="<?php echo $upload_al; ?>" class="img-fluid d-none d-lg-block" width="150px">
        </a>
       <?php 
     $privilege = "Administrator";
            $sql = "SELECT * FROM bits_login WHERE privilege = '$privilege' LIMIT 1";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $imageData = $row['image'];
                    $fullname = $row['fullname'];
                    $username = $row['username'];
                    $email = $row['email'];
                    $imageSrc = '';
                
                    if (!empty($imageData)) {
                        $base64Image = base64_encode($imageData);
                        $imageSrc = "data:image/jpeg;base64,$base64Image";
                    } else {
                        $imageSrc = '../img/default_img.png';
                    }
    ?>
      <div class="d-flex align-items-center ms-4 mb-4">
        <div class="position-relative ">
          <img class="rounded-circle" src="<?php echo $imageSrc; ?>" style="width: 40px; height: 40px;">
          <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
        </div>

        <div class="ms-3">
          <h6 class="mb-0"><?php echo $row['fullname']; ?></h6>
          <span><?php echo $row['privilege']; ?></span>
        </div>
      </div>
    <?php  }  ?>
      <hr class="dropdown-divider">
      <div class="navbar-nav w-100">
        <a href="dashboard.php" class="nav-item nav-link text-truncate" data-toggle="tooltip" title="Dashboard"><i class="fa-solid fa-house me-2" style="color: #1974D2;"></i>Dashboard</a>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<a href="ticketinglist.php" class="nav-item nav-link text-truncate" data-toggle="tooltip" title="Ticketing List">
        <i class="fa-solid fa-ticket me-2" style="color: #90EE90;"></i>Ticketing List 
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="ticket-count bg-danger text-white rounded-pill px-2"></span>
    </a>
   <script>
        // Function to fetch pending ticket count using AJAX
        function updatePendingCount() {
            $.ajax({
                url: "get_pending_count.php",
                success: function (result) {
                    // Check if the result is not empty and not equal to 0
                    if (result.trim() !== "" && parseInt(result.trim()) !== 0) {
                        // Update the count on the webpage
                        $(".ticket-count").text(result);
                        // Show the span if it was hidden
                        $(".ticket-count").show();
                    } else {
                        // If the result is empty or equal to 0, hide the span
                        $(".ticket-count").hide();
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", error); // Log AJAX error
                }
            });
        }
        
        // Call the function initially and then set an interval to call it periodically
        updatePendingCount(); // Call initially
        setInterval(updatePendingCount, 5000); // Call every 5 seconds (adjust as needed)
    </script>

        <a href="review.php" class="nav-item nav-link text-truncate" data-toggle="tooltip" title="Rate List"><i class="fa-solid fa-star me-2" style="color: #FFD700;"></i>Rate List</a>
        <a href="faq.php" class="nav-item nav-link text-truncate" data-toggle="tooltip" title="FAQ Management"><i class="fa fa-question-circle me-2" style="color: #6f42c1;"></i>FAQ Management</a>
        <a href="department.php" class="nav-item nav-link text-truncate" data-toggle="tooltip" title="System Modification"><i class="fa-solid fa-building me-2" style="color: #FFA500"></i>Department</a>
        <a href="account.php" class="nav-item nav-link text-truncate" data-toggle="tooltip" title="Account Management"><i class="fa-solid fa-user me-2" style="color: #000000;"></i>Account Management</a><hr>
        <a href="system.php" class="nav-item nav-link text-truncate" data-toggle="tooltip" title="System Modification"><i class="fa-solid fa-sliders me-2" style="color: #71706E;"></i>System Modification</a>

        <!-- <div class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-star-sharp me-2"></i>Rate Reviews</a>
          <div class="dropdown-menu bg-transparent border-0">
            <a href="button.html" class="dropdown-item">Buttons</a>
            <a href="typography.html" class="dropdown-item">Typography</a>
            <a href="element.html" class="dropdown-item">Other Elements</a>
          </div>
        </div> -->

      </div>
    </nav>
  </div>
  <!-- Sidebar End -->

  <!-- Content Start -->
  <div class="content">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
      <a href="dashboard.php" class="navbar-brand d-flex d-lg-none me-4">
       <img src="<?php echo $upload_al; ?>" class="img-fluid" width="100px">
      </a>
      <a href="#" class="sidebar-toggler flex-shrink-0 text-decoration-none">
        <i class="fa fa-bars"></i>
      </a>
          <?php include 'notify.php'; ?>
      <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <img class="rounded-circle me-lg-2" src="<?php echo $imageSrc; ?>" alt="" style="width: 40px; height: 40px;">
          </a>
          <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
            <a href="myprofile.php" class="dropdown-item">My Profile</a>
            <a href="logout.php" class="dropdown-item">Log Out</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- Navbar End -->
    
<main class="col-lg-12 col-md-12 ms-sm-auto ps-5">
    <div class="container">
        <h1 class="text-center">Edit Profile</h1>
        <form action="admin_profile.php" method="post" enctype="multipart/form-data" id="update-form">
            <input type="text" name="id" value="<?php echo $id; ?>" hidden>
            
             <div class="rounded" id="upload">
                 <center>
                    <?php
                    $sql = "SELECT * FROM bits_login WHERE privilege = 'Administrator'";
                    $result = $conn->query($sql);
            
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $picture = $row['image'];
            
                        if (!empty($picture)) {
                            // Convert the BLOB data to base64 encoding
                            $imageData = base64_encode($picture);
                            $src = "data:image/*;base64,{$imageData}";
                        } else {
                            // If the image is not available, show a default image
                            $src = "default.png";
                        }
                    } else {
                        // If no matching record is found, show a default image
                        $src = "default.png";
                    }
                    ?>
            
                    <!-- Existing code for displaying the profile picture -->
                    <div id="idbox" class="shadow border border-opacity-100 d-flex rounded-circle" >
                        <img src="<?php echo $src; ?>" class="rounded-circle" style="width: 200px; height: 200px;">
                    </div><br>
            
                    <!-- File input to upload the new profile picture -->
                    <div class="btn rounded btn-primary btn-sm">
                        <i class="fa-solid fa-camera"></i>
                        <input type="file" name="image" accept="image/*" id="profile_picture_input">
                    </div>
                    </center>
                </div>
                
                
                
                <script>
                document.getElementById('profile_picture_input').addEventListener('change', function() {
                    var fileInput = this;
                    var idboxImage = document.getElementById('idbox').getElementsByTagName('img')[0];
                    
                    if (fileInput.files && fileInput.files[0]) {
                        var reader = new FileReader();
                        
                        reader.onload = function(e) {
                            idboxImage.src = e.target.result;
                        };
                        
                        reader.readAsDataURL(fileInput.files[0]);
                    } else {
                        // If no file is selected or selection is canceled, revert to the original profile picture
                        <?php if (!empty($picture)) { ?>
                        idboxImage.src = '<?php echo $src; ?>';
                        <?php } else { ?>
                        idboxImage.src = 'default.png';
                        <?php } ?>
                    }
                });
                </script>
<br>
            
            <div class="row">
                <div class="mb-3 col-12 col-lg-6 col-md-6 col-sm-6">
                    <label for="fullname" class="form-label">Fullname</label>
                    <input type="text" id="fullname" name="fullname" class="form-control" value = "<?php echo $fullname; ?>">
                </div>
                <div class="mb-3 col-12 col-lg-6 col-md-6 col-sm-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" value = "<?php echo $email; ?>">
                </div>
               <div class="mb-3 col-12 col-lg-6 col-md-6 col-sm-6">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control" value = "<?php echo $username; ?>">
                </div>
                <div class="mb-3 col-12 col-lg-6 col-md-6 col-sm-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" min="6" class="form-control" placeholder="Enter your password">
                </div>
            </div>
            
            <center>
               <button type="submit" class="btn btn-primary w-50 my-2 mt-50">Save Changes</button>
            </center>
        </form>
        <script>
            // Function to check for changes in form data
            function changesDetected() {
                // Get the form element
                var form = document.getElementById('update-form');
        
                // Get the initial input values
                var initialFullname = "<?php echo $fullname; ?>";
                var initialEmail = "<?php echo $email; ?>";
                var initialUsername = "<?php echo $username; ?>";
        
                // Get the current input values
                var currentFullname = form.elements['fullname'].value;
                var currentEmail = form.elements['email'].value;
                var currentUsername = form.elements['username'].value;
        
                // Compare the values and return true if changes are detected
                if (
                    currentFullname !== initialFullname ||
                    currentEmail !== initialEmail ||
                    currentUsername !== initialUsername
                ) {
                    return true;
                }
        
                // No changes detected
                return false;
            }
        
            // Add an event listener to the form to prevent submission if no changes
            var updateForm = document.getElementById('update-form');
            updateForm.addEventListener('submit', function(event) {
                if (!changesDetected()) {
                    event.preventDefault(); // Prevent form submission
                }
            });
        </script>
    </div>
</main>
<?php
  // Display error messages if they were passed in the URL
  if (isset($_GET['msgs'])) {
    $error2 = $_GET['msgs'];
    echo "<script>
      Swal.fire({
        icon: 'success',
        title: 'UPDATING PROFILE!',
        text: '$error2',
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

    unset($_GET['errors2']);
  }
?>

    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa-solid fa-arrow-up"></i></a>
</div>

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
    <script src="../js/main.js"></script>
    
    <script>
    if (window.performance) {
      if (performance.navigation.type == 1) {
        // Reloaded the page using the browser's reload button
        window.location.href = "myprofile.php";
      }
    }</script>
</body>

</html>
<?php mysqli_close($conn); ?>
