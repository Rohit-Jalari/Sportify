<?php
require('../config/session.php');
?>
<!DOCTYPE html>
<html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">

<head>
	<?php include('../includes/head.php'); ?>
	<style>
		/* Custom CSS to set a fixed height for card images */
		.card-img-top {
			height: 200px;
			/* Adjust the height as needed */
			object-fit: cover;
			/* Maintain aspect ratio and cover the entire card */
		}

		/* Custom CSS to style the card text */
		.card-text-overlay {
			position: absolute;
			top: 85%;
			left: 50%;
			transform: translate(-50%, -50%);
			background-color: rgba(255, 255, 255, 0.8);
			/* Add a semi-transparent background */
			padding: 10px;
			border-radius: 5px;
		}
		.row input:focus {
			border-color: #696cff;
		}
		.gap-between-rows {
    margin-bottom: 20px;
	</style>
	<link rel="stylesheet" href="../assets/vendor/css/rtl/core-dark.css">
	<link rel="stylesheet" href="../assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css">
	<script src="../assets/vendor/js/bootstrap.js"></script>
</head>

<body>
	<!-- Layout wrapper -->
	<div class="layout-wrapper layout-content-navbar">
		<div class="layout-container">
			<!-- Menu -->
			<?php include('../includes/aside.php') ?>

			<div class="layout-page" style="height: 150vh">
				<?php include('../includes/navbar.php') ?>
				<!-- Content wrapper -->
				<div class="content-wrapper">
					<div class="container-xxl flex-grow-1 container-p-y">
						<h2 >Hello John Doe</h2>
						<div class="card-body">
						<marquee direction="right"><img src="../assets/img/backgrounds/fball.gif" width="88" height="70" alt="" border="0"></marquee>

							<div class="row gap-between-rows ">
								<div class="col-md-6">
									<div class="card" style="width: 25rem; position: relative;">
										<img src="../assets/img/elements/schedule.jpg" class="card-img-top" alt="...">
										<div class="card-text-overlay">
											<p class="card-text"><b><a href="#">Match Schedule</a></b></p>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="card" style="width: 25rem; position: relative;">
										<img src="../assets/img/elements/today.jpg" class="card-img-top" alt="...">
										<div class="card-text-overlay">
											<p class="card-text"><b><a href="#">Today's Match</a></b></p>
										</div>
									</div>
								</div>
								
							</div>

						<div class="row gap-between-rows ">
							<div class="col-md-6">
									<div class="card text-center" style="width: 25rem; position: relative;">
										<img src="../assets/img/elements/complete.jpg" class="card-img-top" alt="...">
										<div class="card-text-overlay">
											<p class="card-text"><b><a href="#">Completed Match</a></b></p>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="card text-center" style="width: 25rem; position: relative;">
										<img src="../assets/img/elements/yet.jpg" class="card-img-top" alt="...">
										<div class="card-text-overlay">
											<p class="card-text"><b><a href="#">Yet to Start</a></b></p>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row gap-between-rows ">
							<div class="col-md-6">
									<div class="card text-center" style="width: 25rem; position: relative;">
										<img src="../assets/img/elements/event.jpg" class="card-img-top" alt="...">
										<div class="card-text-overlay">
											<p class="card-text"><b><a href="#">Manage Event</a></b></p>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="card text-center" style="width: 25rem; position: relative;">
										<img src="../assets/img/elements/usersetting.jpg" class="card-img-top" alt="...">
										<div class="card-text-overlay">
											<p class="card-text"><b><a href="#">User Setting</a></b></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Overlay -->
		<div class="layout-overlay layout-menu-toggle"></div>
	</div>

</body>
<?php include('../includes/script.php') ?>

</html>