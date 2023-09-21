const form = document.getElementById("formAuthentication");
const email = document.getElementById("email");
const password = document.getElementById("password");


form.addEventListener('submit',(e) => {
	if(!validateInput()){
		e.preventDefault();
	}
	validateInput();
}) 

function validateInput(){
	const emailValue = email.value.trim();
	const passwordValue = password.value.trim();
	
	var valid = true;

	if(emailValue === ""){
		setErrorFor(email,"*Email Field cannot be blank");
		valid = false;
	}else if(!isEmail(emailValue)){
		setErrorFor(email,"*Email Format is Invalid");
		valid = false;
	}else {
		removeError(email);
	}

	if(passwordValue == ""){
		setErrorFor(password,"*Password Field cannot be blank");
		valid = false;
	}else{
		removeError(password);
	}
	return valid;
}
function setErrorFor(element,message){
	var input;
	if(element.parentElement.classList.contains('Input')) {
		input = element.parentElement;		
	} else {
		input = element.parentElement.parentElement;
	}
	const small = input.querySelector('small');
	input.classList.add("error");
	small.innerText = message;
}
function removeError(element){
	const input = element.parentElement;
	input.classList.remove("error");
}
function isEmail(email){
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
	
}
