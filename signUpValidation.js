const form = document.getElementById("formAuthentication");
const email = document.getElementById("email");
const firstname = document.getElementById("firstname");
const lastname = document.getElementById("lastname");
const password = document.getElementById("password");
const password2 = document.getElementById("cpassword");


form.addEventListener('submit',(e) => {
	if(!validateInput()){
		e.preventDefault();
	}
	validateInput();
});

function validateInput(){
	const firstnameValue = firstname.value.trim();
	const lastnameValue = lastname.value.trim();
	const emailValue = email.value.trim();
	const passwordValue = password.value.trim();
	const password2Value = password2.value.trim();

	var valid = true;
	if(firstnameValue === "") {
		setErrorFor(firstname,"*First Name Field cannot be blank");
		valid = false;
	}else if(!isName(firstnameValue)){
		setErrorFor(firstname,"*First Name Format is Invalid");
		valid = false;
	}else{
		removeError(firstname);
	}
	if(lastnameValue === "") {
		setErrorFor(lastname,"*Last Name Field cannot be blank");
		valid = false;
	}else if(!isName(lastnameValue)){
		setErrorFor(lastname,"*Last Name Format is Invalid");
		valid = false;
	}else{
		removeError(lastname);
	}
	if(emailValue === ""){
		setErrorFor(email,"*Email Field cannot be blank");
		valid = false;
	}else if(!isEmail(emailValue)){
		setErrorFor(email,"*Email Format is Invalid");
		valid = false;
	}else{
		removeError(email);
	}

	if(passwordValue === ""){
		setErrorFor(password,"*Password Field cannot be blank");
		valid = false;
	// }else if(!isPassword(passwordValue)){
	// 	setErrorFor(password,"*Password must be at least 6 character long with at least 1 digit");
	// 	valid = false;
	// 	return;
	}else{
		removeError(password);
	}
	if(password2Value === ""){
		setErrorFor(password2,"*Password Field cannot be blank");
		valid = false;
	}else if(!matchPassword(passwordValue,password2Value)){
		setErrorFor(password,"*Passwords do not match");
		setErrorFor(password2,"*Passwords do not match");
		valid = false;
	}else{
		removeError(password2);
	}
	console.log(valid);
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
function isName(name) {
	return /^[A-Za-z'-]{1,50}$/.test(name);
}
function isEmail(email){
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}
function isPassword(password){
	return /^(?=.*\d)[A-Za-z\d]{6,}$/.test(password);

}
function matchPassword(password,password2){
	return password == password2;
}