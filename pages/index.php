<?php
require('../config/session.php');
?>
<!DOCTYPE html>
<html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
	data-template="vertical-menu-template-free">

<head>
	<?php include('../includes/head.php'); ?>
	<link rel="stylesheet" href="../assets/vendor/css/rtl/core-dark.css">
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
						<h5>Start Managing your Sports Events</h5>
						<div class="row">
							<div class="col-x1">
								<?php if ($userRecord == null || $userRecord['tournamentID'] == null) { ?>
									<div class="card mt-2">
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
								<?php } else {
									$result = $databaseCon->Tournaments->findOne(['tournamentID' => $userRecord['tournamentID']]);
									(['tournamentName']); ?>

									<div class="card">
										<div class="card-header d-flex justify-content-between align-items-center">
											<h2 class="mb-0">Created Tournament</h2>
										</div>
										<div class="card-body mt-2">
											<div class="row">
												<div class="col mb-3">
													<label for="input" class="form-label">
														<h4>
															<?= $result["tournamentName"]; ?>
														</h4>
														<div class="col-sm-20">
															<h6>
																<?= $result["tournamentID"]; ?>
															</h6>
														</div>
													</label>
													<div class="d-flex justify-content-start">
														<button type="button" class="btn btn-primary right">See</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>


								<?php if ($userRecord != null && $userRecord['participatedTournaments'] != null) { ?>

									<div class="card mt-2">
										<div class="card-header d-flex justify-content-between align-items-center">
											<h2 class="mb-0">Participated Tournament</h2>
										</div>
										<?php foreach ($userRecord['participatedTournaments'] as $ID => $mail) {
											require_once("../config/dbCon.php");
											$result = $databaseCon->Tournaments->findOne(["tournamentID" => $ID]); ?>
											<div class="card-body mt-2">
												<div class="row">
													<div class="col mb-1">
														<label for="input" class="form-label">
															<h4>
																<?= $result["tournamentName"]; ?>
															</h4>
															<div class="col-sm-20">
																<h6>
																	<?= $result["tournamentID"]; ?>
																</h6>
															</div>
														</label>
														<div class="d-flex justify-content-start">
															<button type="button" class="btn btn-primary right">See</button>
														</div>
													</div>
												</div>
											</div>
										<?php } ?>
									</div>
								<?php } else { ?>

									<div class="card mt-2">
										<div class="card-header d-flex justify-content-between align-items-center">
											<h1 class="mb-0">Participated Tournament</h1>
										</div>
										<div class="card-body mt-2">
											<div class="row">
												<div class="col mb-3">
													<label for="input" class="form-label">
														<h6>You have not Participated in any tournament </h6>
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
								<?php } ?>
							</div>
						</div>
					</div>
					<?php
					// print_r($_SESSION['userRecord']);
					// print_r($tournamentDetail);
					?>
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