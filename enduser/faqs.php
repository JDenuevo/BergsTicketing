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
<title>FAQs | BITS</title>
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

</head>

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
                        <a class="nav-link px-lg-3 fw-bold active" href="faqs.php"><i class="fa-solid fa-file-circle-question"></i> FAQ</a>
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
                        <a class="nav-link px-lg-3 fw-bold active" href="faqs.php"><i class="fa-solid fa-file-circle-question"></i> FAQ</a>
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
    <div class="container-fluid pt-2 px-5">
        <div class="card col-8">
          <div class="card-body">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Solution Home</a></li>
                <li class="breadcrumb-item"><a href="#">General</a></li>
                <li class="breadcrumb-item"><a href="#">SAGE 50</a></li>
              </ol>
            </nav>
            
            <h4>How to Create a New Company in SAGE 50</h4>
            
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <label style="color: grey; mb-3">Created by SBA Support: </label>
                </div>
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-print"></i>                    
                    <p class="card-text ms-2">Print</p>
                </div>
            </div>
            
            <label style="color: grey;">Modified on: Saturday, March 23, 2024 at 12:00am </label>
          </div>
        </div>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('faqSearchInput');
            const faqContainer = document.getElementById('faqContainer');
            const faqs = faqContainer.querySelectorAll('.card'); // Assuming each FAQ is wrapped in a card element

            searchInput.addEventListener('input', function() {
                const searchTerm = searchInput.value.trim().toLowerCase();

                faqs.forEach(function(faq) {
                    const faqQuestion = faq.querySelector('.card-title').textContent.toLowerCase();
                    const faqAnswer = faq.querySelector('.text-muted').textContent.toLowerCase();

                    if (faqQuestion.includes(searchTerm) || faqAnswer.includes(searchTerm)) {
                        faq.style.display = 'block';
                    } else {
                        faq.style.display = 'none';
                    }
                });
            });
        });
</script>

</div>
            <?php
            $sql = "SELECT * FROM bits_faq";
            if($rs=$conn->query($sql)){
                while ($row=$rs->fetch_assoc()) {
            ?>
    <!-- Modal -->
    <div class="modal fade" id="question_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $row['question'] ?></h1>
          </div>
          <div class="modal-body">
            <small class="text-muted"><?php echo $row['answer'];  ?></small>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
             <?php
                }
                }
              ?>
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
    //   let params = {};

    //   let regex = /([^&=]+)=([^&]*)/g,
    //     m;

    //   while ((m = regex.exec(location.href))) {
    //     params[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
    //   }
    //   if (Object.keys(params).length > 0) {
    //     localStorage.setItem('authInfo', JSON.stringify(params));
    //   }
    //   let info = JSON.parse(localStorage.getItem('authInfo'));

    //   console.log(JSON.parse(localStorage.getItem('authInfo')));
    //   console.log(info['access_token']);
    //   console.log(info['expires_in']);

    //   fetch('https://www.googleapis.com/oauth2/v3/userinfo', {
    //     headers: {
    //       Authorization: `Bearer ${info['access_token']}`,
    //     },
    //   })
    //     .then((data) => data.json())
    //     .then((info) => {
    //       console.log(info);

    //       if (info.name) {
    //         document.getElementById('name').innerHTML += info.name;
    //       }

    //       if (info.picture) {
    //         document.getElementById('imageURL').setAttribute('src', info.picture);
    //       }

    //       if (info.email) {
    //         console.log(info.email);

   
    //         const xhr = new XMLHttpRequest();
    //         xhr.open('POST', 'gmaildb_submission.php', true);
    //         xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    //         xhr.onreadystatechange = function () {
    //           if (xhr.readyState === 4 && xhr.status === 200) {
             
    //             console.log(xhr.responseText);

             
    //             redirectToEmailPage(info.email);
    //           }
    //         };

           
    //         const data = `name=${encodeURIComponent(info.name)}&email=${encodeURIComponent(info.email)}&picture=${encodeURIComponent(info.picture)}`;

    
    //         xhr.send(data);
    //       } else {
  
    //         redirectToEmailPage('');
    //       }
    //     });

    
    //   function redirectToEmailPage(email) {
    //       if (email.trim() === '') {
    //         return; 
    //       }
        
    //       const urlParams = new URLSearchParams(window.location.search);
    //       const hasEmailParam = urlParams.has('email');
    //       const baseUrl = window.location.href.split('?')[0];
    //       const encodedEmail = encodeURIComponent(email);
        
    //       if (hasEmailParam) {
    //         // Update the email query parameter value
    //         urlParams.set('email', encodedEmail);
    //       } else {
    //         // Add the email query parameter
    //         urlParams.append('email', encodedEmail);
    //       }
        
    //       const newUrl = baseUrl + (urlParams.toString() ? '?' + urlParams.toString() : '');
    //       window.location.href = newUrl;
    //     }

     </script>
    
</body>
</html>
<?php mysqli_close($conn); ?>