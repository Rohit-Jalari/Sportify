window.addEventListener('load',()=>{
		//getting current file location
		var url = location.href;
		//extracting current file name
		var urlFilename = url.substring(url.lastIndexOf('/')+1);
		console.log("urlFilename = "+urlFilename);
		var activePage = document.querySelectorAll(`a[href="../pages/${urlFilename}"]`);
		if(urlFilename == 'login.php' || urlFilename == 'register.php' || urlFilename == 'forgotPassword.php'){
			return;
		}
		if(urlFilename == 'index.php' || urlFilename == '') {
			return;
		}
		if(urlFilename != 'index.php' && urlFilename != '') {
			console.log(urlFilename);
			document.querySelectorAll(`a[href="../pages/index.php"]`)[1].parentElement.classList.remove('active');
			console.log(document.querySelectorAll(`a[href="../pages/index.php"]`)[1].parentElement);
		}
		if(activePage[0].parentElement.parentElement.className == "menu-sub"){
			// console.log("It's sub menu");
			activePage[0].parentElement.parentElement.parentElement.classList.add('active','open');
			activePage[0].parentElement.classList.add('active');
		} else{
			activePage[0].parentElement.classList.add('active');
		}
	});