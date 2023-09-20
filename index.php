<?php
require('session.php');
?>
<!DOCTYPE html>
<html>
<html
lang="en"
class="light-style layout-menu-fixed"
dir="ltr"
data-theme="theme-default"
data-assets-path="assets/"
data-template="vertical-menu-template-free"
>
<head>
	<?php include('head.php');?>
</head>
<body>
	<?php
	// print_r($userRecord);
	// print_r($tournamentDetail);
	?>
	<!-- Layout wrapper -->
	<div class="layout-wrapper layout-content-navbar">
		<div class="layout-container">
			<!-- Menu -->
			<?php include('aside.php')?>

			<div class="layout-page" style="height: 150vh">
				<?php include('navbar.php')?>
				<!-- Content wrapper -->
				<div class="content-wrapper">
					<div class="container-xxl flex-grow-1 container-p-y">
						
					</div>
				</div>
			</div>
		</div>
		<!-- Overlay -->
		<div class="layout-overlay layout-menu-toggle"></div>
	</div>
</body>
<?php include('script.php')?>
</html>