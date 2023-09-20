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
	<link rel="stylesheet" href="assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css">
	<style>
		.row input:focus {
			border-color: #696cff;
		}
	</style>
	<script src="assets/vendor/js/bootstrap.js"></script>
</head>

<body>
	<?php
	require_once('dbCon.php');
	include('errorModal.php');

	// print_r($userRecord);
	
	//checks if Login buttons is clicked or not
	if (isset($_POST['submit']) && $_POST['submit'] == 'submit') {
		$tournamentName = htmlspecialchars($_POST['tournamentName']);
		$tournamentCreator = $userRecord['userID'];
		$startDate = htmlspecialchars($_POST['startDate']);
		$endDate = htmlspecialchars($_POST['endDate']);
		$location = htmlspecialchars($_POST['location']);
		$description = htmlspecialchars($_POST['description']);
		$emailRestriction = htmlspecialchars($_POST['emailRestriction']);
		$emailRestriction = ($emailRestriction != '') ? $emailRestriction : 'null';
		//collection
		$tournamentCollection = $databaseCon->Tournaments;

		do {
			$tournamentID = generateID(12);
			$tournamentIDFilter = ['tournamentID' => $tournamentID];
			$tournamentIDMatch = $tournamentCollection->countDocuments($tournamentIDFilter);
		} while ($tournamentIDMatch != 0);

		// echo $tournamentName. '  '. $tournamentCreator. '  '. $startDate.'  '. $endDate . '  '. $emailRestriction ;
		$tournamentDetail = [
			'tournamentName' => $tournamentName,
			'tournamentID' => $tournamentID,
			'tournamentCreator' => $tournamentCreator,
			'startDate' => $startDate,
			'endDate' => $endDate,
			'location' => $location,
			'description' => $description,
			'emailRestriction' => $emailRestriction
		];
		$session = $mongoClient->startSession();

		try {
			$session->startTransaction();

			// Insert operation
			$insertResult = $tournamentCollection->insertOne($tournamentDetail);

			if ($insertResult->getInsertedCount() <= 0) {
				throw new Exception("Insert failed");
			}

			//collection
			$userCollection = $databaseCon->Users;
			$updateFilter = ['userID' => $tournamentCreator];
			$update = ['$set' => ['tournamentID' => $tournamentID]];
			$updateResult = $userCollection->updateOne($updateFilter, $update);

			if ($updateResult->getModifiedCount() <= 0) {
				throw new Exception("Update failed");
			}
			
			$_SESSION['tournamentDetail'] = $tournamentDetail;
			$session->commitTransaction();
			?>
			<script>
				location.replace("tournamentIndex.php");
			</script>
			<?php
		} catch (Exception $e) {
			
			$session->abortTransaction();
			?>
			<script>
				let myModal = new bootstrap.Modal(document.getElementById('errorModalToggle'));
				myModal.show();
			</script>
			<?php
		} finally {
			$session->endSession();
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
										<h1 class="mb-0">Tournament Creation</h5>
									</div>

									<div class="card-body">
										<form id="formTournament" class="mb-3" action="" method="POST">
											<div class="row">
												<div class="col mb-3">
													<label for="tournamentName" class="form-label">Name</label>
													<input type="text" id="tournamentName" class="form-control"
														placeholder="Enter Name" name="tournamentName" required>
												</div>
											</div>
											<div class="row g-2">
												<div class="col mb-0">
													<div class="mb-3">
														<label for="date" class="form-label">Date
														</label>

														<div class="input-group input-daterange"
															id="bs-datepicker-daterange">
															<input id="date" type="text" placeholder="YYYY/MM/DD"
																class="form-control" name="startDate" required>
															<span class="input-group-text">to</span>
															<input type="text" placeholder="YYYY/MM/DD"
																class="form-control" name="endDate" required>
														</div>
													</div>
												</div>
												<div class="cpl mb-3">
													<label for="location" class="form-label ">Location</label>
													<input type="text" id="location" class="form-control"
														placeholder="Enter location" name="location" required>
												</div>
												<div class="cpl mb-3">
													<label for="description" class="form-label">Description</label>
													<textarea id="description" class="form-control"
														placeholder="Enter Description of the Tournament"
														name="description" rows="4" style="color:white;"
														required></textarea>
												</div>

												<div class="d-flex">
													<h5 class="title" id="TopTitle">Advance Setting</h5>
													<div class="mb-3 ms-3">
														<div class="form-check form-switch">
															<input class="form-check-input" type="checkbox"
																id="advanceSetting" name="advanceSetting">
															<label class="form-check-label" for="advanceSetting">Enable
																Email-Domain
																Restriction</label>
														</div>
													</div>
												</div>
												<div class="cpl mb-3">
													<div class="email-restriction"
														style="height:0px;overflow:hidden;transition:0.5s ease;">
														<label for="emailRestriction" class="form-label">Email-Domain
															Restriction
														</label>
														<input type="text" class="form-control" id="emailRestriction"
															placeholder="@example.com" name="emailRestriction"
															pattern="^@[a-zA-Z0-9]*\.[\w\d]+[\.\w\d]*">
													</div>
												</div>
											</div>
											<button id="formSubmit" class="btn btn-primary" name="submit"
												value="submit">Submit</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Overlay -->
		<div class="layout-overlay layout-menu-toggle"></div>
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
<script type="text/javascript">
	document.getElementById('advanceSetting').addEventListener('change', function () {
		let advanceSetting = document.querySelector('#advanceSetting');
		var emailRestriction = document.querySelector('.email-restriction');
		var emailRestrictionField = document.querySelector('#emailRestriction');
		if (advanceSetting.checked) {
			emailRestriction.style.height = '5rem';
			emailRestrictionField.setAttribute('required', '');
		} else {
			emailRestriction.style.height = '0';
			emailRestrictionField.removeAttribute('required');
		}
	});		
</script>
<script src="assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript">
	$("#bs-datepicker-daterange").datepicker(
		{ format: "yyyy/mm/dd" }
	);
</script>
<script type="text/javascript">
	document.getElementById("formSubmit").addEventListener('click', () => {
		console.log('clicked');
	});
</script>
<script type="text/javascript">
	//snippet from stackoverflow to prevent auto submission of form after refresh
	if (window.history.replaceState) {
		window.history.replaceState(null, null, window.location.href);
	}
</script>


</html>