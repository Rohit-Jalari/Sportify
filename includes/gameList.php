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
    <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
        <?php include('../includes/aside.php') ?>
        <div class="layout-page">
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                   
                </div>
            </div>
        </div>
    </div>
</div>



										<div class="row">
											<div class="col">
												<div id="target">
													<!-- <div class="card text-center" style="border: 1px solid #444564;">
														<div class="card-header">
															Featured
														</div>
														<div class="card-body">
															<h5 class="card-title">Special title treatment</h5>
															<p class="card-text">With supporting text below as a natural
																lead-in to additional content.</p>
															<a href="#" class="btn btn-primary">Go somewhere</a>
														</div>
														<div class="card-footer text-muted">
															2 days ago
														</div>
													</div> -->
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
		<!--Overlay -->
		<div class="layout-overlay layout-menu-toggle"></div>
	</div>
</body>
<?php include('../includes/script.php') ?>
<?php if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true) { ?>
	<script>
		var myModal = new bootstrap.Modal(document.getElementById('loginModalToggle'));
		window.addEventListener('load', () => {
			myModal.show();
		});
	</script>
<?php } ?>

<script type="text/javascript" src="../scripts/inputLimitLoad.js"></script>
<script type="text/javascript" src="../assets/vendor/libs/cleave/Cleave.min.js"></script>
<script type="text/javascript" src="../assets/vendor/libs/block-ui/block-ui.js"></script>
<script type="text/javascript" src="../scripts/participateInput.js"></script>

</html>