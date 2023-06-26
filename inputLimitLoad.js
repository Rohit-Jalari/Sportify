function inputLimitLoad(target, input, max) {
	let targetElement = document.getElementById(target);
	let inputElement = document.getElementById(input);

	inputElement.addEventListener('keyup',(event) => {
		let inputValue = event.target.value.replace(/\s*-\s*/g, "");
		if(inputValue.length == max) {
			targetElement.innerHTML = inputValue;
			inputElement.blur();
				// inputElement.style.borderColor = "red";
			}

	});
}