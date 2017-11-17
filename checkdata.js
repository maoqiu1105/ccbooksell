function ValidateForm() {
		var book_name = document.forms["search"]["book_name"].value;
		var category_name = document.forms["search"]["category_name"].value;
		if (book_name == "" && category_name == "") {
			document.getElementById('error_message').innerHTML = "Sorry, we need book name or category.";
			return false;
		}
	}