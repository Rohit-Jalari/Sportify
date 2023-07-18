<!DOCTYPE html>
<html>
<html
lang="en"
class="light-style layout-menu-fixed"
dir="ltr"
data-theme="theme-default"
data-assets-path="../sneat/assets/"
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
    require_once('dbCon.php');

    //checks if Login buttons is clicked or not
    if(isset($_POST['login'])) {
      ?>
      <script>
        console.log("set");
      </script>
      <?php

      //retrieve values from form
      $email = htmlspecialchars($_POST['email']);
      $password = htmlspecialchars($_POST['password']);

      //query to search email in user
      $emailQuery = " SELECT * FROM `user` WHERE `email` = '$email' ";

      //query search for email in database
      $emailSearch = mysqli_query($con,$emailQuery);

    if(mysqli_num_rows($emailSearch)) {

        //returns associative array with data of respective row of email in DB
        $recordPointer = mysqli_fetch_assoc($emailSearch);
        //retrives password from database through associative array
        $dbPassword = $recordPointer['password'];

        //validates entered password and hashed password in database
        //password_verify($password, $dbPassword)
        if(password_verify($password, $dbPassword)) {

          //sets session
          $_SESSION['loggedIn'] = true;
          $_SESSION['userFirstName'] = $recordPointer['first_name'];
          $_SESSION['userLastName'] = $recordPointer['last_name'];
          $_SESSION['userEmail'] = $recordPointer['email'];
          $_SESSION['userId'] = $recordPointer['user_id'];
          $_SESSION['profilePath'] = $recordPointer['profile_path'];
        ?>
          <script>
            location.replace("index.php");
          </script>
        <?php } else {

          $_SESSION['error'] = "Incorrect Password !!!";
        }
      } else {?>        <script>
            alert("Account doesnot exist");
          </script>
          <?php
        $_SESSION['error'] = "Account Doesn't Exists !!!";
      } 
  } ?>



  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="index.php" class="app-brand-link gap-2">
                <span class="app-brand-logo">
                  <a href="index.php" class="py-2">
                    <span class="logo text-dark">Sportify</span>
                  </a>
                </span>
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Welcome to <span class="fw-bold mark">Sportify !</span> 👋</h4>
            <p class="mb-4">Please sign-in to your account and start the adventure</p>

            <form id="formAuthentication" class="mb-3" action="" method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Email or Username</label>
                <input
                type="text"
                class="form-control"
                id="email"
                name="email-username"
                placeholder="Enter your email or username"
                autofocus
                />
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Password</label>
                  <a href="forgotPassword.php">
                    <small>Forgot Password?</small>
                  </a>
                </div>
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
              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="remember-me" />
                  <label class="form-check-label" for="remember-me"> Remember Me </label>
                </div>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" name="login">Sign in</button>
              </div>
            </form>

            <p class="text-center">
              <span>New on our platform?</span>
              <a href="register.php">
                <span>Create an account</span>
              </a>
            </p>
            <div class="d-flex justify-content-center">
              <button type="button" class="btn btn-label-secondary" onclick="history.back()">Back</button>
            </div>
          </div>
        </div>
        <!-- /Register -->
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

