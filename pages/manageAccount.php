<?php
require('../config/session.php');
?>
<!DOCTYPE html>
<html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">

<head>
	<?php include('../includes/head.php'); ?>
	<link rel="stylesheet" href="../assets/vendor/css/rtl/core-dark.css">
	<link rel="stylesheet" href="../assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css">
	<style>
		.row input:focus {
			border-color: #696cff;
		}
	</style>
	<script src="../assets/vendor/js/bootstrap.js"></script>
</head>

<body>
	<!-- Layout wrapper -->
	<div class="layout-wrapper layout-content-navbar">
		<div class="layout-container">
			<!-- Menu -->
			<?php include('../includes/aside.php') ?>

			<div class="layout-page">
				<?php include('../includes/navbar.php') ?>
				<!-- Content wrapper -->
				<div class="content-wrapper">
					<div class="container-xxl flex-grow-1 container-p-y">

						<div class="card-header d-flex justify-content-between align-items-center ">
							<h1 class="mb-0">Manage Account</h5>
						</div>
						<form id="formAuthentication" class="mb-3" action="" method="POST">
							<div class="mb-3 Input">
								<label for="firstname" class="form-label">First Name</label>
								<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter your First Name" </div>
								<div class="mb-3 Input">
									<label for="lastname" class="form-label">Last Name</label>
									<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter your Last Name" </div>
									<div class="mb-3 Input">
										<label for="email" class="form-label">Email</label>
										<input type="email" class="form-control   id=" email" name="email" placeholder="Enter your email" </div>
										<div class="mb-3 form-password-toggle Input">
											<label class="form-label" for="password" pattern="(?=.*\d)(?=.*[\W|_])(?=.*[a-z])(?=.*[A-Z]).{6,}">Password</label>
											<div class="input-group input-group-merge">
												<input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" v <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
											</div>
										</div>
										<div class="mb-3 form-password-toggle Input">
											<label class="form-label" for="cpassword">Confirm Password</label>
											<div class="input-group input-group-merge">
												<input type="password" id="cpassword" class="form-control" name="cpassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
											</div>
										</div>


									</div>
								</div>
							</div>
					</div>
				</div>
</body>
<?php include('../includes/script.php') ?>

</html>