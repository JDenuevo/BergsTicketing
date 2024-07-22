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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

<!-- JS CSS -->
<link rel="stylesheet" href="../js/bootstrap.js">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="../bootstrap/bootstrap.css">

</head>

<body>
<?php 
$sql1 = "SELECT * FROM bits_sys_modify WHERE isActive = 1 AND upload_dir LIKE '%uploads/al-%' LIMIT 1";
$result1 = $conn->query($sql1);
while ($row5 = $result1->fetch_assoc()) {
$upload_al = $row5['upload_dir'];
}
?>
<div class="container-xxl position-relative bg-white d-flex p-0">
  <!-- Sidebar Start -->
  <div class="sidebar pe-4 pb-3" style="width: 295px;">
    <nav class="navbar bg-light navbar-light">
        <a href="dashboard.php" class="navbar-brand mx-5 mb-3">
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
        <a href="dashboard.php" class="nav-item nav-link text-truncate active" data-toggle="tooltip" title="Dashboard"><i class="fa-solid fa-house me-2" style="color: #1974D2;"></i>Dashboard</a>
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
      <a href="dashboard.php" class="navbar-brand d-flex d-lg-none me-4">
       <img src="<?php echo $upload_al; ?>" class="img-fluid" width="100px">
      </a>
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
    
<main class="col-lg-12 col-md-12 ms-sm-auto ps-5">
<h3 class="mb-0 d-flex justify-content-center">Rate Pie Chart</h3>
<div class="container-fluid py-2 ps-5">
        <div class="container">
            <canvas id="myPieChart" width="380px" heigth="380px"></canvas>
        </div>
    </div>
<?php

    $sql = "SELECT ticket_rate FROM bits_rate";
    $result = $conn->query($sql);

    $ticketRatesFromDatabase = array();
    while ($row = $result->fetch_assoc()) {
        $ticketRatesFromDatabase[] = $row['ticket_rate'];
    }
  ?>
    <script>
        // The PHP-generated data from the backend
        const ticketRatesFromDatabase = <?php echo json_encode($ticketRatesFromDatabase); ?>;
        
        // Count occurrences of each ticket rate
        const rateCounts = [0, 0, 0, 0, 0];
        for (const rate of ticketRatesFromDatabase) {
            rateCounts[rate - 1]++;
        }

        // Create the pie chart using Chart.js
        const ctx = document.getElementById('myPieChart').getContext('2d');
        const data = {
            labels: ['1 Star', '2 Stars', '3 Stars', '4 Stars', '5 Stars'],
            datasets: [{
                data: rateCounts,
                backgroundColor: ['#FF5733', '#FFC300', '#F0E68C', '#98FB98', '#20B2AA']
            }]
        };
        const options = {
            responsive: true,
            maintainAspectRatio: false
        };
        new Chart(ctx, {
            type: "pie",
            data: data,
            options: options
        });
        
    </script>
  
    <!-- Navbar End -->
<div class="container-fluid px-4 py-4">
        <div class="bg-light text-center rounded p-2">
            <div class="d-flex justify-content-between">
                <h3 class="mb-0">Logs</h3>
            </div>
            <br>
          <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="ticket-tab" data-bs-toggle="tab" data-bs-target="#ticket-tab-pane" type="button" role="tab" aria-controls="ticket-tab-pane" aria-selected="true">Ticket Logs</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="comment-tab" data-bs-toggle="tab" data-bs-target="#comment-tab-pane" type="button" role="tab" aria-controls="comment-tab-pane" aria-selected="false">Comment Logs</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="rate-tab" data-bs-toggle="tab" data-bs-target="#rate-tab-pane" type="button" role="tab" aria-controls="rate-tab-pane" aria-selected="false">Rate Logs</button>
              </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="ticket_status-tab" data-bs-toggle="tab" data-bs-target="#ticket_status-tab-pane" type="button" role="tab" aria-controls="ticket_status-tab-pane" aria-selected="false">Ticket Status Logs</button>
             </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="ticket-tab-pane" role="tabpanel" aria-labelledby="ticket-tab" tabindex="0">
                <div class="table-responsive pt-2">
              <div id="tableForTicket">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
                    <script>
                        function updateTable() {
                            $.ajax({
                                url: 'ticket_logs.php',
                                type: 'GET',
                                dataType: 'json',
                                success: function(data) {
                                    var tableContent = '';
                    
                                    data.forEach(function(row) {
                                        tableContent += `
                                            <tr class="text-center align-middle text-wrap">
                                                <td data-column="0">${row.ticket_number}</td>
                                                <td data-column="1">${row.full_name}</td>
                                                <td data-column="2">${row.subject}</td>
                                                <td data-column="3">${row.date_created}</td>
                                            </tr>`;
                                    });
                    
                                    $('#tableForTicket').html(`
                                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                                            <thead>
                                                <tr class="text-dark text-center">
                                                    <th scope="col" data-colum="0"> Ticket Number</th>
                                                    <th scope="col" data-colum="1"> Name </th>
                                                    <th scope="col" data-colum="2"> Subject </th>
                                                    <th scope="col" data-colum="3"> Date Created </th>
                                                </tr>
                                            </thead>
                                            <tbody>${tableContent}</tbody>
                                        </table>`
                                    );
                                },
                                error: function() {
                                    console.error("An error occurred while fetching data.");
                                }
                            });
                        }
                    
                        // Call the function to update the table initially
                        updateTable();
                    
                        setInterval(updateTable, 3000); 
                    </script>
                    </div>
            </div>
              </div>
              
              <div class="tab-pane fade" id="comment-tab-pane" role="tabpanel" aria-labelledby="comment-tab" tabindex="0">
                  <div class="table-responsive pt-2">
                <div id="tableForComment">
                        <script>
                            function updateTableForComment() {
                                $.ajax({
                                    url: 'comment_logs.php',
                                    type: 'GET',
                                    dataType: 'json',
                                    success: function(data) {
                                        var tableContent = '';
                        
                                        data.forEach(function(row) {
                                            tableContent += `
                                                <tr class="text-center align-middle text-wrap">
                                                    <td data-column="0">${row.ticket_number}</td>
                                                    <td data-column="1">${row.full_name}</td>
                                                    <td data-column="2">${row.subject}</td>
                                                    <td data-column="3">${row.date_created}</td>
                                                </tr>`;
                                        });
                        
                                        $('#tableForComment').html(`
                                            <table class="table text-start align-middle table-bordered table-hover mb-0">
                                                <thead>
                                                    <tr class="text-dark text-center">
                                                        <th scope="col" data-colum="0"> Ticket Number</th>
                                                        <th scope="col" data-colum="1"> Name </th>
                                                        <th scope="col" data-colum="2"> Subject </th>
                                                        <th scope="col" data-colum="3"> Date Created </th>
                                                    </tr>
                                                </thead>
                                                <tbody>${tableContent}</tbody>
                                            </table>`
                                        );
                                    },
                                    error: function() {
                                        console.error("An error occurred while fetching data.");
                                    }
                                });
                            }
                        
                            // Call the function to update the table initially
                            updateTableForComment();
                        
                            setInterval(updateTableForComment, 3000); 
                        </script>
                </div>
            </div>
            </div>
              
        
        <div class="tab-pane fade" id="rate-tab-pane" role="tabpanel" aria-labelledby="rate-tab" tabindex="0">
                  <div class="table-responsive pt-2">
                 <div id="tableForRate">
                        <script>
                            function updateTableForRate() {
                                $.ajax({
                                    url: 'rate_logs.php',
                                    type: 'GET',
                                    dataType: 'json',
                                    success: function(data) {
                                        var tableContent = '';
                        
                                        data.forEach(function(row) {
                                            tableContent += `
                                                <tr class="text-center align-middle text-wrap">
                                                    <td data-column="0">${row.ticket_number}</td>
                                                    <td data-column="1">${row.full_name}</td>
                                                    <td data-column="2">${row.subject}</td>
                                                    <td data-column="3">${row.date_created}</td>
                                                </tr>`;
                                        });
                        
                                        $('#tableForRate').html(`
                                            <table class="table text-start align-middle table-bordered table-hover mb-0">
                                                <thead>
                                                    <tr class="text-dark text-center">
                                                        <th scope="col" data-colum="0"> Ticket Number</th>
                                                        <th scope="col" data-colum="1"> Name </th>
                                                        <th scope="col" data-colum="2"> Rate </th>
                                                        <th scope="col" data-colum="3"> Date Created </th>
                                                    </tr>
                                                </thead>
                                                <tbody>${tableContent}</tbody>
                                            </table>`
                                        );
                                    },
                                    error: function() {
                                        console.error("An error occurred while fetching data.");
                                    }
                                });
                            }
                        
                            // Call the function to update the table initially
                            updateTableForRate();
                        
                            setInterval(updateTableForRate, 3000); 
                        </script>
                </div>
            </div>
              </div>
              
              <div class="tab-pane fade" id="ticket_status-tab-pane" role="tabpanel" aria-labelledby="ticket_status-tab" tabindex="0">
                  <div class="table-responsive pt-2">
                <div id="tableForStatus">
                        <script>
                            function updateTableForStatus() {
                                $.ajax({
                                    url: 'status_logs.php',
                                    type: 'GET',
                                    dataType: 'json',
                                    success: function(data) {
                                        var tableContent = '';
                        
                                        data.forEach(function(row) {
                                            tableContent += `
                                                <tr class="text-center align-middle text-wrap">
                                                    <td data-column="0">${row.ticket_number}</td>
                                                    <td data-column="1">${row.full_name}</td>
                                                    <td data-column="2">${row.subject}</td>
                                                    <td data-column="3">${row.date_created}</td>
                                                </tr>`;
                                        });
                        
                                        $('#tableForStatus').html(`
                                            <table class="table text-start align-middle table-bordered table-hover mb-0">
                                                <thead>
                                                    <tr class="text-dark text-center">
                                                        <th scope="col" data-colum="0"> Ticket Number</th>
                                                        <th scope="col" data-colum="1"> Name </th>
                                                        <th scope="col" data-colum="2"> Subject </th>
                                                        <th scope="col" data-colum="3"> Date Created </th>
                                                    </tr>
                                                </thead>
                                                <tbody>${tableContent}</tbody>
                                            </table>`
                                        );
                                    },
                                    error: function() {
                                        console.error("An error occurred while fetching data.");
                                    }
                                });
                            }
                        
                            // Call the function to update the table initially
                            updateTableForStatus();
                        
                            setInterval(updateTableForStatus, 3000); 
                        </script>
                </div>
            </div>
              </div>
              
            </div>
          
        </div>
    </div>
</main>


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
</body>

</html>
<?php mysqli_close($conn); ?>
