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
						<h1>Welcome to Sportify</h1>
						<h4>Start Managing your Sports Events</h4>
						<div class="row">
							<div class="col-x1">
								<div class="card">
									<div class="card-header d-flex justify-content-between align-items-center">
										<h1 class="mb-0">Created Tournament</h1>
									</div>

									<div class="card-body mt-2">
										<div class="row">
											<div class="col mb-3">
												<label for="input" class="form-label">
													<h6>Name</h6>
													<div class="col-sm-20">
														<p class="text-muted mb-0">#12345</p>
														
													</div>

												</label>
												<div class="d-flex justify-content-end">
														<button type="button" class="btn btn-primary right">See</button>
														</div>
											</div>
										</div>
										<div class="row">
											<div class="col">
												<div id="target">
												</div>
											</div>
										</div>
									</div>

								</div>
								<div class="card">
									<div class="card-header d-flex justify-content-between align-items-center">
										<h1 class="mb-0">Created Tournament</h1>
									</div>

									<div class="card-body mt-2">
										<div class="row">
											<div class="col mb-3">
												<label for="input" class="form-label">
													<h6>You have not created any tournament </h6>
													
													
												</label>
												<div class="d-grid gap-2 col-2 mx-auto">
  <button class="btn btn-primary btn-lg" type="button">Create</button>
</div>
											</div>
										</div>
										<div class="row">
											<div class="col">
												<div id="target">
												</div>
											</div>
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