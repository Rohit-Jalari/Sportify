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
data-template="vertical-menu-template-free"
>
<head>
	<?php include('head.php'); ?>
	<link rel="stylesheet" href="assets/vendor/css/rtl/core-dark.css">
</head>

<body>
	<!-- Layout wrapper -->
	<div class="layout-wrapper layout-content-navbar">
		<div class="layout-container">
			<!-- Menu -->
			<?php include('aside.php')?>

			<div class="layout-page">
				<?php include('navbar.php')?>
				<!-- Content wrapper -->
				<div class="content-wrapper">
					<div class="container-xxl flex-grow-1 container-p-y">
						<!-- Modal if Not logged in-->
						<?php include('loginModal.php')?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php include('script.php')?>
<?php if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true ) {?>
	<script>
		var myModal = new bootstrap.Modal(document.getElementById('loginModalToggle'));
		window.addEventListener('load',()=>{
			myModal.show();
		});
	</script> <?php }?>
</html>