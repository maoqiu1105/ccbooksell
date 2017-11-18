function ValidateForm() {
	var book_name = document.forms["search"]["book_name"].value;
	var category_name = document.forms["search"]["category_name"].value;
	if (book_name == "" && category_name == "") {
		document.getElementById('error_message').innerHTML = "Sorry, we need book name or category.";
		return false;
	}
}

function ValidatePassword(){
	var fisrt_password = document.getElementByName('fisrt_password').value;
	var second_password = document.getElementByName('second_password').value;
	if (fisrt_password != second_password) {
		document.getElementById('password_error_message').innerHTML="Please confirm the two passwords are same";
		return false;
	}
}
