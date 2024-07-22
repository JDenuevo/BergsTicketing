<?php 
include 'authentication.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>System Modification | BITS</title>
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
        <a type="button" class="nav-item nav-link text-truncate" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-flag me-2" style="color: #ff0000;"></i>Reports</a>
        <a href="account.php" class="nav-item nav-link text-truncate" data-toggle="tooltip" title="Account Management"><i class="fa-solid fa-user me-2" style="color: #000000;"></i>Account Management</a><hr>
        <a href="system.php" class="nav-item nav-link text-truncate active" data-toggle="tooltip" title="System Modification"><i class="fa-solid fa-sliders me-2" style="color: #71706E;"></i>System Modification</a>

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
       <img src="../img/admin.png" class="img-fluid" width="100px">
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
    
     <!-- Blank Start -->
    <main class="col-lg-12 col-md-12 ms-sm-auto ps-5">
        <div class="container-fluid px-4 py-4">
            <div class="row">
               <?php 
                $sql1 = "SELECT * FROM bits_sys_modify WHERE isActive = 1 AND upload_dir LIKE '%uploads/bg-%' LIMIT 1";
                $result1 = $conn->query($sql1);
                while ($row5 = $result1->fetch_assoc()) {
                    $upload_bg = $row5['upload_dir'];
                }
                ?>
                
                <form id="background-form" enctype="multipart/form-data">
                    <div="container">
                        <h6 class="mb-0">Modify Log-in Background Image</h6>
                        <hr>
                        <div class="row">
                            <div class="col-12 mx-auto w-50">
                                <div class="card">
                                    <img src="<?php echo $upload_bg; ?>" class="img-fluid" id="preview-image">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row py-2 w-50 mx-auto">
                            <div class="col-5 py-2">
    						    <div class="position-relative overflow-hidden">
                                  <label for="file-background">Upload Background:</label>
                                  <div class="file input-group">
                                    <span class="input-group-btn my-1">
                                      <span class="btn btn-sm btn-secondary">
                                        <i class="fa-solid fa-upload"></i>
                                        <input type="file" id="file-background" name="background" accept="image/png, image/jpeg" class="form-control form-control-sm position-absolute opacity-0 right-0 top-0">
                                      </span>
                                    </span>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-7 py-2">
                                <div class="form-group">
                                    <label for="background-select">Select from your previous uploads:</label>
                                   <select class="form-control form-control-sm" name="background_select" id="background-select">
                                        <option selected value="" selected disabled>Select Here</option>
                                        <?php 
                                        $sql1 = "SELECT * FROM bits_sys_modify WHERE isActive = 0 AND upload_dir LIKE '%uploads/bg-%'";
                                        $result1 = $conn->query($sql1);
                                        while ($row5 = $result1->fetch_assoc()) {
                                            $optionValue = $row5['upload_dir'];
                                            ?>
                                            <option value="<?php echo $optionValue; ?>"><?php echo str_replace("uploads/bg-", "", $optionValue); ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mx-auto w-50">
                            <div class="col-12">
                                <button type="submit" class="btn btn-sm btn-primary text-center w-100"><i class="fa-solid fa-floppy-disk"></i> Upload File</button>
                            </div>
                        </div>
                    </div>
                </form>
                
                <script>
                    // Function to update the preview image
                    function updatePreviewImage() {
                        const selectElement = document.getElementById('background-select');
                        const selectedOptionValue = selectElement.value;
                        const previewImage = document.getElementById('preview-image');
                        
                        // Update the preview image with the selected image URL
                        previewImage.src = selectedOptionValue;
                        
                        // Reset the file input value
                        document.getElementById('file-background').value = '';
                    }
                
                    // Add an event listener to the select element
                    document.getElementById('background-select').addEventListener('change', function () {
                        const selectElement = this;
                        const selectedOptionValue = selectElement.value;
                        const previewImage = document.getElementById('preview-image');
                    
                        // Update the preview image with the selected image URL
                        previewImage.src = selectedOptionValue;
                    
                        // Reset the file input value
                        document.getElementById('file-background').value = '';
                    
                        // Send an AJAX request to update isActive
                        const formData = new FormData();
                        formData.append('selectedOptionValue', selectedOptionValue);
                    
                        fetch('update_isactive.php', {
                            method: 'POST',
                            body: formData,
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Background image updated successfully.');
                                location.reload();
                            } else {
                                alert('Error updating Background.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                    });
                    
                    // Add an event listener to the file input (for uploading new images)
                    document.getElementById('file-background').addEventListener('change', function () {
                        // Update the preview image when a file is selected
                        const fileInput = this;
                        if (fileInput.files && fileInput.files[0]) {
                            const reader = new FileReader();
                    
                            reader.onload = function (e) {
                                document.getElementById('preview-image').src = e.target.result;
                            };
                    
                            reader.readAsDataURL(fileInput.files[0]);
                        }
                    });
                    
                    document.getElementById('background-form').addEventListener('submit', function (e) {
                        e.preventDefault();
                        const formData = new FormData(this);
                    
                        fetch('upload.php', {
                            method: 'POST',
                            body: formData,
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Background image uploaded successfully.');
                                location.reload();
                            } else {
                                alert('Error uploading background image.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                    });
                </script>
              </div>
              
              
              
              
              <div class="row-fluid px-4 py-4">
               <?php 
                $sql1 = "SELECT * FROM bits_sys_modify WHERE isActive = 1 AND upload_dir LIKE '%uploads/sl-%' LIMIT 1";
                $result1 = $conn->query($sql1);
                while ($row5 = $result1->fetch_assoc()) {
                    $upload_syslogo = $row5['upload_dir'];
                }
                ?>
                <hr>
                <form id="systemlogo-form" enctype="multipart/form-data">
                    <div="container">
                        <h6 class="mb-0">Modify System Logo</h6>
                        <hr>
                        <div class="row">
                            <div class="col-12 mx-auto w-50">
                                <div class="card">
                                    <img src="<?php echo $upload_syslogo; ?>" class="img-fluid" id="preview-system-logo">
                                </div>
                            </div>
                        </div>
                        <div class="row py-2 w-50 mx-auto">
                            <div class="col-5 py-2">
    						    <div class="position-relative overflow-hidden">
                                  <label for="file-background">Upload System Logo:</label>
                                  <div class="file input-group">
                                    <span class="input-group-btn my-1">
                                      <span class="btn btn-sm btn-secondary">
                                        <i class="fa-solid fa-upload"></i>
                                        <input type="file" id="file-system-logo" name="system_logo" accept="image/png, image/jpeg" class="form-control form-control-sm position-absolute opacity-0 right-0 top-0">
                                      </span>
                                    </span>
                                  </div>
                                </div>
                            </div>
                            <div class="col-7 py-2">
                                <div class="form-group">
                                    <label for="system-logo-select">Select from your previous uploads:</label>
                                   <select class="form-control form-control-sm" name="system-logo-select" id="system-logo-select">
                                        <option selected value="" selected disabled>Select Here</option>
                                        <?php 
                                        $sql1 = "SELECT * FROM bits_sys_modify WHERE isActive = 0 AND upload_dir LIKE '%uploads/sl-%'";
                                        $result1 = $conn->query($sql1);
                                        while ($row5 = $result1->fetch_assoc()) {
                                            $optionValue = $row5['upload_dir'];
                                            ?>
                                            <option value="<?php echo $optionValue; ?>"><?php echo str_replace("uploads/sl-", "", $optionValue); ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mx-auto w-50">
                            <div class="col-12">
                                <button type="submit" class="btn btn-sm btn-primary text-center w-100"><i class="fa-solid fa-floppy-disk"></i> Upload File</button>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                </form>
              <script>
                // Function to update the preview image
                function updatePreviewImage() {
                    const selectElement = document.getElementById('system-logo-select');
                    const selectedOptionValue = selectElement.value;
                    const previewImage = document.getElementById('preview-system-logo');
            
                    // Update the preview image with the selected image URL
                    previewImage.src = selectedOptionValue;
            
                    // Reset the file input value
                    document.getElementById('file-system-logo').value = '';
                }
            
                // Add an event listener to the select element
                document.getElementById('system-logo-select').addEventListener('change', function () {
                    const selectElement = this;
                    const selectedOptionValue = selectElement.value;
                    const previewImage = document.getElementById('preview-system-logo');
            
                    // Update the preview image with the selected image URL
                    previewImage.src = selectedOptionValue;
            
                    // Reset the file input value
                    document.getElementById('file-system-logo').value = '';
            
                    // Send an AJAX request to update isActive
                    const formData = new FormData();
                    formData.append('selectedOptionValue', selectedOptionValue);
            
                    fetch('update_isactive_systemlogo.php', {
                        method: 'POST',
                        body: formData,
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('System logo updated successfully.');
                            location.reload();
                        } else {
                            alert('Error updating system logo.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                });
            
                // Add an event listener to the file input (for uploading new images)
                document.getElementById('file-system-logo').addEventListener('change', function () {
                    // Update the preview image when a file is selected
                    const fileInput = this;
                    if (fileInput.files && fileInput.files[0]) {
                        const reader = new FileReader();
            
                        reader.onload = function (e) {
                            document.getElementById('preview-system-logo').src = e.target.result;
                        };
            
                        reader.readAsDataURL(fileInput.files[0]);
                    }
                });
            
                document.getElementById('systemlogo-form').addEventListener('submit', function (e) {
                    e.preventDefault();
                    const formData = new FormData(this);
            
                    fetch('upload_system_logo.php', {
                        method: 'POST',
                        body: formData,
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('System logo uploaded successfully.');
                            location.reload();
                        } else {
                            alert('Error uploading system logo.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                });
            </script>
            
            
            
             <div class="row-fluid px-4 py-4">
                   <?php 
                    $sql1 = "SELECT * FROM bits_sys_modify WHERE isActive = 1 AND upload_dir LIKE '%uploads/al-%' LIMIT 1";
                    $result1 = $conn->query($sql1);
                    while ($row5 = $result1->fetch_assoc()) {
                        $upload_adminlogo = $row5['upload_dir'];
                    }
                    ?>
                    <hr>
                    <form id="adminlogo-form" enctype="multipart/form-data">
                        <div="container">
                            <h6 class="mb-0">Modify Admin Logo</h6>
                            <hr>
                            <div class="row">
                                <div class="col-12 mx-auto w-50">
                                    <div class="card">
                                        <img src="<?php echo $upload_adminlogo; ?>" class="img-fluid" id="preview-admin-logo">
                                    </div>
                                </div>
                            </div>
                            <div class="row py-2 w-50 mx-auto">
                                <div class="col-5 py-2">
        						    <div class="position-relative overflow-hidden">
                                      <label for="file-background">Upload Admin Logo:</label>
                                      <div class="file input-group">
                                        <span class="input-group-btn my-1">
                                          <span class="btn btn-sm btn-secondary">
                                            <i class="fa-solid fa-upload"></i>
                                            <input type="file" id="file-admin-logo" name="admin_logo" accept="image/png, image/jpeg" class="form-control form-control-sm position-absolute opacity-0 right-0 top-0">
                                          </span>
                                        </span>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-7 py-2">
                                    <div class="form-group">
                                        <label for="system-logo-select">Select from your previous uploads:</label>
                                       <select class="form-control form-control-sm" name="admin-logo-select" id="admin-logo-select">
                                            <option selected value="" selected disabled>Select Here</option>
                                            <?php 
                                            $sql1 = "SELECT * FROM bits_sys_modify WHERE isActive = 0 AND upload_dir LIKE '%uploads/al-%'";
                                            $result1 = $conn->query($sql1);
                                            while ($row5 = $result1->fetch_assoc()) {
                                                $optionValue = $row5['upload_dir'];
                                                ?>
                                                <option value="<?php echo $optionValue; ?>"><?php echo str_replace("uploads/al-", "", $optionValue); ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto w-50">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-sm btn-primary text-center w-100"><i class="fa-solid fa-floppy-disk"></i> Upload File</button>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </form>
                  <script>
                    // Function to update the preview image
                    function updatePreviewImage() {
                        const selectElement = document.getElementById('admin-logo-select');
                        const selectedOptionValue = selectElement.value;
                        const previewImage = document.getElementById('preview-admin-logo');
                
                        // Update the preview image with the selected image URL
                        previewImage.src = selectedOptionValue;
                
                        // Reset the file input value
                        document.getElementById('file-admin-logo').value = '';
                    }
                
                    // Add an event listener to the select element
                    document.getElementById('admin-logo-select').addEventListener('change', function () {
                        const selectElement = this;
                        const selectedOptionValue = selectElement.value;
                        const previewImage = document.getElementById('preview-admin-logo');
                
                        // Update the preview image with the selected image URL
                        previewImage.src = selectedOptionValue;
                
                        // Reset the file input value
                        document.getElementById('file-admin-logo').value = '';
                
                        // Send an AJAX request to update isActive
                        const formData = new FormData();
                        formData.append('selectedOptionValue', selectedOptionValue);
                
                        fetch('update_isactive_adminlogo.php', {
                            method: 'POST',
                            body: formData,
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Admin logo updated successfully.');
                                location.reload();
                            } else {
                                alert('Error updating Admin logo.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                    });
                
                    // Add an event listener to the file input (for uploading new images)
                    document.getElementById('file-admin-logo').addEventListener('change', function () {
                        // Update the preview image when a file is selected
                        const fileInput = this;
                        if (fileInput.files && fileInput.files[0]) {
                            const reader = new FileReader();
                
                            reader.onload = function (e) {
                                document.getElementById('preview-admin-logo').src = e.target.result;
                            };
                
                            reader.readAsDataURL(fileInput.files[0]);
                        }
                    });
                
                    document.getElementById('adminlogo-form').addEventListener('submit', function (e) {
                        e.preventDefault();
                        const formData = new FormData(this);
                
                        fetch('upload_admin_logo.php', {
                            method: 'POST',
                            body: formData,
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Admin logo uploaded successfully.');
                                location.reload();
                            } else {
                                alert('Error uploading Admin logo.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                    });
                </script>
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