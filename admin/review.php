<?php 
include 'authentication.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Rate List | BERGS</title>
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

</head>
<style> 
    .rating {
      display: inline-block;
      font-size: 24px;
      cursor: pointer;
    }
    
  .star {
    color: #ccc; /* Default star color */
  }

  .star.glowing {
    color: gold; /* Color for glowing stars */
  }
  
      .comment {
    margin-bottom: 10px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.your-comment {
    text-align: right;
    background-color: #f0f8ff;
}

.other-comment {
    text-align: left;
    background-color: #fff;
}
    .pending { color: orange; }
    .done { color: green; }

    
</style> 
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

        <a href="review.php" class="nav-item nav-link text-truncate active" data-toggle="tooltip" title="Rate List"><i class="fa-solid fa-star me-2" style="color: #FFD700;"></i>Rate List</a>
        <a href="faq.php" class="nav-item nav-link text-truncate" data-toggle="tooltip" title="FAQ Management"><i class="fa fa-question-circle me-2" style="color: #6f42c1;"></i>FAQ Management</a>
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

<!--  MODAL -->
<?php 
 $sqls = "SELECT * FROM bits_tickets";
 $sqlsrun = $conn->query($sqls);
 
 while ($row = $sqlsrun->fetch_assoc()) {
    $ticket_number = $row['ticket_number'];
    $dateCreated = strtotime($row['date_created']);
    $formattedDateTime = date("F j, Y g:iA", $dateCreated);
?>
<!-- Modal -->
<div class="modal fade modal-lg" id="rateModal_<?php echo $row['ticket_number']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ticket Number: <input type=text name="ticket_number" style="border: none; font-weight: bold;" value="<?= $row['ticket_number']; ?>" readonly></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">
        <div class="row row-col-2">
            <div class="col col-lg-5 col-md-5 col-sm-12">
                <label>Ticket Number : <?php echo $row['ticket_number']  ?> </label>
            </div>
            
            <div class="col col-lg-5 col-md-5 col-sm-12">
                <label>Posted By : <?php echo $row['requester']  ?> </label>
            </div>
        </div>
        
        
        <div class="row row-col-2">
            <div class="col col-lg-5 col-md-5 col-sm-12">
                <label>Priority : <?php echo $row['priority']  ?> </label>
            </div>
            
            <div class="col col-lg-5 col-md-5 col-sm-12">
                Status: <label style="color: <?php echo ($row['ticket_status'] == 'Pending') ? 'orange' : 'green'; ?>;"><?php echo $row['ticket_status']?>  </label>
            </div>
        </div>
        
        
        <div class="row row-col-2">
            <div class="col col-lg-5 col-md-5 col-sm-12">
                <label>Department : <?php echo $row['department']  ?> </label>
            </div>
            <div class="col col-lg-5 col-md-5 col-sm-12">
                <label>Date : <?php
                        $dateCreated = strtotime($row['date_created']);
                        $formattedDate = date("F j, Y", $dateCreated);
                        $formattedTime = date("g:i A", $dateCreated);
                    
                        echo $formattedDate . " at " . $formattedTime;
                        
                        ?> </label>
            </div>
        </div>
        
        <hr>
        <center> <h4> <?php echo $row['subject']  ?> </h4> </center>
        <center> <small class="text-muted"><?php echo $row['content']  ?></small> </center>
        <hr>
        <!-- THIS IS THE START OF COMMENTS VIEWING -->
        <h6> Attachments </h6>
        <a href="" target="_blank"><?php
        $attachments = json_decode($row['attachments'], true); // Decode the JSON data from the database
        
        foreach ($attachments as $attachment) {
            $attachmentName = $attachment['name'];
            $attachmentData = base64_decode($attachment['data']);
            $downloadLink = 'data:application/octet-stream;base64,' . base64_encode($attachmentData);
            echo '<li><a href="' . $downloadLink . '" download="' . $attachmentName . '">' . $attachmentName . '</a></li>';
        }
        ?></a>
        <hr>
        <div class="card-footer bg-transparent border-primary">
         <center><b> Rate:</b> <div class="rating" id="ratingStars">
            <?php
            $starQuery = "SELECT * FROM bits_rate WHERE ticket_number = '$ticket_number'";
            $starrun = $conn->query($starQuery);
            
            $starRow = $starrun->fetch_assoc();
            $ticketRate = $starRow['ticket_rate'];
              
            // Generate stars based on the ticket rate
            for ($i = 1; $i <= 5; $i++) {
              $starClass = ($i <= $ticketRate) ? "star glowing" : "star";
              echo "<span class=\"$starClass\">&#9733;</span>";
            }
            ?>
           
          </div></center><br>
           <label><b>Rate Comment: </b></label>
            <p style="text-indent: 50px;"><?php echo $starRow['ticket_comment']; ?></p>
         </div>
        <hr>
        <h6> Comments: </h6>
        <!-- Loop through comments and display each one -->
       <?php
        $spec_tix = $row['ticket_number'];
        
        // Query to fetch comments associated with the ticket number
        $sql = "SELECT bc.*, bt.*
                FROM bits_comments AS bc
                JOIN bits_tickets AS bt ON bc.ticket_number = bt.ticket_number
                WHERE bc.ticket_number = '$spec_tix'";
        $result = mysqli_query($conn, $sql);
        
        // Check if the query was successful
        if ($result) {
            $isYourComment = false; // Flag to check if the comment is yours
        
            while ($comment = mysqli_fetch_assoc($result)) {
                $commentorName = $comment['commentor_name'];
                $commentDate = $comment['comment_date'];
                $commentContent = $comment['comment_content'];
        
                if ($commentorName === $_SESSION['privilege']) { // Compare with your name (modify accordingly)
                    $isYourComment = true;
                    echo '<div class="comment your-comment">';
                } else {
                    echo '<div class="comment other-comment">';
                }
        
                echo '<label>' . $commentorName . '</label><br>';
                echo '<label>' . date('F j, Y g:iA', strtotime($commentDate)) . '</label><br>';
                echo '<br>';
                echo '<p>' . $commentContent . '</p>';
                echo '</div><hr>';
        
                if ($isYourComment) {
                    $isYourComment = false; // Reset the flag
                }
            }
        
            mysqli_free_result($result);
        } else {
            echo 'Error fetching comments: ' . mysqli_error($conn);
        }
        ?>

        <!-- This is where the comment submitting ends -->
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"> Close </button>
      </div>
    </div>
  </div>
</div>
  <?php 
        }
  ?>
    <!-- Blank Start -->
    <main class="col-lg-12 col-md-12 ms-sm-auto ps-5">
        <div class="container-fluid px-4 py-4">
            <div class="bg-light text-center rounded p-2">
                <div class="d-flex justify-content-between">
                    <h5 class="mb-2 ">Rate/s:</h5>
                </div>
            </div>
<?php 
$sql = "SELECT t.*, r.ticket_rate, r.rate_time 
        FROM bits_tickets t
        JOIN bits_rate r ON t.ticket_number = r.ticket_number
        WHERE t.isRated = true
        ORDER BY r.rate_time DESC";
 $sqlrun = $conn->query($sql);
 
 while ($ticketRow = $sqlrun->fetch_assoc()) {
    $ticket_number = $ticketRow['ticket_number'];
?>
    <div class="card">
      <div class="card-header">
        Ticket No: <?php echo $ticketRow['ticket_number']; ?>
      </div>
      <div class="card-body">
        <a href="#rateModal_<?php echo $ticketRow['ticket_number'];?>" data-bs-toggle="modal"><h5 class="card-title">From : <?php echo $ticketRow['requester']; ?> </h5></a>
        <center><p class="card-text"><h2><b><?php echo $ticketRow['subject']; ?></b></h2></p></center>
        <p class="card-text"><?php echo $ticketRow['content']; ?></p>
        <div class="card-footer text-center bg-transparent border-primary">
          Rate: <div class="rating" id="ratingStars">
            <?php
            $ticketRate = $ticketRow['ticket_rate'];
              
            // Generate stars based on the ticket rate
            for ($i = 1; $i <= 5; $i++) {
              $starClass = ($i <= $ticketRate) ? "star glowing" : "star";
              echo "<span class=\"$starClass\">&#9733;</span>";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
<?php 
 }
?>

        </div>
    </main>
    <!-- Blank End -->

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
</body>

</html>
<?php mysqli_close($conn); ?>