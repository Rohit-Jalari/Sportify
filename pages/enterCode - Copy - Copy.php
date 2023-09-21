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
	<link rel="stylesheet" type="text/css" href="../assets/vendor/libs/bs-stepper/bs-stepper.css">
	<script type="text/javascript" src="../assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
</head>

<body>
	<!-- Layout wrapper -->
	<div class="layout-wrapper layout-content-navbar">
		<div class="layout-container">
			<!-- Menu -->
			<?php include('../includes/aside.php')?>

			<div class="layout-page">
				<?php include('../includes/navbar.php')?>
				<!-- Content wrapper -->
				<div class="content-wrapper">
					<div class="container-xxl flex-grow-1 container-p-y">
						<div class="card">
							<div class="card-body">
								<h2 class="card-title text-muted ms-3">
									Tournament Creation
								</h2>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">
										<div id="wizard-validation" class="bs-stepper vertical wizard-modern wizard-modern-vertical mt-2">
											<div class="bs-stepper-header">
												<div class="step" data-target="#account-details-validation">
													<button type="button" class="step-trigger">
														<span class="bs-stepper-circle">1</span>
														<span class="bs-stepper-label mt-1">
															<span class="bs-stepper-title">Account Details</span>
															<span class="bs-stepper-subtitle">Setup Account Details</span>
														</span>
													</button>
												</div>
												<div class="line">
													<i class="bx bx-chevron-right"></i>
												</div>
												<div class="step" data-target="#personal-info-validation">
													<button type="button" class="step-trigger">
														<span class="bs-stepper-circle">2</span>
														<span class="bs-stepper-label mt-1">
															<span class="bs-stepper-title">Personal Info</span>
															<span class="bs-stepper-subtitle">Add personal info</span>
														</span>
													</button>
												</div>
												<div class="line">
													<i class="bx bx-chevron-right"></i>
												</div>
												<div class="step" data-target="#social-links-validation">
													<button type="button" class="step-trigger">
														<span class="bs-stepper-circle">3</span>
														<span class="bs-stepper-label mt-1">
															<span class="bs-stepper-title">Social Links</span>
															<span class="bs-stepper-subtitle">Add social links</span>
														</span>
													</button>
												</div>
											</div>
											<div class="bs-stepper-content">
												<form id="wizard-validation-form" onSubmit="return false">
													<!-- Account Details -->
													<div id="account-details-validation" class="content">
														<div class="content-header mb-3">
															<h6 class="mb-0">Account Details</h6>
															<small>Enter Your Account Details.</small>
														</div>
														<div class="row g-3">
															<div class="col-sm-6">
																<label class="form-label" for="formValidationUsername">Username</label>
																<input type="text" name="formValidationUsername" id="formValidationUsername" class="form-control" placeholder="johndoe" />
															</div>
															<div class="col-sm-6">
																<label class="form-label" for="formValidationEmail">Email</label>
																<input type="email" name="formValidationEmail" id="formValidationEmail" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe" />
															</div>
															<div class="col-sm-6 form-password-toggle">
																<label class="form-label" for="formValidationPass">Password</label>
																<div class="input-group input-group-merge">
																	<input type="password" id="formValidationPass" name="formValidationPass" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="formValidationPass2" />
																	<span class="input-group-text cursor-pointer" id="formValidationPass2"><i class="bx bx-hide"></i></span>
																</div>
															</div>
															<div class="col-sm-6 form-password-toggle">
																<label class="form-label" for="formValidationConfirmPass">Confirm Password</label>
																<div class="input-group input-group-merge">
																	<input type="password" id="formValidationConfirmPass" name="formValidationConfirmPass" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="formValidationConfirmPass2" />
																	<span class="input-group-text cursor-pointer" id="formValidationConfirmPass2"><i class="bx bx-hide"></i></span>
																</div>
															</div>
															<div class="col-12 d-flex justify-content-between">
																<button class="btn btn-label-secondary btn-prev" disabled>
																	<i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
																	<span class="align-middle d-sm-inline-block d-none">Previous</span>
																</button>
																<button class="btn btn-primary btn-next">
																	<span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
																	<i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
																</button>
															</div>
														</div>
													</div>
													<!-- Personal Info -->
													<div id="personal-info-validation" class="content">
														<div class="content-header mb-3">
															<h6 class="mb-0">Personal Info</h6>
															<small>Enter Your Personal Info.</small>
														</div>
														<div class="row g-3">
															<div class="col-sm-6">
																<label class="form-label" for="formValidationFirstName">First Name</label>
																<input type="text" id="formValidationFirstName" name="formValidationFirstName" class="form-control" placeholder="John" />
															</div>
															<div class="col-sm-6">
																<label class="form-label" for="formValidationLastName">Last Name</label>
																<input type="text" id="formValidationLastName" name="formValidationLastName" class="form-control" placeholder="Doe" />
															</div>
															<div class="col-sm-6">
																<label class="form-label" for="formValidationCountry">Country</label>
																<select class="select2" id="formValidationCountry" name="formValidationCountry">
																	<option label=" "></option>
																	<option>UK</option>
																	<option>USA</option>
																	<option>Spain</option>
																	<option>France</option>
																	<option>Italy</option>
																	<option>Australia</option>
																</select>
															</div>
															<div class="col-sm-6">
																<label class="form-label" for="formValidationLanguage">Language</label>
																<select class="selectpicker w-auto" id="formValidationLanguage" data-style="btn-transparent" data-icon-base="bx" data-tick-icon="bx-check text-white" name="formValidationLanguage" multiple>
																	<option>English</option>
																	<option>French</option>
																	<option>Spanish</option>
																</select>
															</div>
															<div class="col-12 d-flex justify-content-between">
																<button class="btn btn-primary btn-prev">
																	<i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
																	<span class="align-middle d-sm-inline-block d-none">Previous</span>
																</button>
																<button class="btn btn-primary btn-next">
																	<span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
																	<i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
																</button>
															</div>
														</div>
													</div>
													<!-- Social Links -->
													<div id="social-links-validation" class="content">
														<div class="content-header mb-3">
															<h6 class="mb-0">Social Links</h6>
															<small>Enter Your Social Links.</small>
														</div>
														<div class="row g-3">
															<div class="col-sm-6">
																<label class="form-label" for="formValidationTwitter">Twitter</label>
																<input type="text" name="formValidationTwitter" id="formValidationTwitter" class="form-control" placeholder="https://twitter.com/abc" />
															</div>
															<div class="col-sm-6">
																<label class="form-label" for="formValidationFacebook">Facebook</label>
																<input type="text" name="formValidationFacebook" id="formValidationFacebook" class="form-control" placeholder="https://facebook.com/abc" />
															</div>
															<div class="col-sm-6">
																<label class="form-label" for="formValidationGoogle">Google+</label>
																<input type="text" name="formValidationGoogle" id="formValidationGoogle" class="form-control" placeholder="https://plus.google.com/abc" />
															</div>
															<div class="col-sm-6">
																<label class="form-label" for="formValidationLinkedIn">LinkedIn</label>
																<input type="text" name="formValidationLinkedIn" id="formValidationLinkedIn" class="form-control" placeholder="https://linkedin.com/abc" />
															</div>
															<div class="col-12 d-flex justify-content-between">
																<button class="btn btn-primary btn-prev">
																	<i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
																	<span class="align-middle d-sm-inline-block d-none">Previous</span>
																</button>
																<button class="btn btn-success btn-next btn-submit">Submit</button>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</li>
								</ul>
								
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php include('../includes/script.php')?>
<script type="text/javascript">	
	const select2 = $('.select2'),
	selectPicker = $('.selectpicker');
	const wizardValidation = document.querySelector('#wizard-validation');
	if (typeof wizardValidation !== undefined && wizardValidation !== null) {
	// Wizard form
	const wizardValidationForm = wizardValidation.querySelector('#wizard-validation-form');
	// Wizard steps
	const wizardValidationFormStep1 = wizardValidationForm.querySelector('#account-details-validation');
	const wizardValidationFormStep2 = wizardValidationForm.querySelector('#personal-info-validation');
	const wizardValidationFormStep3 = wizardValidationForm.querySelector('#social-links-validation');
	// Wizard next prev button
	const wizardValidationNext = [].slice.call(wizardValidationForm.querySelectorAll('.btn-next'));
	const wizardValidationPrev = [].slice.call(wizardValidationForm.querySelectorAll('.btn-prev'));
	let validationStepper = new Stepper(wizardValidation, {
		linear: true
	});
	
	// Account details
	const FormValidation1 = FormValidation.formValidation(wizardValidationFormStep1, {
		fields: {
			formValidationUsername: {
				validators: {
					notEmpty: {
						message: 'The name is required'
					},
					stringLength: {
						min: 6,
						max: 30,
						message: 'The name must be more than 6 and less than 30 characters long'
					},
					regexp: {
						regexp: /^[a-zA-Z0-9 ]+$/,
						message: 'The name can only consist of alphabetical, number and space'
					}
				}
			},
			formValidationEmail: {
				validators: {
					notEmpty: {
						message: 'The Email is required'
					},
					emailAddress: {
						message: 'The value is not a valid email address'
					}
				}
			},
			formValidationPass: {
				validators: {
					notEmpty: {
						message: 'The password is required'
					}
				}
			},
			formValidationConfirmPass: {
				validators: {
					notEmpty: {
						message: 'The Confirm Password is required'
					},
					identical: {
						compare: function() {
							return wizardValidationFormStep1.querySelector('[name="formValidationPass"]').value;
						},
						message: 'The password and its confirm are not the same'
					}
				}
			}
		},
		plugins: {
			trigger: new FormValidation.plugins.Trigger(),
			bootstrap5: new FormValidation.plugins.Bootstrap5({
	        // Use this for enabling/changing valid/invalid class
	        // eleInvalidClass: '',
	        eleValidClass: ''
	    }),
			autoFocus: new FormValidation.plugins.AutoFocus(),
			submitButton: new FormValidation.plugins.SubmitButton()
		}
		init: instance => {
			instance.on('plugins.message.placed', function(e) {
	        //* Move the error message out of the `input-group` element
	        if (e.element.parentElement.classList.contains('input-group')) {
	        	e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
	        }
	    });
		}
	}).on('core.form.valid', function() {
	    // Jump to the next step when all fields in the current step are valid
	    validationStepper.next();
	});
	
	// Personal info
	const FormValidation2 = FormValidation.formValidation(wizardValidationFormStep2, {
		fields: {
			formValidationFirstName: {
				validators: {
					notEmpty: {
						message: 'The first name is required'
					}
				}
			},
			formValidationLastName: {
				validators: {
					notEmpty: {
						message: 'The last name is required'
					}
				}
			},
			formValidationCountry: {
				validators: {
					notEmpty: {
						message: 'The Country is required'
					}
				}
			},
			formValidationLanguage: {
				validators: {
					notEmpty: {
						message: 'The Languages is required'
					}
				}
			}
		},
		plugins: {
			trigger: new FormValidation.plugins.Trigger(),
			bootstrap5: new FormValidation.plugins.Bootstrap5({
	        // Use this for enabling/changing valid/invalid class
	        // eleInvalidClass: '',
	        eleValidClass: ''
	    }),
			autoFocus: new FormValidation.plugins.AutoFocus(),
			submitButton: new FormValidation.plugins.SubmitButton()
		}
	}).on('core.form.valid', function() {
	    // Jump to the next step when all fields in the current step are valid
	    validationStepper.next();
	});
	
	// Bootstrap Select (i.e Language select)
	if (selectPicker.length) {
		selectPicker.each(function() {
			var $this = $(this);
			$this.selectpicker().on('change', function() {
				FormValidation2.revalidateField('formValidationLanguage');
			});
		});
	}
	
	// Select 2 (i.e Country select)
	if (select2.length) {
		select2
		.select2({
			placeholder: 'Select an country'
		})
		.on('change.select2', function() {
	        // Revalidate the color field when an option is chosen
	        FormValidation2.revalidateField('formValidationCountry');
	    });
	}
	
	// Social links
	const FormValidation3 = FormValidation.formValidation(wizardValidationFormStep3, {
		fields: {
			formValidationTwitter: {
				validators: {
					notEmpty: {
						message: 'The Twitter URL is required'
					},
					uri: {
						message: 'The URL is not proper'
					}
				}
			},
			formValidationFacebook: {
				validators: {
					notEmpty: {
						message: 'The Facebook URL is required'
					},
					uri: {
						message: 'The URL is not proper'
					}
				}
			},
			formValidationGoogle: {
				validators: {
					notEmpty: {
						message: 'The Google URL is required'
					},
					uri: {
						message: 'The URL is not proper'
					}
				}
			},
			formValidationLinkedIn: {
				validators: {
					notEmpty: {
						message: 'The LinkedIn URL is required'
					},
					uri: {
						message: 'The URL is not proper'
					}
				}
			}
		},
		plugins: {
			trigger: new FormValidation.plugins.Trigger(),
			bootstrap5: new FormValidation.plugins.Bootstrap5({
	        // Use this for enabling/changing valid/invalid class
	        // eleInvalidClass: '',
	        eleValidClass: ''
	    }),
			autoFocus: new FormValidation.plugins.AutoFocus(),
			submitButton: new FormValidation.plugins.SubmitButton()
		}
	}).on('core.form.valid', function() {
	    // You can submit the form
	    // wizardValidationForm.submit()
	    // or send the form data to server via an Ajax request
	    // To make the demo simple, I just placed an alert
	    alert('Submitted..!!');
	});
	
	wizardValidationNext.forEach(item => {
		item.addEventListener('click', event => {
	      // When click the Next button, we will validate the current step
	      switch (validationStepper._currentIndex) {
	      	case 0:
	      	FormValidation1.validate();
	      	break;

	      	case 1:
	      	FormValidation2.validate();
	      	break;

	      	case 2:
	      	FormValidation3.validate();
	      	break;

	      	default:
	      	break;
	      }
	  });
	});
	
	wizardValidationPrev.forEach(item => {
		item.addEventListener('click', event => {
			switch (validationStepper._currentIndex) {
				case 2:
				validationStepper.previous();
				break;

				case 1:
				validationStepper.previous();
				break;

				case 0:

				default:
				break;
			}
		});
	});
}
</script>

</html>