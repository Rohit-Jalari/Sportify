<!DOCTYPE html>
<html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
	data-assets-path="../sneat/assets/" data-template="vertical-menu-template-free">

<head>
	<?php include('head.php'); ?>
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

						<h1 class="d-flex justify-content-start">Tournament Creation</h1>
						<div>
							<form>
								<div class="header">
									<h5 class="title" id="TopTitle">Tourament Detail</h5>
								</div>

								<div class="row">
									<div class="col mb-3">
										<label for="validationCustom01" class="form-label">Name</label>
										<input type="text" id="validationCustom01" class="form-control"
											placeholder="Enter Name">
									</div>
								</div>
								<div class="row g-2">
									<div class="col mb-0">
										<label for="validationCustom02" class="form-label ">Start
											Date</label>
										<input type="date" id="validationCustom02" class="form-control">
									</div>
									<div class="col mb-3">
										<label for="validationCustom03" class="form-label ">End
											Date</label>
										<input type="date" id="validationCustom03" class="form-control">
									</div>
									<div class="cpl mb-3">
										<label for="validationCustom04" class="form-label ">Location</label>
										<input type="text" id="validationCustom04" class="form-control"
											placeholder="Enter location">
									</div>
									<div class="cpl mb-3">
										<label for="nameSlideTop" class="form-label">Description</label>
										<input type="text" id="nameSlideTop" class="form-control"
											placeholder="Description">
									</div>
									<div class="button">
										<button type="button" class="btn btn-primary">Submit</button>
									</div>
									<div class="d-flex">
										<h5 class="title" id="TopTitle">Advance Setting</h5>
										<div class="mb-3 ms-3">
											<div class="form-check form-switch">
												<input class="form-check-input" type="checkbox"
													id="toggleEmailRestriction">
												<label class="form-check-label" for="toggleEmailRestriction">Enable
													Email-Domain
													Restriction</label>
											</div>
											<div class="email-restriction" style="display: none;">
												<label for="exampleFormControlInput1" class="form-label">Email-Domain
													Restriction</label>
												<input type="email" class="form-control" id="exampleFormControlInput1"
													placeholder="name@example.com">
											</div>
										</div>
									</div>
								</div>


							</form>



						</div>

					</div>

				</div>

			</div>

		</div>
	</div>
	<script>
		document.getElementById('toggleEmailRestriction').addEventListener('change', function () {
			var emailRestriction = document.querySelector('.email-restriction');
			emailRestriction.style.display = this.checked ? 'block' : 'none';
		});
	</script>
</body>
<?php include('script.php') ?>

</html>