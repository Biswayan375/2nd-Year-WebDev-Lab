function checkName(name) {
	return (name.length >= 3 && isNaN(name[0]));
}

function checkPassword(password) {
	// password must be of 8 to 16 characters
	if (password.length < 8 || password.length > 16)
		return false;
	
	// must have a small case, a capital case character and a number
	let haveSmallLetter = false,
		haveCapitalLetter = false,
		haveNumber = false;
	
	for (let i = 0; i < password.length; i++) {
		if (password[i] >= 'a' && password[i] <= 'z')
			haveSmallLetter = true;
		if (password[i] >= 'A' && password[i] <= 'Z')
			haveCapitalLetter = true;
		if (!isNaN(password[i]))
			haveNumber = true;
	}
	
	return haveCapitalLetter && haveSmallLetter && haveNumber;
}

function matchConfirmPassword(pass, cPass) {
	return pass === cPass && cPass.length > 0;
}

function handleSubmit(event) {
	event.preventDefault();		// preventing the form from submitting
	let name = document.getElementById("name").value,
		pass = document.getElementById("pass").value,
		cPass = document.getElementById("c-pass").value;
	
	let nameInfo = document.getElementById("name-info"),
		passInfo = document.getElementById("passkey-info"),
		cPassInfo = document.getElementById("cpass-info")
	
	if (!checkName(name))
		nameInfo.innerHTML = '<font color="red">Name must not start with any number & must be at least 3 characters</font>';
	else
		nameInfo.innerHTML = `<font color="green">You're good to go </font>`;
	
	if (!checkPassword(pass))
		passInfo.innerHTML = '<font color="red">Password is not acceptable</font>';
	else
		passInfo.innerHTML = `<font color="green">You're good to go </font>`;
	
	if (!matchConfirmPassword(pass, cPass))
		cPassInfo.innerHTML = `<font color="red">Password didn't matched</font>`;
	else
		cPassInfo.innerHTML = `<font color="green">You're good to go </font>`;
		
	
	if (checkName(name) && checkPassword(pass) && matchConfirmPassword(pass, cPass)) {
		event.target.submit();
	}
}