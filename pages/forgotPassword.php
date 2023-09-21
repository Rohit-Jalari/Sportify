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
	<?php include('../includes/head.php'); ?>
	<!-- Page CSS -->
	<!-- Page -->
	<link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
</head>

<body>
	<div class="container-xxl">
		<div class="authentication-wrapper authentication-basic container-p-y">
			<div class="authentication-inner py-4">
				<!-- Forgot Password -->
				<div class="card" style="padding-top: 3rem;">
					<div class="card-body">
						<!-- Logo -->
						<div class="app-brand justify-content-center">
							<a href="index.php" class="app-brand-link gap-2">
								<span class="app-brand-logo">
									<a href="index.php" class="py-2">
										<span class="logo text-dark">Sportify</span>
									</a>
								</span>
							</a>
						</div>
						<!-- /Logo -->
						<h4 class="mb-2">Forgot Password? 🔒</h4>
						<p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
						<form id="formAuthentication" class="mb-3" action="index.html" method="POST">
							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input
								type="text"
								class="form-control"
								id="email"
								name="email"
								placeholder="Enter your email"
								autofocus
								/>
							</div>
							<button class="btn btn-primary d-grid w-100">Send Reset Link</button>
						</form>
						<div class="text-center">
							<a href="login.php" class="d-flex align-items-center justify-content-center">
								<i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
								Back to login
							</a>
						</div>
					</div>
				</div>
				<!-- /Forgot Password -->
			</div>
		</div>
	</div>
</body>
<?php include('../includes/script.php')?>
</html>

