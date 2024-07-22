<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign In | BERGS IT Ticketing System</title>
<link rel="stylesheet" href="css/effect.css">

<link rel="icon" href="admin/">
<!-- Main CSS -->
<link rel="stylesheet" href="css/style.css">

<!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

<!-- JS CSS -->
<link rel="stylesheet" href="js/bootstrap.js">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="bootstrap/bootstrap.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="script.js"></script>
</head>

<body style="background-image: url('img/bg.jpg'); background-repeat: no-repeat; background-size: cover;">

<style>
.field-icon {
position: absolute;
right: 10px;
top: 50%;
transform: translateY(-50%);
cursor: pointer;
}

#password-field {
padding-right: 30px;
}

/* body {
  background-color: #EBEBEB;
  /* background-image: url('img/bg.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
} */

a.text-decoration-none{
    color: black;
}

a.text-decoration-none:hover {
    color: #009CFF; /* Change to your desired hover color */
    text-decoration: underline;
  }

</style>
<form class="" action="user_signin.php" method="post">
<section class="vh-100">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body text-center shadow-lg">
            <img src="./admin/uploads/sl-logo.png" class="img-fluid w-25 mb-2">
            <h3 class = "fw-bold">Sign In</h3>
            <br>
            <div class="container mx-1">
              <div class="form-group">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="username" id="username" placeholder="Username" value = "<?php if(isset($_COOKIE['fnbkn'])) echo $_COOKIE['fnbkn']; ?>" required>
                  <label for="floatingInput">Username</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-floating position-relative mb-4">
                  <input id="password" type="password" class="form-control" name="password" placeholder="Password" value="<?php if(isset($_COOKIE['qbtuyqug'])) echo $_COOKIE['qbtuyqug']; ?>" required>
                  <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  <label for="floatingPassword">Password</label>
                </div>
              </div>
              <label class="text-muted fw-bold mb-2">or</label><br>
              
              <button class="btn btn-light rounded-pill" onclick="signIn()" type="button"><img src="img/google.png" style="width: 25px;">  Sign in with Google</button>
              
              <div class="d-flex align-items-center justify-content-between my-4">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name ="remember" <?php if(isset($_COOKIE['fnbkn'])){echo "checked='checked'"; } ?> id="remember">
                  <label class="form-check-label" for="exampleCheck1">Stay signed in</label>
                </div>
              </div>


              <button type="submit" class="btn btn-primary w-100 mb-4 rounded-pill" id="signin-btn" style="display: none;">
                <i class="fa-solid fa-arrow-right"></i> Sign In
              </button>


            </div>


            <!-- <a class="text-decoration-none" href="">Can't Sign In?</a>
            <br> -->
            <a class="text-decoration-none" href="signup.php">Create Account</a>
        </div>
      </div>
    </div>
  </div>
</section>
</form>

<!-- Sign In End -->
<?php
		// Display error messages if they were passed in the URL
		if (isset($_GET['errors'])) {
			$errors = explode(',', $_GET['errors']);
			foreach ($errors as $error) {
				echo "<script>Swal.fire({
						icon: 'error',
						title: 'ERROR',
						text: '$error'
					});</script>";

        }
        unset($_GET['errors']);
		}
	?>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>


<script>

$('.toggle-password').click(function() {
  var input = $($(this).attr('toggle'));
  if (input.attr('type') === 'password') {
    input.attr('type', 'text');
    $(this).removeClass('fa-eye').addClass('fa-eye-slash');
  } else {
    input.attr('type', 'password');
    $(this).removeClass('fa-eye-slash').addClass('fa-eye');
  }
});

</script>

</body>
</html>
