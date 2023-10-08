function participateProcessor(target, input, max) {
	let inputElement = document.getElementById(input);
	let targetElement = document.getElementById(target);

	inputElement.addEventListener('keyup', (event) => {
		let inputValue = event.target.value.replace(/\s*-\s*/g, "");
		if (inputValue.length == max) {
			inputElement.blur();
			targetElement.style.minHeight = '18rem';
			event.target.disabled = true;
			LoadingUI();
			AJAXProcessor(inputValue, target);
			event.target.disabled = false;
		}
	});
	function LoadingUI() {
		$("#target").block({
			message: '<div class="spinner-border text-primary" role="status"></div>',
			css: {
				backgroundColor: "transparent",
				border: "0"
			},
			overlayCSS: {
				backgroundColor: "#000",
				opacity: 0.25
			}
		})
	}
	function AJAXProcessor(ID, target) {
		var requestData = {
			tournamentID: ID
		};
		$.ajax({
			type: 'POST',
			url: '../process/searchTournament.php',
			data: JSON.stringify(requestData),
			contentType: 'application/json',
			dataType: 'json',
			success: function (data) {
				let mailRestrict = updateInformation(data, target);
				if(data.openParticipation == "off") {
					let participateButton = document.getElementById('participateModal');
					participateButton.disabled = true;
				}
				$("#target").unblock();
				if (mailRestrict != 'None') {
					modalProcess(mailRestrict);
				}	
			},
			error: function (xhr, textStatus, errorThrown) {
				console.error('Error:', textStatus, errorThrown);
				$("#target").unblock();
				$(`#${target}`).html(`
				<div class="card text-center" style="border: 1px solid #444564;">
					<div class="card-header">An error occurred while searching for the tournament.</div>
				</div>
				`);
			}
		});
	}
	function updateInformation(data, target) {
		if (data.message == 'Invalid request') {
			$(`#${target}`).html(`
			<div class="card text-center" style="border: 1px solid #444564;">
				<div class="card-header">Invalid Request</div>
			</div>
			`);
		} else if (data.message == 'Tournament not found') {
			$(`#${target}`).html(`
			<div class="card text-center" style="border: 1px solid #444564;">
				<div class="card-header">Tournament Not Found</div>
			</div>
			`);
		} else {
			// $(`#${target}`).find('.card-title')[0].text(data.tournamentName); //For loading spinner check
			let emailRestriction = (data.emailRestriction == null) ? 'None' : data.emailRestriction;
			let openParticipation = data.openParticipation.toUpperCase();
			$(`#${target}`).html(`
			<div class="card text-center" style="border: 1px solid #444564;">
				<div class="card-body">
					<h3 class="card-title">${data.tournamentName}</h3>
					<p class="card-text" style="text-align:justify;display:flex;justify-content:center;">${data.description}</p>
					<p class="card-text" style="text-align:justify;display:flex;justify-content:center;">Email-Restriction  :  <span id="tournamentEmailRestriction" class="ps-3">${emailRestriction}</span></p>
					<p class="card-text" style="text-align:justify;display:flex;justify-content:center;">Open-Participation  :  <span id="tournamentEmailRestriction" class="ps-3 ">${openParticipation}</span></p>
					<button id='participateModal' class="btn btn-primary">Participate</button>
				</div>
			</div>
			`);
			return emailRestriction;
		}
	}
	function modalProcess(email) {
		var mailModal = new bootstrap.Modal(document.getElementById('emailModalToggle'));
		let participateModal = document.getElementById('participateModal');
		participateModal.addEventListener('click', () => {
			let mailRestrictionField = document.getElementById('mailRestrictionField');
			mailModal.show();
			mailRestrictionField.innerHTML = email;
			document.getElementById('modalEmail').placeholder = 'example' + email;
		});

	}
}