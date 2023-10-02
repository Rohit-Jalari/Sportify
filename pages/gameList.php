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
            <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
        <?php include('../includes/aside.php') ?>
        <div class="layout-page">
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row justify-content-center"> <!-- Center the content -->
                        <div class="col-12 col-md-12"> <!-- Adjust the column size as needed -->
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
									<div class="d-grid gap-2 col-6 mx-auto">
 									 <button class="btn btn-primary btn-lg" type="button">Add Game</button>
                              	  </div>
                               
                                 <!-- Separate box for "Game Name" -->
                            </div> <!-- Separate box for the entire content -->
                        </div>
                    </div>
					<div class="card-body mt-2">
                                    <div class="row">
                                        <div class="col">
                                            <label for "input" class="form-label">
                                                <h2>
                                                    Game-List:
                                                </h2>
                                            </label>
                                        </div>
                                    </div>
                                </div>
								<div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h3 class="mb-0">Game Name</h3>
                                    </div>
                                    <!-- Add content for "Game Name" here -->
									<h4>Football <i class='bx bx-football' ></i></h4>
                                </div>

								<div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h4 class="mb-0">Gender</h4>
                                    </div>
                                    <!-- Add content for "Game Name" here -->
									<div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-2"></i>Edit</a>
              <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i>See</a>
            </div>
          </div>
									
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <li><a class="dropdown-item" href="javascript:void(0);">Male</a></li>
    <li><a class="dropdown-item" href="javascript:void(0);">Female</a></li>
  </ul>
</div>
                                </div>
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