<?php
require('session.php');
?>
<!DOCTYPE html>
<html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
	data-template="vertical-menu-template-free">

<head>
	<?php include('head.php'); ?>
	<link rel="stylesheet" href="assets/vendor/css/rtl/core-dark.css">
	<style>
		input {
			height: 3rem;
		}

		h6 {
			color: #cbcbe2;
			margin-bottom: 0;
		}
	</style>
</head>

<body>
	<!-- Layout wrapper -->
	<div class="layout-wrapper layout-content-navbar">
		<div class="layout-container">
			<!-- Menu -->
			<?php include('aside.php') ?>

			<div class="layout-page">
				<?php include('navbar.php') ?>
				<!-- Content wrapper -->
				<div class="content-wrapper">
					<div class="container-xxl flex-grow-1 container-p-y">
						<!-- Modal if Not logged in-->
						<?php include('loginModal.php') ?>
						<div class="row">
							<div class="col-x1">
								<div class="card mb-4">
									<div class="card-header d-flex justify-content-between align-items-center">
										<h1 class="mb-0">Tournament Participation</h1>
									</div>

									<div class="card-body mt-2">
										<div class="row">
											<div class="col mb-3">
												<label for="input" class="form-label">
													<h6>
														Enter Tournament ID
													</h6>
												</label>
												<input type="text" id="input"
													class="form-control text-center text-white delimiter-mask"
													placeholder="Example : #GW7k92LCnZ8i" name="tournamentName"
													required>
											</div>
										</div>
										<div class="row">
											<div class="col mb-3">
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
	</div>
</body>
<?php include('script.php') ?>
<?php if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true) { ?>
	<script>
		var myModal = new bootstrap.Modal(document.getElementById('loginModalToggle'));
		window.addEventListener('load', () => {
			myModal.show();
		});
	</script>
<?php } ?>
<script type="text/javascript" src="assets/vendor/libs/cleave/Cleave.min.js"></script>
<script type="text/javascript" src="inputLimitLoad.js"></script>
<script type="text/javascript">
	var cleave = new Cleave(".delimiter-mask", {
		delimiter: " - ",
		blocks: [5, 4, 4],
		uppercase: true
	});
	window.addEventListener('load',() => {
		inputLimitLoad('target','input',13);
		
	});
</script>

</html>