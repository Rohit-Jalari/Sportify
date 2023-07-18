<!DOCTYPE html>
<html>
<html
lang="en"
class="light-style layout-menu-fixed"
dir="ltr"
data-theme="theme-default"
data-assets-path="assets/"
data-template="vertical-menu-template-free"
>
<head>
  <?php include('head.php'); ?>
  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
</head>

<body>
  <?php
    //connect to database
  require_once("dbCon.php");

    //checks if signUp button is clicked or not
  if(isset($_POST['signUp'])) {

      //retrives value from form
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $cpassword = htmlspecialchars($_POST['cpassword']);
    $profilePath = 'default_profile.png';

      //validates password and confirm password
    if($password === $cpassword) {

        //query for search email
      $emailQuery = " SELECT * FROM `user` WHERE `email` = '$email' ";

        //query search for email in database
      $emailSearch = mysqli_query($con,$emailQuery);

        //returns the no.of rows where email is found i.e returns 1 if email is found in DB
      if(mysqli_num_rows($emailSearch) == 0) {

          //hashing the password
        $hPassword = password_hash($password, PASSWORD_BCRYPT);

          //query to enter data in database
        $insertQuery = " INSERT INTO `user` (`first_name`,`last_name`,`email`,`password`,`profile_path`) VALUES ('$fname','$lname','$email','$hPassword','$profilePath') " ;

          //entering data in database
        $insert = mysqli_query($con,$insertQuery);

        if($insert) { ?>
          <script>
            location.replace("login.php");
          </script>
        <?php } else {
          $_SESSION['error'] = "Account Creation Failed !!!";
        }
      } else { 
        $_SESSION['error'] = "Account Already Exits!!!";
      }
    } else {
      $_SESSION['error'] = "Entered Passwords Didn't Match!!!";   
    }
  }
  ?>



  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register Card -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="index.html" class="app-brand-link gap-2">
                <span class="app-brand-logo">
                  <a href="index.php" class="py-2">
                    <span class="logo text-dark">Sportify</span>
                  </a>
                </span>
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Adventure starts here 🚀</h4>
            <p class="mb-4">Make your app management easy and fun!</p>

            <form id="formAuthentication" class="mb-3" action="" method="POST">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input
                type="text"
                class="form-control"
                id="username"
                name="username"
                placeholder="Enter your username"
                autofocus
                />
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" />
              </div>
              <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">Password</label>
                <div class="input-group input-group-merge">
                  <input
                  type="password"
                  id="password"
                  class="form-control"
                  name="password"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="password"
                  />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-3 form-password-toggle">
                <label class="form-label" for="cpassword">Confirm Password</label>
                <div class="input-group input-group-merge">
                  <input
                  type="password"
                  id="cpassword"
                  class="form-control"
                  name="cpassword"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="password"
                  />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>

              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                  <label class="form-check-label" for="terms-conditions">
                    I agree to
                    <a href="javascript:void(0);">privacy policy & terms</a>
                  </label>
                </div>
              </div>
              <button class="btn btn-primary d-grid w-100" name="signUp">Sign up</button>
            </form>

            <p class="text-center">
              <span>Already have an account?</span>
              <a href="login.php">
                <span>Sign in instead</span>
              </a>
            </p>
            <div class="d-flex justify-content-center">
              <button type="button" class="btn btn-label-secondary" onclick="history.back()">Back</button>
            </div>
          </div>
        </div>
        <!-- Register Card -->
      </div>
    </div>
  </div>
</body>
<?php include('script.php')?>
<script type="text/javascript">
  //snippet from stackoverflow to prevent auto submission of form after refresh
  if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
</script>
</html>

