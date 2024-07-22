<?php 
include 'authentication.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FAQs | BERGS</title>
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
        <a href="faq.php" class="nav-item nav-link text-truncate active" data-toggle="tooltip" title="FAQ Management"><i class="fa fa-question-circle me-2" style="color: #6f42c1;"></i>FAQ Management</a>
        <a href="department.php" class="nav-item nav-link text-truncate" data-toggle="tooltip" title="System Modification"><i class="fa-solid fa-building me-2" style="color: #FFA500"></i>Department</a>
        <a type="button" class="nav-item nav-link text-truncate" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-flag me-2" style="color: #ff0000;"></i>Reports</a>
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
      <main class="col-lg-12 col-md-12 ms-sm-auto ps-5 py-2">
        <div class="d-flex align-items-center justify-content-between">
            <h6 class="mb-0 ms-2">FAQs</h6>
            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#faq-modal"><i class="fa-solid fa-plus"></i>
              Add FAQ
            </button>
        </div>

        <div class="pt-2" style="overflow-x:auto">
          <table class="table table-responsive table-hover table-bordered text-center">
            <thead>
              <tr class="text-center table-active text-truncate fw-bold">
                <td scope="col" class="text-centered" data-colum="0">FAQ #</td>
                <td scope="col" class="text-centered" data-colum="1">Question</td>
                <td scope="col" class="text-centered" data-colum="2">Answer</td>
                <td scope="col" class="text-centered" data-colum="3">Action</td>
              </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM bits_faq";
                if($rs=$conn->query($sql)){
                    while ($row=$rs->fetch_assoc()) {
                ?>
                    <tr class="text-center align-middle text-wrap">
                        <td data-column="0"><?php echo $row['faq_num']  ?></td>
                        <td data-column="1"><?php echo $row['question']  ?></td>
                        <td data-column="2"><?php echo $row['answer']  ?></td>
                        <td class="d-flex-list justify-content-evenly align-middle" width = "100px" data-column="6">
                            <button class="btn btn-sm btn-outline-primary  float-mid " data-bs-toggle="dropdown" aria-expanded="false"  data-placement="down" title="Click to see more">
                            <i class="fa-solid fa-share"></i> Actions
                            </button>
                            <ul class="dropdown-menu dropdown-menu-light text-small shadow text-center">
                            <button class="btn btn-sm btn-primary mt-1" data-toggle="tooltip" data-placement="left" title="Update" data-bs-toggle="modal" data-bs-target="#updatemodal_modify_<?php echo $row['id'] ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                                Update
                            </button><br>

                            <button class="btn btn-sm btn-danger mt-1"  onclick="showDeleteConfirmation('<?php echo $row['faq_num']; ?>');" data-toggle="tooltip" data-placement="left" title="Remove">
                                <i class="fa-solid fa-trash"></i>
                            Remove
                            </button><br>
                        </td>
                    </tr>
                </tbody>
                <?php
                    }
                    }
                  ?>
          </table>
          <script>
                    function showDeleteConfirmation(faq_num) {
                        Swal.fire({
                            title: 'REMOVE FAQ!',
                            text: 'Do you want to remove this FAQ?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, remove it!',
                            cancelButtonText: 'No, cancel'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Proceed with deletion
                                Swal.fire({
                            icon: 'success',
                            title: 'REMOVING FAQ!',
                            text: 'FAQ Removed Successfully',
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
                          }, 10000);
                    
                          window.location.href = ' faq_remove.php?faq_num=' + faq_num;
                    
                    
                            } else if (result.dismiss === Swal.DismissReason.cancel) {
                                // Handle cancel button click event
                                Swal.fire(
                                    'Cancelled',
                                    'Your data is safe',
                                    'error'
                                );
                            }
                        });
                    }
                    </script>
        </div>
      </main>
      <!-- Main End -->
      
      </div>
      <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa-solid fa-arrow-up"></i></a>
  </div>
    

   <!-- Modal for FAQ -->
   <form action="add_faq.php" method="POST">
    <div class="modal fade" id="faq-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add new FAQ</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" placeholder="Question" name="question" required>
              <label for="floatingInput">Question</label>
            </div>
            <div class="form-floating">
              <input type="textarea" class="form-control" placeholder="Answer" name="answer" required>
              <label for="floatingPassword">Answer</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="add_faq">Save FAQ</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  
  <?php
  // Display error messages if they were passed in the URL
  if (isset($_GET['errors1'])) {
    $error1 = $_GET['errors1'];
    echo "<script>
      Swal.fire({
        icon: 'success',
        title: 'ADDING FAQ!',
        text: '$error1',
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

    unset($_GET['errors1']);
  }
?>


 <?php
  $sql = "SELECT * FROM bits_faq";
  if($rs=$conn->query($sql)){
      while ($row=$rs->fetch_assoc()) {

  ?>
<!-- Modal for FAQ -->
        <div class="modal fade" id="updatemodal_modify_<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <form action="faq_update.php" method="POST">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update FAQ</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="hidden" name="faq_id" value="<?php echo $row['id'] ?>">
                                <input type="text" class="form-control" name="question" value="<?php echo $row['question'] ?>" required>
                                <label for="floatingInput">Question</label>
                            </div>
                            <div class="form-floating">
                                <input type="textarea" class="form-control" name="answer" value="<?php echo $row['answer'] ?>" required>
                                <label for="floatingPassword">Answer</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update FAQ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   <?php
  // Display error messages if they were passed in the URL
  if (isset($_GET['errors2'])) {
    $error2 = $_GET['errors2'];
    echo "<script>
      Swal.fire({
        icon: 'success',
        title: 'UPDATING FAQ!',
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
  
   <script>
    if (window.performance) {
      if (performance.navigation.type == 1) {
        // Reloaded the page using the browser's reload button
        window.location.href = "faq.php";
      }
    }</script>
    
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
    
</body>
</html>
<?php mysqli_close($conn); ?>
