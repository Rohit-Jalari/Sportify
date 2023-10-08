<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

	<div class="app-brand">
		<a href="../pages/index.php" class="py-2">
			<span class="logo logo-shadow">Sportify</span>
		</a>
		<a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
			<i class="bx bx-chevron-left bx-sm align-middle"></i>
		</a>
	</div>
	<ul class="menu-inner py-1">
		<!-- Dashboard -->
		<li class="menu-item active">
			<a href="../pages/index.php" class="menu-link">
				<i class="menu-icon tf-icons bx bx-home-circle"></i>
				<div data-i18n="Analytics">Dashboard</div>
			</a>
		</li>

		<li class="menu-header small text-uppercase">
			<span class="menu-header-text">Tournament</span>
		</li>
		<?php if ($userRecord == null || $userRecord['tournamentID'] == null) { ?>
			<li class="menu-item">
				<a href="../pages/createTournament.php" class="menu-link">
					<i class="menu-icon tf-icons bx bx-dock-top"></i>
					<div data-i18n="Create">Create</div>
				</a>
			</li>
		<?php } ?>
		<li class="menu-item">
			<a href="../pages/participateTournament.php" class="menu-link">
				<i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
				<div data-i18n="Participate">Participate</div>
			</a>
		</li>
		<li class="menu-item">
			<a href="javascript:void(0);" class="menu-link menu-toggle">
				<i class="menu-icon tf-icons bx bx-cube-alt"></i>
				<div data-i18n="Spectate">Spectate</div>
			</a>
			<ul class="menu-sub">
				<li class="menu-item">
					<a href="../pages/enterCode.php" class="menu-link">
						<div data-i18n="Code">Enter Code</div>
					</a>
				</li>
			</ul>
		</li>

		<!-- Created Tournament-->
		<?php if ($userRecord != null && $userRecord['tournamentID'] != null) { ?>
			<li class="menu-header small text-uppercase"><span class="menu-header-text">Created Tournament</span></li>
			<!-- Tournament List item -->
			<li class="menu-item">
				<a href="../pages/createdTournamentIndex.php" class="menu-link createdLink">
					<i class="menu-icon tf-icons bx bx-detail"></i>
					<div data-i18n="Messages">
						<?php
						$result = $databaseCon->Tournaments->findOne(['tournamentID' => $userRecord['tournamentID']]);
						(['tournamentName']);
						echo $result["tournamentName"] . "<br>" . "<h6>" . $result["tournamentID"] . "</h6>"; ?>
					</div>
				</a>
			</li>
		<?php } ?>

		<!-- Joined Tournament-->
		<?php
		if ($userRecord != null && $userRecord['participatedTournaments'] != null) { ?>
			<li class="menu-header small text-uppercase"><span class="menu-header-text">Joined Tournament</span></li>

			<?php foreach ($userRecord['participatedTournaments'] as $ID => $mail) {
				require_once("../config/dbCon.php");
				$result = $databaseCon->Tournaments->findOne(["tournamentID" => $ID]);
				?>
				<!-- Participated Tournament List Item -->
				<li class="menu-item">
					<a href="../pages/participatedTournamentIndex.php" class="menu-link participateLink">
						<i class="menu-icon tf-icons bx bx-detail"></i>
						<div data-i18n="Messages">
							<?php echo $result["tournamentName"] . "<br>" . "<h6>" . $result["tournamentID"] . "</h6>"; ?>
						</div>
					</a>
				</li>
			<?php }
		} ?>

		<!-- Profile -->
		<li class="menu-header small text-uppercase"><span class="menu-header-text">Profile</span></li>
		<!-- Detail -->
		<li class="menu-item">
			<a href="../pages/accountDetail.php" class="menu-link">
				<i class="menu-icon tf-icons bx bx-collection"></i>
				<div data-i18n="Basic">Account Detail</div>
			</a>
		</li>
		<!-- Manage profile -->
		<li class="menu-item">
			<a href="../pages/manageAccount.php" class="menu-link">
				<i class="menu-icon tf-icons bx bx-box"></i>
				<div data-i18n="Manage">Manage</div>
			</a>
		</li>

		<!-- Authentication -->
		<li class="menu-item">
			<a href="javascript:void(0)" class="menu-link menu-toggle">
				<i class="menu-icon tf-icons bx bx-copy"></i>
				<div data-i18n="Authentication">Authentication</div>
			</a>
			<ul class="menu-sub">
				<li class="menu-item">
					<a href="../pages/login.php" class="menu-link">
						<div data-i18n="Login">Login</div>
					</a>
				</li>
				<li class="menu-item">
					<a href="../pages/register.php" class="menu-link">
						<div data-i18n="Register">Register</div>
					</a>
				</li>
				<li class="menu-item">
					<a href="../pages/logout.php" class="menu-link">
						<div data-i18n="LogOut">Log Out</div>
					</a>
				</li>
			</ul>
		</li>

	</ul>
</aside>
<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script>
	$(document).ready(function () {
		$(".participateLink").on("click", function (e) {
			e.preventDefault();

			var linkElement = $(this);
			var tournamentID = linkElement.find("h6").text();

			$.ajax({
				url: "../config/setTournamentSession.php",
				method: "POST",
				data: { tournamentID: tournamentID },
				success: function (response) {
					window.location.href = linkElement.attr("href");
				},
				error: function (error) {
					console.error("Error setting session: " + error);
				}
			});
		});
	});
</script>
<script>
	$(document).ready(function () {
		$(".createdLink").on("click", function (e) {
			e.preventDefault();

			var linkElement = $(this);
			var tournamentID = linkElement.find("h6").text();

			$.ajax({
				url: "../config/setTournamentSession.php",
				method: "POST",
				data: { tournamentID: tournamentID },
				success: function (response) {
					window.location.href = linkElement.attr("href");
				},
				error: function (error) {
					console.error("Error setting session: " + error);
				}
			});
		});
	});
</script>