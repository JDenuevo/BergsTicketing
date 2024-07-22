<?php 
include 'authentication.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Account Management | BERGS</title>
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
                    $imageData = $row['image']; 
                    $imageSrc = '';
                
                    if (!empty($imageData)) {
                        $base64Image = base64_encode($imageData);
                        $imageSrc = "data:image/jpeg;base64,$base64Image";
                    } else {
                        $imageSrc = '../img/default_img.png';
                    }
    ?>
      <div class="d-flex align-items-center ms-4 mb-4">
        <div class="position-relative">
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
        <a type="button" class="nav-item nav-link text-truncate" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-flag" style="color: #ff0000;"></i>Reports</a>
        <a href="account.php" class="nav-item nav-link text-truncate active" data-toggle="tooltip" title="Account Management"><i class="fa-solid fa-user me-2" style="color: #000000;"></i>Account Management</a><hr>
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
  
   <?php include 'reports.php'; ?>

  <!-- Content Start -->
  <div class="content">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
      <div class="justify-content-center align-items-center d-lg-none">
        <a href="dashboard.php" class="navbar-brand mx-4 mb-3">
          <img src="<?php echo $upload_al; ?>" class="img-fluid" width="100px">
        </a>
      </div>
      <a href="#" class="sidebar-toggler flex-shrink-0 text-decoration-none">
        <i class="fa fa-bars"></i>
      </a>
      <?php include 'notify.php'; ?>
      <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
          <?php 
            $privilege = "Administrator";
            $sql = "SELECT * FROM bits_login WHERE privilege = '$privilege' LIMIT 1";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $imageData = $row['image']; 
                    $imageSrc = '';
                
                    if (!empty($imageData)) {
                        $base64Image = base64_encode($imageData);
                        $imageSrc = "data:image/jpeg;base64,$base64Image"; 
                    } else {
                        $imageSrc = '../img/default_img.png';
                    }
        ?>    
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <img class="rounded-circle me-lg-2" src="<?php echo $imageSrc; ?>" alt="" style="width: 40px; height: 40px;">
          </a>
        <?php  }  ?>
          <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
            <a href="myprofile.php" class="dropdown-item">My Profile</a>
            <a href="logout.php" class="dropdown-item">Log Out</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- Navbar End -->

    <!-- Main -->
  <main class="col-lg-12 col-md-12 ms-sm-auto ps-5">

        <div class="d-flex align-items-center justify-content-between px-2 py-2">
            <h6 class="mb-0">Accounts</h6>
        </div>

    <div class="pt-2 px-2" style="overflow-x:auto">
        <table class="table table-responsive table-hover table-bordered text-center">
            <thead>
                <tr class="text-center table-active text-truncate fw-bold">
                <td scope="col" class="text-centered" data-colum="0">ID</td>
                <td scope="col" class="text-centered" data-colum="1">Name</td>
                <td scope="col" class="text-centered" data-colum="2">Department</td>
                <td scope="col" class="text-centered" data-colum="3">Username</td>
                <td scope="col" class="text-centered" data-colum="4">Email</td>
                <td scope="col" class="text-centered" data-colum="5">Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM bits_login WHERE privilege = 'End-User'";
                $num = 1;
                if($rs=$conn->query($sql)){
                    while ($row=$rs->fetch_assoc()) {
                    
                ?>
                <tr class="text-center align-middle text-wrap">
                    <td data-column="0"><?php echo $num++;  ?></td>
                    <td data-column="1"><?php echo $row['fullname'];  ?></td>
                    <td data-column="2"><?php echo $row['department'];  ?></td>
                    <td data-column="3"><?php echo $row['username'];  ?></td>
                    <td data-column="4"><?php echo $row['email'];  ?></td>
                    <td class="d-flex-list justify-content-evenly align-middle" width = "100px" data-column="5">
                    <button class="btn btn-sm btn-primary mt-1"  data-toggle="tooltip" data-placement="left" title="Update" data-bs-toggle="modal" data-bs-target="#accModal<?php echo $row['id'] ?>" >
                            <i class="fa-solid fa-pen-to-square"></i>
                            Update
                            </button><br>
                    </td>
                </tr>
            </tbody>
            <?php
                    }
                    }
                  ?>
            </table>
        </div>
  </main>
  
    <!-- Main End -->

        
    </div>
    <!-- Content End -->
    <?php
  $sql = "SELECT * FROM bits_login";
  if($rs=$conn->query($sql)){
      while ($row=$rs->fetch_assoc()) {

  ?>
<div class="modal fade" id="accModal<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <form action="update_profile.php" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <div class="row row-col-2">
         <div class="col mt-2">
          <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
          <input class="form-control" type="text" name="fullname" placeholder="Juan Dela Cruz" value="<?php echo $row['fullname'] ?>">
                    <center><label>Fullname</label></center>
      </div>
      
        <div class="col col-lg-6 col-md-6 col-sm-12 mt-2">
           <input class="form-control" type="email" name="email" placeholder="example@gmail.com" value="<?php echo $row['email'] ?>" readonly>
                    <center><label>Email</label></center>
        </div>
      </div>
      
      <div class="row row-col-2"> 
        <div class="col col-lg-6 col-md-6 col-sm-12 mt-2">
             <input class="form-control" type="text" name="username" placeholder="juandelacruz1999" value="<?php echo $row['username'] ?>">
                    <center><label>Username</label></center>
        </div>
      
        <div class="col col-lg-6 col-md-6 col-sm-12 mt-2">
             <input type="password" class="form-control" name="password">
              <center><label>Password</label></center>
        </div>
      </div>
      
      <div class="row row-col-2 mt-2"> 
          <div class="col col-lg-12 col-md-12 col-sm-12mt-2">
              <select class="form-select" aria-label="form-select-example" name="department">
                <option disabled>Select your Department</option>
                        <?php
                        $email1=$row['email'];
                        $sql = "SELECT dep_name FROM bits_department"; // Updated query to fetch departments from "bits_department" table
                        $result = $conn->query($sql);
                        $departments = array();
                    
                        while ($row = $result->fetch_assoc()) {
                            $departments[] = $row['dep_name'];
                        }
                    
                        $sql2 = "SELECT * FROM bits_login WHERE email = '$email1' LIMIT 1";
                        $result2 = $conn->query($sql2);
                    
                        if ($result2 && $result2->num_rows > 0) {
                            $row2 = $result2->fetch_assoc();
                            $selectedDepartment = $row2['department']; // Assuming the department name is stored in the 'department' column
                        } else {
                            // Set a default value for the selected department if not found in the bits_login table
                            $selectedDepartment = ''; // Change this to the desired default department name, e.g., 'Default Department'
                        }
                    
                        foreach ($departments as $department) {
                            echo '<option value="' . htmlspecialchars($department) . '"';
                            if ($department === $selectedDepartment) {
                                echo ' selected';
                            }
                            echo '>' . htmlspecialchars($department) . '</option>';
                        }
                        ?>
                    </select>
                <center><label>Department</label></center>
          </div>
      </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>
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
    <?php
    }
    }
  ?>

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
        window.location.href = "account.php";
      }
    }</script>
</body>

</html>
<?php mysqli_close($conn); ?>