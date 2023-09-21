<?php
session_start();
if($_SESSION['loggedIn'] == true) { 
	session_destroy(); ?>
		<script>
			location.replace("login.php");
		</script>
	<?php } else { ?>
?>
<script>
	location.replace("login.php");
</script> <?php } ?>