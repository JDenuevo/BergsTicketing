<?php
include 'authentication.php';
$name = $_SESSION['name'];
$email1 = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Recent Ticket | BITS</title>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<style>
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

.rating {
  font-size: 30px;
  cursor: pointer;
}

.star {
  display: inline-block;
  margin: 5px;
}

.star:hover,
.star.active {
  color: orange;
}
  
.btn.active {
border: 2px solid #000;
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
                        <a class="nav-link px-lg-3" href="subtick.php"><i class="fa-solid fa-ticket"></i> Submit a Ticket</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link px-lg-3 fw-bold active" href="recent_tickets.php"><i class="fa-solid fa-clock-rotate-left"></i> Recent Tickets</a>
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
                        <a class="nav-link px-lg-3" href="subtick.php"><i class="fa-solid fa-ticket"></i> Submit a Ticket</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link px-lg-3 fw-bold active" href="recent_tickets.php"><i class="fa-solid fa-clock-rotate-left"></i> Recent Tickets</a>
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
        
        </div>
      </div>
    </nav>

  <!-- Blank Start -->
    <div class="container-fluid pt-4 px-5">
        <button class="btn btn-sm btn-danger rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#highcol" aria-expanded="false" aria-controls="highcol">High</button>
        <button class="btn btn-sm btn-warning rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#medcol" aria-expanded="false" aria-controls="medcol">Medium</button>
        <button class="btn btn-sm btn-success rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#lowcol" aria-expanded="false" aria-controls="lowcol">Low</button>
        <button class="btn btn-sm btn-primary rounded-pill float-end" type="button" id="showHideButton" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="highcol medcol lowcol">Show/Hide</button>
        
        <hr>
          <div class="vh-100 mx-0">
        <?php
        $isRated = false;
        $sql = "SELECT * FROM bits_tickets WHERE email = '$email1' AND isRated = '$isRated' ORDER BY date_created Desc";
        if($rs=$conn->query($sql)){
            while ($row=$rs->fetch_assoc()) {
        ?>
        
        <div class="row row-cols-3">
            <?php 
            if ($row['priority'] == 1 ){
                
            ?>
            <div class="col-12 my-1">
              <div class="collapse multi-collapse show" id="highcol">
                <span class="badge rounded-pill text-bg-danger">High Priority</span>
                <div class="card">
                  <h5 class="card-header">Ticket No. <a href="" data-bs-toggle="modal" data-bs-target="#ticket_<?php echo $row['ticket_number']?>"><?php echo $row['ticket_number']  ?></a></h5>
                  <div class="card-body">
                    <h6 class="card-title"><?php echo $row['subject']  ?></h6>
                    <small class="text-muted">
                        <?php
                        $dateCreated = strtotime($row['date_created']);
                        $formattedDate = date("F j, Y", $dateCreated);
                        $formattedTime = date("g:i A", $dateCreated);
                    
                        echo $formattedDate . " at " . $formattedTime;
                        if ($row['isRated'] == false && $row['ticket_status'] == "Done"){
                            echo "<h5 style='color: red'>PLEASE RATE THIS TICKET.</h4>";
                        }elseif($row['ticket_status'] == "Pending"){
                            echo "<h5 style='color: orange'>PENDING TICKET.</h4>";
                        }elseif($row['isRated'] == true && $row['ticket_status'] == "Done"){
                            echo "<h5 style='color: green '>THIS TICKET IS DONE.</h4>";
                        }
                        ?>
                    </small>
                  </div>
                </div>
              </div>
            </div>
            <?php
                } elseif($row['priority'] == 2){
            ?>    
            <div class="col-12 my-1">
              <div class="collapse multi-collapse show" id="medcol">
                <span class="badge rounded-pill text-bg-warning">Medium Priority</span>
                <div class="card">
                  <h5 class="card-header">Ticket No. <a href="" data-bs-toggle="modal" data-bs-target="#ticket_<?php echo $row['ticket_number']?>"><?php echo $row['ticket_number']  ?></a></h5>
                  <div class="card-body">
                    <h6 class="card-title"><?php echo $row['subject']  ?></h6>
                    <small class="text-muted">
                        <?php
                        $dateCreated = strtotime($row['date_created']);
                        $formattedDate = date("F j, Y", $dateCreated);
                        $formattedTime = date("g:i A", $dateCreated);
                    
                        echo $formattedDate . " at " . $formattedTime;
                        if ($row['isRated'] == false && $row['ticket_status'] == "Done"){
                            echo "<h5 style='color: red'>PLEASE RATE THIS TICKET.</h4>";
                        }elseif($row['ticket_status'] == "Pending"){
                            echo "<h5 style='color: orange'>PENDING TICKET.</h4>";
                        }elseif($row['isRated'] == true && $row['ticket_status'] == "Done"){
                            echo "<h5 style='color: green '>THIS TICKET IS DONE.</h4>";
                        }
                        ?>
                    </small>
                  </div>
                </div>
              </div>
            </div>
         <?php
                } elseif($row['priority'] == 3){
            ?>
            <div class="col-12 my-1">
              <div class="collapse multi-collapse show" id="lowcol">
                <span class="badge rounded-pill text-bg-success">Low Priority</span>
                <div class="card">
                  <h5 class="card-header">Ticket No. <a href="" data-bs-toggle="modal" data-bs-target="#ticket_<?php echo $row['ticket_number']?>"><?php echo $row['ticket_number']  ?></a></h5>
                  <div class="card-body">
                    <h6 class="card-title"><?php echo $row['subject']  ?></h6>
                    <small class="text-muted">
                        <?php
                        $dateCreated = strtotime($row['date_created']);
                        $formattedDate = date("F j, Y", $dateCreated);
                        $formattedTime = date("g:i A", $dateCreated);
                    
                        echo $formattedDate . " at " . $formattedTime;
                        if ($row['isRated'] == false && $row['ticket_status'] == "Done"){
                            echo "<h5 style='color: red'>PLEASE RATE THIS TICKET.</h4>";
                        }elseif($row['ticket_status'] == "Pending"){
                            echo "<h5 style='color: orange'>PENDING TICKET.</h4>";
                        }elseif($row['isRated'] == true && $row['ticket_status'] == "Done"){
                            echo "<h5 style='color: green '>THIS TICKET IS DONE.</h4>";
                        }
                        ?>
                    </small>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
        </div>
        <?php
            }
            }
          ?>
          
      </div>
    </div>

</div>

<?php
  $sql = "SELECT * FROM bits_tickets WHERE email = '$email1'";
  if($rs=$conn->query($sql)){
      while ($row=$rs->fetch_assoc()) {
          $ticknum = $row['ticket_number'];

  ?>
<div class="modal fade modal-lg" id="ticket_<?php echo $row['ticket_number']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ticket History</h5>
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
               <label>Status : <?php echo $row['ticket_status']  ?> </label>
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
        
                if ($commentorName === $name) { // Compare with your name (modify accordingly)
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
        if ($row['ticket_status'] === 'Pending') {
            $tix = $row['ticket_number'];
            $name = $row['requester'];
            date_default_timezone_set('Asia/Manila');
            $currentDate = date('F j, Y');
           echo '<form method="post" action="submit_comment_recent.php">
              <div class="col col-lg-12 col-md-12 col-sm-12 form-floating">
                  <input type="hidden" name="ticket_number" value="' . $tix . '">
                  <input type="hidden" name="commentor_name" value="' . $name . '">
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
        if ($row['ticket_status'] == "Done" && $row['isRated'] == false){
    ?>
    <br>
    <center>
        <label class="form-label">Rate</label>
        <input type="hidden" value = "<?php echo $ticknum ?>" name="ticket_num">
        <div class="rating">
          <span class="star" data-rating="1">&#9733;</span>
          <span class="star" data-rating="2">&#9733;</span>
          <span class="star" data-rating="3">&#9733;</span>
          <span class="star" data-rating="4">&#9733;</span>
          <span class="star" data-rating="5">&#9733;</span>
        </div>
        <textarea class="form-control" name="rate_comment" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
        <br>
         <button class="btn btn-primary" onclick="submitRating()">Submit Rating</button>
    </center>
<?php } ?>
    <?php

        if (isset($_SESSION['open_modal']) && $_SESSION['open_modal']) {
            echo "<script>
                      jQuery(document).ready(function(){
                          jQuery('#ticket_".$_SESSION['ticket_number']."').modal('show');
                      });
                  </script>";
            unset($_SESSION['open_modal']);
            unset($_SESSION['ticket_number']);
        }
        ?>

        <!-- This is where the comment submitting ends -->
      </div>
    </div>
  </div>
</div>
<?php
    }
    }
  ?>
    
    <!-- JavaScript Libraries -->
    
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
const stars = document.querySelectorAll(".star");
let selectedRating = 0;

stars.forEach(star => {
  star.addEventListener("mouseover", () => {
    const rating = star.getAttribute("data-rating");
    highlightStars(rating);
  });

  star.addEventListener("click", () => {
    selectedRating = star.getAttribute("data-rating");
    highlightStars(selectedRating);
  });

  star.addEventListener("mouseout", () => {
    highlightStars(selectedRating);
  });
});


function highlightStars(rating) {
  stars.forEach(star => {
    const starRating = star.getAttribute("data-rating");
    if (starRating <= rating) {
      star.classList.add("active");
    } else {
      star.classList.remove("active");
    }
  });
}

function submitRating() {
    const comment = document.querySelector("textarea[name='rate_comment']").value;
    const ticketNumber = document.querySelector("input[name='ticket_num']").value;
    
    if (selectedRating > 0 && comment.trim() !== "") {
        const data = {
            rating: selectedRating,
            comment: comment,
            ticketNumber: ticketNumber
        };
        // Before sending the fetch request
        console.log("Selected Rating:", selectedRating);
        console.log("Comment:", comment);
        console.log("Ticket Number:", ticketNumber);
        fetch('submit_rating.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
            
        })
        .then(response => response.json())
        .then(result => {
            if (result.status === "success") {
                selectedRating = 0;
                highlightStars(selectedRating);
                document.querySelector("textarea[name='rate_comment']").value = "";

                Swal.fire({
                    icon: 'success',
                    title: 'Rating Submitted',
                    text: result.message,
                    showConfirmButton: false,
                    timer: 4000
                });

                // Close the modal after the success message
                setTimeout(() => {
                    Swal.close();
                    // Add code here to close the modal you're opening with PHP
                    jQuery('#ticket_'+ticketNumber).modal('hide');
                }, 4000);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Rating Submission Error',
                    text: result.message,
                    showConfirmButton: false,
                    timer: 4000
                });
            }
        })
    } else {
        Swal.fire({
            icon: 'warning',
            title: 'Incomplete Rating',
            text: 'Please select a rating and provide a comment.',
            showConfirmButton: false,
            timer: 4000
        });
    }
}


    </script>
    
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
<script>
    const dropdownToggle = document.getElementById('notifications-dropdown-toggle');
    const dropdownMenu = dropdownToggle.nextElementSibling;

    // Prevent the dropdown from closing when clicking inside the dropdown
    dropdownMenu.addEventListener('click', function (event) {
        event.stopPropagation();
    });

    // Close the dropdown when clicking outside of it
    document.addEventListener('click', function (event) {
        const isInsideDropdown = dropdownMenu.contains(event.target);
        if (!isInsideDropdown) {
            dropdownMenu.classList.remove('show');
        }
    });
</script>



     <script>
    if (window.performance) {
      if (performance.navigation.type == 1) {
        // Reloaded the page using the browser's reload button
        window.location.href = "recent_tickets.php";
      }
    }</script>
</body>
</html>
<?php mysqli_close($conn); ?>