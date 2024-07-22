<?php 
include 'authentication.php';
    include '../adminconfig.php';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ticketing List | BITS</title>
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
<style>
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
<a href="ticketinglist.php" class="nav-item nav-link text-truncate active" data-toggle="tooltip" title="Ticketing List">
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

    <!-- Blank Start -->
  <main class="col-lg-12 col-md-12 ms-sm-auto ps-5">
    
    <div class="container-fluid px-4 py-4">
        <div class="bg-light text-center rounded p-2">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Ticket Lists</h6>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark text-center">
                            <th scope="col" data-colum="0">Ticket #</th>
                            <th scope="col" data-colum="1">Requester Name</th>
                            <th scope="col" data-colum="2">Subject</th>
                            <th scope="col" data-colum="3">Priority</th>
                            <th scope="col" data-colum="4">Status</td>
                            <th scope="col" data-colum="5">Date Created</th>
                            <th scope="col" data-colum="6">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sql = "SELECT * FROM bits_tickets ORDER BY ticket_status DESC, date_created DESC";
                                if($rs=$conn->query($sql)){
                                    while ($row=$rs->fetch_assoc()) {
                                        $dateCreated = strtotime($row['date_created']);
                                        $formattedDateTime = date("F j, Y g:iA", $dateCreated);
                                        if($row['priority'] == 1){
                                            $priority = "High";
                                        }elseif($row['priority'] == 2){
                                            $priority = "Medium";
                                        }elseif($row['priority'] == 3){
                                            $priority = "Low";
                                        }
                        ?>
                        <tr class="text-center align-middle text-wrap">
                            <td data-column="0"> <?= $row['ticket_number']; ?> </td>
                            <td data-column="1"> <?= $row['requester']; ?> </td>
                            <td data-column="2"> <?= $row['subject']; ?> </td>
                            <td data-column="3" style="color: <?php
                                if ($priority == 'High') {
                                    echo 'red';
                                } elseif ($priority == 'Medium') {
                                    echo 'orange';
                                } elseif ($priority == 'Low') {
                                    echo 'green';
                                }
                            ?>;">
                                <?= $priority; ?>
                        </td>
                            <td data-column="4" style="color: <?php echo ($row['ticket_status'] == 'Pending') ? 'orange' : 'green'; ?>;">
                                <?= $row['ticket_status']; ?>
                            </td>
                            <td data-column="5"> <?= $formattedDateTime ?> </td>
                            <td class="d-flex-list justify-content-evenly align-middle" width = "150px" data-column="5">
                            <button type="button" class="btn btn-sm btn-primary mt-1" data-bs-toggle="modal" data-bs-target="#view-ticket_<?php echo $row['ticket_number'] ?>">
                            <i class="fa-solid fa-eye"></i>
                              View
                            </button>
                            
                        
                    </td>
                </tr>
                    </tbody>
                    <?php
                            }
                            }
                          ?>
                </table>
            </div>
        </div>
    </div>

   
  </main>
    <!-- Blank End -->

        
    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa-solid fa-arrow-up"></i></a>
</div>
    <?php 
        $sql = "SELECT * FROM bits_tickets ORDER BY ticket_status DESC, date_created ASC";
            if($rs=$conn->query($sql)){
                while ($row=$rs->fetch_assoc()) {
                    $dateCreated = strtotime($row['date_created']);
                    $formattedDateTime = date("F j, Y g:iA", $dateCreated);
    ?>
<!-- Modal -->
<div class="modal fade modal-lg" id="view-ticket_<?php echo $row['ticket_number']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <label>Status:</label>
                <select id="status" name="status" style="color: <?php echo ($row['ticket_status'] == 'Pending') ? 'orange' : 'green'; ?>;" onchange="updateStatus(this.value, <?php echo $row['ticket_number']; ?>, '<?php echo $row['requester'] ?>', '<?php echo $row['email'] ?>')">
                    <option value="Pending" <?php if ($row['ticket_status'] == 'Pending') echo 'selected'; ?> class="pending">Pending</option>
                    <option value="Done" <?php if ($row['ticket_status'] == 'Done') echo 'selected'; ?> class="done">Done</option>
                </select>

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

        <!-- This is where the comment submitting start -->
       <!-- MAKE SURE TO ONLY VIEW THIS IF THE ticket_status = Pending in bits_tickets -->
        <?php
        $commentorName = "";
        if ($row['ticket_status'] === 'Pending') {
            $tix = $row['ticket_number'];
            $email = $row['email'];
            $sendto = $row['requester'];
            $name = "Administrator";
            date_default_timezone_set('Asia/Manila');
            $currentDate = date('F j, Y');
           echo '<form method="post" action="submit_comment.php">
              <div class="col col-lg-12 col-md-12 col-sm-12 form-floating">
                  <input type="hidden" name="ticket_number" value="' . $tix . '">
                  <input type="hidden" name="email" value="' . $email . '">
                  <input type="hidden" name="commentor_name" value="' . $name . '">
                  <input type="hidden" name="send_to" value="' . $sendto . '">
                  <input type="hidden" name="comment_date" value="' . $currentDate . '">
                  <textarea class="form-control" name="comment_content" placeholder="Leave a comment here" id="floatingTextarea" required></textarea>
                  <label for="floatingTextarea">Comment...</label>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-sm mx-auto" name="submit_comment">Submit</button>
              </div>
          </form>';
        }
        ?>
    <?php
        if (isset($_SESSION['open_modal']) && $_SESSION['open_modal']) {
            echo "<script>
                      jQuery(document).ready(function(){
                          jQuery('#view-ticket_".$_SESSION['ticket_number']."').modal('show');
                      });
                  </script>";
            unset($_SESSION['open_modal']);
            unset($_SESSION['ticket_number']);
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
        }
      ?>
<!-- Modal
<div class="modal fade" id="comment-ticket" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ticket #001</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
 -->
 
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
document.getElementById('status').addEventListener('change', function() {
    var selectedOption = this.options[this.selectedIndex];
    if (selectedOption.classList.contains('pending')) {
        this.style.color = 'orange';
    } else if (selectedOption.classList.contains('done')) {
        this.style.color = 'green';
    } else {
        this.style.color = ''; // Reset to default color
    }
});
</script>
<script>
function updateStatus(newStatus, ticketNumber, send_to, email) {
    $.ajax({
        type: 'POST',
        url: 'update_status.php',
        data: {
            ticketNumber: ticketNumber,
            newStatus: newStatus,
            send_to: send_to,
            email: email
        },
        success: function(response) {
            console.log(response);
            
            // Store ticket information in local storage
            localStorage.setItem('editedTicket', JSON.stringify({ ticketNumber: ticketNumber }));
            
            // Reload the page
            window.location.reload();
        },
        error: function() {
            console.log("Update failed");
        }
    });
}

// Check if an edited ticket is stored in local storage
$(document).ready(function() {
    var editedTicket = JSON.parse(localStorage.getItem('editedTicket'));
    if (editedTicket) {
        $('#view-ticket_' + editedTicket.ticketNumber).modal('show');
        // Remove the stored ticket information from local storage
        localStorage.removeItem('editedTicket');
    }
});
</script>

 
</body>
     <script>
  document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('[data-bs-toggle="collapse"]');
    const showHideButton = document.getElementById('showHideButton');

    buttons.forEach(button => {
      button.addEventListener('click', () => {
        buttons.forEach(b => b.classList.remove('active'));
        button.classList.add('active');
      });
    });

    showHideButton.addEventListener('click', () => {
      buttons.forEach(button => button.classList.remove('active'));
    });
  });
</script>

</html>
<?php mysqli_close($conn); ?>