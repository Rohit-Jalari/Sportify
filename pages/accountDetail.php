<?php
require('../config/session.php');
?>
<!DOCTYPE html>
<html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">

<head>
	<?php include('../includes/head.php'); ?>
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

						<div class="card-header d-flex justify-content-between align-items-center">
							<h1 class="mb-0">Account Details</h5>
						</div>
						<form id="formTournament" class="mb-3" action="">
							<div class="mb-3">
								<label for="defaultFormControlInput" class="form-label">User Id</label>
								<input type="text" class="form-control" id="defaultFormControlInput" placeholder="Enter Username" aria-describedby="defaultFormControlHelp" />
							</div>
							<div class="mb-3">
								<label for="defaultFormControlInput" class="form-label">First Name</label>
								<input type="text" class="form-control" id="defaultFormControlInput" placeholder="Enter First Name" aria-describedby="defaultFormControlHelp" />
							</div>
							<div class="mb-3">
								<label for="defaultFormControlInput" class="form-label">Enter Last Name</label>
								<input type="text" class="form-control" id="defaultFormControlInput" placeholder="Enter Last Name" aria-describedby="defaultFormControlHelp" />
							</div>
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Email</label>
								<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" />
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php include('../includes/script.php') ?>

</html>