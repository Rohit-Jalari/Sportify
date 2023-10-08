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
	<?php
	require_once('../config/dbCon.php');

	if (isset($_POST['openSave']) && $_POST['openSave'] == 'openSave') {
		if (isset($_POST['openCheck'])) {
			$openCheck = $_POST['openCheck'];
		} else {
			$openCheck = 'off';
		}
		$filter = ["tournamentID" => $participatedTournament['tournamentID']];
		$update = [
			'$set' => ["openParticipation" => $openCheck]
		];
		$result = $databaseCon->Tournaments->updateOne($filter, $update);
		$_SESSION['participatedTournament'] = $databaseCon->Tournaments->findOne($filter);
		header("location: createdTournamentIndex.php");
	}
	if (isset($_POST['activeSave']) && $_POST['activeSave'] == 'activeSave') {
		if (isset($_POST['activeCheck'])) {
			$openCheck = $_POST['activeCheck'];
		} else {
			$openCheck = 'off';
		}
		$filter = ["tournamentID" => $participatedTournament['tournamentID']];
		$update = [
			'$set' => ["isActive" => $openCheck]
		];
		$result = $databaseCon->Tournaments->updateOne($filter, $update);
		$_SESSION['participatedTournament'] = $databaseCon->Tournaments->findOne($filter);
		header("location: createdTournamentIndex.php");
		// echo $openCheck."  ".$activeCheck;
	} ?>
	<!-- Layout wrapper -->
	<div class="layout-wrapper layout-content-navbar">
		<div class="layout-container">
			<!-- Menu -->
			<?php include('../includes/createdTournamentAside.php') ?>

			<div class="layout-page">
				<?php include('../includes/navbar.php') ?>
				<!-- Content wrapper -->
				<div class="content-wrapper">
					<div class="container-xxl flex-grow-1 container-p-y">
						<?php
						// print_r($participatedTournament);
						?>
						<div class="row">
							<div class="col-x1">
								<div class="card mb-1">
									<div class="card-header d-flex justify-content-center align-items-center"
										style="padding:1rem;">
										<div class="w-100">
											<form id="formAuthentication" action="" method="POST">
												<div class="row">
													<div class="col-8">
														<label class="switch w-100">
															<input type="checkbox" class="switch-input <?php if ($participatedTournament["openParticipation"] == 'on') { ?> is-valid <?php }
															; ?> " name="openCheck" <?php if ($participatedTournament["openParticipation"] == 'on') { ?> checked <?php }
															  ; ?> />
															<span class="switch-label w-75 text-end me-4">
																<strong>Open Participation</strong></span>
															<span class="switch-toggle-slider">
																<span class="switch-on">
																	<i class="bx bx-check"></i>
																</span>
																<span class="switch-off">
																	<i class="bx bx-x"></i>
																</span>
															</span>
														</label>
													</div>
													<div class="col-4">
														<button class="btn btn-primary" name="openSave"
															value="openSave">
															Save
														</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="col-x1">
							<h1 class="mb-3 mt-3">Announcement</h1>
								<div class="card mb-4">
									<div class="card-header d-flex justify-content-between align-items-center">
										
									</div>
									<div class="card-body d-flex justify-content-center align-items-center" style="height:50vh;">
										<h3>There is no Announcement yet</h3>
								</div>
							</div>
						</div>
						<!-- Separate box for "Game Name" -->
					</div> <!-- Separate box for the entire content -->
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
<script>
	$(document).ready(function () {
		$('input[type="radio"]').change(function () {
			// Remove the is-valid class from all radio inputs
			$('input[type="radio"]').removeClass('is-valid');

			// Add the is-valid class to the selected radio input
			$(this).addClass('is-valid');
		});
	});
</script>

</html>