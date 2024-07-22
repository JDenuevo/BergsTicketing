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
                        <a class="nav-link px-lg-3" aria-current="page" href="dashboard.php"><i class="fa-solid fa-house"></i> Home</a>
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
                    </ul>
                    
                    <?php include 'notify.php'; ?>
               
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
                        <a class="nav-link px-lg-3" href="recent_tickets.php"><i class="fa-solid fa-clock-rotate-left"></i> Recent Tickets</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link px-lg-3" href="histick.php"><i class="fa-solid fa-file-lines"></i> Ticket History</a>
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
    <div class="container-fluid px-4">
      <div class="row bg-light rounded align-items-center justify-content-center mx-0">
          <h1 class="text-primary"> Edit Profile </h1>      
    <div class="card pt-3 shadow">
        <div class="card-body">
            
        <form action="update_profile.php" method="post" enctype="multipart/form-data">
                <div class="rounded float-start px-5 mx-1" id="upload">
                    <?php
                    $sql = "SELECT * FROM bits_login WHERE email = '$email1' LIMIT 1";
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
                    <div id="idbox" class="shadow border border-opacity-50" style="width: 200px; height: 200px;">
                        <img src="<?php echo $src; ?>" style="width: 200px; height: 200px;">
                    </div>
            
                    <!-- File input to upload the new profile picture -->
                    <input type="file" name="image" accept="image/*" class="form-control form-control-sm mt-2" id="profile_picture_input">
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
            <div class="row row-cols-3">
                <input class="form-control" type="hidden" name="id" value="<?php
                        $sql = "SELECT * FROM bits_login WHERE email = '$email1' LIMIT 1";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                          $id = $row['id'];
                          }
                          if (!empty($id)) {
                                echo $id;
                            } else {
                                echo '';
                            }
                        ?>">
                <div class="col-12 col-lg-4 col-md-12 col-sm-12">
                    <input class="form-control" type="text" name="fullname" placeholder="Juan Dela Cruz" value="<?php
                        $sql = "SELECT * FROM bits_login WHERE email = '$email1' LIMIT 1";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                          $name = $row['fullname'];
                          }
                          if (!empty($name)) {
                                echo $name;
                            } else {
                                echo '';
                            }
                        ?>">
                    <center><label>Fullname</label></center>
                </div>
                <div class="col-12 col-lg-4 col-md-12 col-sm-12">
                    <input class="form-control" type="text" name="username" placeholder="juandelacruz1999" value="<?php
                        $sql = "SELECT * FROM bits_login WHERE email = '$email1' LIMIT 1";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                          $uname = $row['username'];
                          }
                          if (!empty($uname)) {
                                echo $uname;
                            } else {
                                echo '';
                            }
                        ?>">
                    <center><label>Username</label></center>
                </div>
                <div class="col-12 col-lg-4 col-md-12 col-sm-12">
                    <input class="form-control" type="password" name="password" minlength="6">
                    <center><label>Password</label></center>
                </div>
            </div><br>
            <div class="row row-cols-2 px-2">
                <div class="col-12 col-lg-6 col-md-12 col-sm-12">
                    <input class="form-control" type="email" name="email" placeholder="example@gmail.com" value="<?php
                        $sql = "SELECT * FROM bits_login WHERE email = '$email1' LIMIT 1";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                          $email = $row['email'];
                          }
                          if (!empty($email)) {
                                echo $email;
                            } else {
                                echo '';
                            }
                        ?>" readonly>
                    <center><label>Email</label></center>
                </div>
               <div class="col-12 col-lg-6 col-md-12 col-sm-12">
                    <select class="form-control" name="department">
                        <option disabled>Select your Department</option>
                        <?php
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
            </div><br>
            <div class="m-3 d-flex justify-content-end">
                <button class="btn btn-primary btn-sm text-top" type="submit"> <i class="fa-solid fa-user-pen"></i> Update Profile </button>
            </div>
        </form>
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
    </div>
      </div>
    </div>
    <!-- Blank End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa-solid fa-arrow-up"></i></a>
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
    <script>
      let params = {};

      let regex = /([^&=]+)=([^&]*)/g,
        m;

      while ((m = regex.exec(location.href))) {
        params[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
      }
      if (Object.keys(params).length > 0) {
        localStorage.setItem('authInfo', JSON.stringify(params));
      }
      let info = JSON.parse(localStorage.getItem('authInfo'));

      console.log(JSON.parse(localStorage.getItem('authInfo')));
      console.log(info['access_token']);
      console.log(info['expires_in']);

      fetch('https://www.googleapis.com/oauth2/v3/userinfo', {
        headers: {
          Authorization: `Bearer ${info['access_token']}`,
        },
      })
        .then((data) => data.json())
        .then((info) => {
          console.log(info);

          if (info.name) {
            document.getElementById('name').innerHTML += info.name;
          }

          if (info.picture) {
            document.getElementById('imageURL').setAttribute('src', info.picture);
          }

          if (info.email) {
            console.log(info.email);

            // Send the values to a PHP script using XMLHttpRequest
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'gmaildb_submission.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
              if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle the response from the PHP script if needed
                console.log(xhr.responseText);

                // Redirect to the URL with the email parameter
                redirectToEmailPage(info.email);
              }
            };

            // Prepare the data to be sent
            const data = `name=${encodeURIComponent(info.name)}&email=${encodeURIComponent(info.email)}&picture=${encodeURIComponent(info.picture)}`;

            // Send the POST request
            xhr.send(data);
          } else {
            // Redirect to the URL without the email parameter
            redirectToEmailPage('');
          }
        });

      // Function to redirect to the URL with the email parameter
      function redirectToEmailPage(email) {
          if (email.trim() === '') {
            return; // Do nothing if the email is empty or contains only whitespace
          }
        
          const urlParams = new URLSearchParams(window.location.search);
          const hasEmailParam = urlParams.has('email');
          const baseUrl = window.location.href.split('?')[0];
          const encodedEmail = encodeURIComponent(email);
        
          if (hasEmailParam) {
            // Update the email query parameter value
            urlParams.set('email', encodedEmail);
          } else {
            // Add the email query parameter
            urlParams.append('email', encodedEmail);
          }
        
          const newUrl = baseUrl + (urlParams.toString() ? '?' + urlParams.toString() : '');
          window.location.href = newUrl;
        }

    </script>
        <script>
    if (window.performance) {
      if (performance.navigation.type == 1) {
        // Reloaded the page using the browser's reload button
        window.location.href = "editprof.php";
      }
    }</script>
</html>
<?php mysqli_close($conn); ?>