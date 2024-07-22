<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up | BERGS IT Ticketing System</title>
<link rel="stylesheet" href="css/effect.css">

<link rel="icon" href="./admin/uploads/sl-logo.png">

<!-- Login Page CSS -->
<link rel="stylesheet" href="css/style.css">

<!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

<!-- JS CSS -->
<link rel="stylesheet" href="js/bootstrap.js">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="bootstrap/bootstrap.css">

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
<form class="" action="standard_signup.php" method="post">
  <section class="vh-100">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body text-center shadow-lg">
            <img src="./admin/uploads/sl-logo.png" class="img-fluid w-25 mb-2">
            <h3 class = "fw-bold">Create your account</h3>
            <br>
            <div class="container mx-1">
            <div class="form-group">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Fullname" value="">
                <label for="floatingInput">Full Name</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="">
                <label for="floatingInput">Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                <label for="floatingInput">Email Address</label>
                <span style="color: red; float: left;"></span>
              </div>
            </div>
            <div class="form-group">
            <div class="form-floating mb-3">
                <select class="form-control" name="department" id="department">
                    <option value="" selected disabled></option>
                </select>
                <label for="floatingInput">Select your Department</label>
            </div>
        </div>

            <div class="form-group">
              <div class="form-floating position-relative mb-4">
                <input id="password" type="password" class="form-control" name="password" placeholder="Password" minlength="6">
                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                <label for="floatingPassword">Password</label>
              </div>
            </div>
              
              <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                  <label class="form-check-label" for="exampleCheck1">Receive news, special offers, feedback surveys, and invitations from BERGS.</label>
                </div>
              </div>

              <button type="submit" class="btn btn-primary w-100 mb-4 rounded-pill" id="signin-btn" style="display: none;" name="signup">
                <i class="fa-solid fa-arrow-right"></i> Sign Up
              </button>
            </div>

            <a class="text-decoration-none" href="signing_in.php">Already have an account?</a>

        </div>
      </div>
    </div>
  </div>
</section>
</form>
<!-- Sign In End -->


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  const fullNameInput = document.querySelector('input[name="fullname"]');
      fullNameInput.addEventListener('keypress', function(event) {
          const key = event.key;
          const regex = /[a-z A-Z]/;
      if (!regex.test(key)) {
            event.preventDefault();
        }
  });
</script>
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
