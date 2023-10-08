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
					<div class="card mb-4">
					<div class="card-header d-flex justify-content-between align-items-center ">
										<h1 class="mb-0">Account Details</h5>
									</div>
									
						<div class="card-body">
							
								<div class="col-sm-3">
									<p class="mb-0">User Id:</p>
								</div>
								<div class="col-sm-9">
									<p class="text-muted mb-0">
										<?=$userRecord['userID'];?>
									</p>
								</div>
							
							<hr>
							
								<div class="col-sm-3">
									<p class="mb-0">First Name:</p>
								</div>
								<div class="col-sm-9">
									<p class="text-muted mb-0">
									<?=$userRecord['firstname'];?>
									</p>
								</div>
							
							<hr>
							
								<div class="col-sm-3">
									<p class="mb-0">Last Name:</p>
								</div>
								<div class="col-sm-9">
									<p class="text-muted mb-0">
									<?=$userRecord['lastname'];;?>
									</p>
								</div>
							
							<hr>
							
								<div class="col-sm-3">
									<p class="mb-0">Email:</p>
								</div>
								<div class="col-sm-9">
									<p class="text-muted mb-0">
									<?=$userRecord['email'];?>
									</p>
								</div>
							
							<hr>
							
								<div class="col-sm-3">
									<p class="mb-0">Gender</p>
								</div>
								<div class="col-sm-9">
									<p class="text-muted mb-0">
									<?='male';?>
									</p>
								</div>
							
							<hr>
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