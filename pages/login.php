<?php
session_start();
unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
  data-template="vertical-menu-template-free">

<head>
  <?php include('../includes/head.php'); ?>
  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
  <style>
    .Input.error input,
    .Input.error span {
      border: 2px solid #ff6e63;
    }

    .Input>small {
      /* display: block; */
      color: red;
      display: none;
      font-size: 14px;
    }

    .Input.error small {
      display: block;
    }
  </style>
</head>

<body>
  <?php
  require_once('../config/dbCon.php');

  //checks if Login buttons is clicked or not
  if (isset($_POST['login']) && $_POST['login'] == 'login') {

    //retrieve values from form
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    //database
    $userCollection = $databaseCon->Users;
    $emailFilter = ["email" => $email];

    $emailMatch = $userCollection->countDocuments($emailFilter);

    if ($emailMatch == 1) {
      $userRecord = $userCollection->findOne($emailFilter);
      $dbpassword = $userRecord['password'];

      if (password_verify($password, $dbpassword)) {
        $_SESSION['loggedIn'] = true;
        $_SESSION['userRecord'] = $userRecord;
        ?>
        <script>
          location.replace("index.php");
        </script>
      <?php } else {
        // echo "*Password does not matches ";
        $_SESSION['error'] = "*Password does not Matches";
      }
    } else {
      // echo "*Account does not exists";
      $_SESSION['error'] = "*Account does not exists";
    }
  }
  ?>

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
            <p class="mb-4">Please sign-in to your account</p>

            <form id="formAuthentication" class="mb-3" action="" method="POST">
              <div class="mb-3 Input">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control 
                <?php if (isset($_SESSION['error']) && $_SESSION['error'] == "*Account does not exists") {
                  echo " is-invalid";
                } ?>
                  " id="email" name="email" placeholder="Enter your email or username" autofocus
                  value="<?php if (isset($_POST['email'])) {
                    echo $_POST['email'];
                  } ?>">
                <small>Error Message</small>
                <?php if (isset($_SESSION['error']) && $_SESSION['error'] == "*Account does not exists") {
                  echo "<small style='display:block';>{$_SESSION['error']}</small>";
                } ?>
              </div>
              <div class="mb-3 form-password-toggle Input">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Password</label>
                  <a href="forgotPassword.php">
                    <h7>Forgot Password?</h7>
                  </a>
                </div>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control 
                  <?php if (isset($_SESSION['error']) && $_SESSION['error'] == "*Password does not Matches") {
                    echo " is-invalid";
                  } ?>
                    " name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password"
                    value="<?php if (isset($_POST['password'])) {
                      echo $_POST['password'];
                    } ?>">
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
                <small>Error Message</small>
                <?php if (isset($_SESSION['error']) && $_SESSION['error'] == "*Password does not Matches") {
                  echo "<small style='display:block';>{$_SESSION['error']}</small>";
                } ?>
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="remember-me" />
                  <label class="form-check-label" for="remember-me"> Remember Me </label>
                </div>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" name="login" value="login">Sign in</button>
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
<?php include('../includes/script.php') ?>
<script type="text/javascript">
  //snippet from stackoverflow to prevent auto submission of form after refresh
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>
<script type="text/javascript" src="../scripts/loginValidation.js"></script>

</html>