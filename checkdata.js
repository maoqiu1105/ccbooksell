function ValidateForm() {
	var book_name = document.forms["search"]["book_name"].value;
	var category_name = document.forms["search"]["category_name"].value;
	if (book_name == "" && category_name == "") {
		document.getElementById('error_message').innerHTML = "Sorry, we need book name or category.";
		return false;
	}
}

function ValidatePassword(){
	var first_password = document.forms["sign_in_form"]["first_password"].value;
	var second_password = document.forms["sign_in_form"]["second_password"].value;
	if (first_password.length <= 0 || second_password.length <= 0) {
		document.getElementById('password_error_message').innerHTML="password should not empty."
		return false;
	}
	else if (first_password != second_password) {
		document.getElementById('password_error_message').innerHTML="Please confirm the two passwords are same";
		return false;
	}
}
