<?php
session_start();
unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
  data-template="vertical-menu-template-free">

<head>
  <?php include('head.php'); ?>
  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
  <style>
    .Input.error input,
    .Input.error span {
      border: 2px solid #ff6e63;
    }

    .Input>small {
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
  //connect to database
  require_once("dbCon.php");


  //checks if signUp button is clicked or not
  if (isset($_POST['signUp']) && $_POST['signUp'] == 'signUp') {

    //retrives value from form
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    //collection
    $userCollection = $databaseCon->Users;
    $emailFilter = ["email" => $email];

    $emailMatch = $userCollection->countDocuments($emailFilter);
    // $userID = generateID(6);
    // var_dump($emailMatch);
    // var_dump($userID);
  
    //returns the no.of rows where email is found i.e returns 1 if email is found in DB
    if ($emailMatch == 0) {

      //hashing the password
      $hPassword = password_hash($password, PASSWORD_BCRYPT);
      do {
        $userID = generateID(12);
        $userIDFilter = ['userID' => $userID];
        $userIDMatch = $userCollection->countDocuments($userIDFilter);
      } while ($userIDMatch != 0);


      $userData = [
        "userID" => $userID,
        "firstname" => $firstname,
        "lastname" => $lastname,
        "email" => $email,
        "password" => $hPassword,
        "tournamentID" => 'null'
      ];

      $insertResult = $userCollection->insertOne($userData);

      if ($insertResult->getInsertedCount() > 0) { ?>
        <script>
          location.replace("login.php");
        </script>
      <?php } else {
        $_SESSION['error'] = "Account Creation Failed !!!";
      }
    } else {
      $_SESSION['error'] = "Email Already Exists  !!!";
    }
  }
  function generateID($length)
  {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';

    for ($i = 0; $i < $length; $i++) {
      $randomIndex = mt_rand(0, strlen($characters) - 1);
      $password .= $characters[$randomIndex];
    }
    return '#' . str_shuffle($password);
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
              <a href="index.html" class="app-brand-link ">
                <span class="app-brand-logo">
                  <a href="index.php" class="py-2">
                    <span class="logo text-dark">Sportify</span>
                  </a>
                </span>
              </a>
            </div>
            <!-- /Logo -->
            <p class="mb-4 text-center">Connect with the Event wherever you are!</p>

            <form id="formAuthentication" class="mb-3" action="" method="POST">
              <div class="mb-3 Input">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname"
                  placeholder="Enter your First Name" autofocus value=<?php if (isset($_POST['firstname'])) {
                    echo $_POST['firstname'];
                  } ?>>
                <small>Error Message</small>
              </div>
              <div class="mb-3 Input">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter your Last Name"
                  autofocus value=<?php if (isset($_POST['lastname'])) {
                    echo $_POST['lastname'];
                  } ?>>
                <small>Error Message</small>
              </div>
              <div class="mb-3 Input">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control  <?php if (isset($_SESSION['error'])) {
                  echo " is-invalid";
                } ?>" id="email" name="email" placeholder="Enter your email" autofocus value=<?php if (isset($_POST['email'])) {
                   echo $_POST['email'];
                 } ?>>
                <small>Error Message</small>
                <?php if (isset($_SESSION['error'])) {
                  echo "<small style='display:block';>{$_SESSION['error']}</small>";
                } ?>
              </div>
              <div class="mb-3 form-password-toggle Input">
                <label class="form-label" for="password"
                  pattern="(?=.*\d)(?=.*[\W|_])(?=.*[a-z])(?=.*[A-Z]).{6,}">Password</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" value=<?php if (isset($_POST['password'])) {
                      echo $_POST['password'];
                    } ?>>
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
                <small>Error Message</small>
              </div>
              <div class="mb-3 form-password-toggle Input">
                <label class="form-label" for="cpassword">Confirm Password</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="cpassword" class="form-control" name="cpassword"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" value=<?php if (isset($_POST['password'])) {
                      echo $_POST['password'];
                    } ?>>
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
                <small>Error Message</small>
              </div>

              <button class="btn btn-primary d-grid w-100" name="signUp" value="signUp">Sign up</button>
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
<?php include('script.php') ?>
<script type="text/javascript" src="signUpValidation.js"></script>
<script type="text/javascript">
  //snippet from stackoverflow to prevent auto submission of form after refresh
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>

</html>