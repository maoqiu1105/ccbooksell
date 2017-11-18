
	<?php
	
	include('connect.php');

/*get user input name from submited form*/
	$user_name = $_POST['username'];
	
	
/*get user input of their email address*/
	$user_email_address = $_POST['email_address'];
	
	
/*get user input first password from submited form*/	
	$first_user_password = $_POST['first_password'];

	
/*get user input second password from submited form*/
	$second_user_password = $_POST['second_password'];

		
/*validation for user name and password*/
	$CONST_CHAR_MAX = 100;
	$CONST_CHAR_MIN = 0;
	$CONST_EMAIL_LIMIT = 40;
	$name_length = strlen($user_name);
	$email_length = strlen($user_email_address);
	$first_password_length = strlen($first_user_password);
	$second_password_length = strlen($second_user_password);
	$validation_msg = "";

/*validation for name*/	
	if(($name_length > $CONST_CHAR_MIN) && ($name_length < $CONST_CHAR_MAX))
	{
		/*some detection of sql interjection or regular expression here*/
			/*after js validation and php validation do the resigning of value*/
				/*echo name validated*/

				if(preg_match("/^[a-zA-Z]*$/",$user_name))
				{
					/*check if the name is already exist in database*/
				}
				else
				{
					$validation_msg .= "name can not be containt any special characters like '#%&*.~'";
				}

	}else{
		$validation_msg .= "name can not be empty or far beyound 40 characters" . "\n";
	}
	
/*
validation for email address
ref:https://www.w3schools.com/php/php_form_url_email.asp
*/

	if(($email_length < $CONST_EMAIL_LIMIT) &&($email_length > $CONST_CHAR_MIN))
	{
		if(filter_var($user_email_address,FILTER_VALIDATE_EMAIL))
		{
			/*check if it is already exist in database*/
		}
		else
		{
			$validation_msg .= "email address is invalid, please try again";
		}
	}

/*validation for user password twoice*/
/*firstly check they are equal*/
	/*secondly check they are null or far beyound the limitation*/
		/*last but not finally, need to work on sql interjection and regular expression as well*/
		/*after all js and detection of sql interjection resigning of the password value*/
		
	if($first_user_password === $second_user_password)
	{
		if(($first_password_length != $CONST_CHAR_MIN) && ($first_password_length < $CONST_CHAR_MAX))
		{
			/*some sql interjection detection here*/

		}
		else
		{
			$validation_msg .= "notice of password can not be empty or far beyound 20 characters"."\n";
		}
	}else if($first_user_password != $second_user_password)
	{
		$validation_msg .= "different password were typied in, check them please"."\n";			
	}
	
	if($validation_msg != "")
	{
		echo $validation_msg;
		
	}else if($validation_msg == "")
	{
		echo $user_name."\n".$user_email_address."\n".$first_user_password."\n";
				
		$sql = "INSERT INTO tblseller(seller_Name,seller_Email_Address,seller_Password,seller_ID)
				VALUE('$user_name','$user_email_address','$first_user_password',Default)";	
		if($conn->query($sql)=== TRUE)
		{
			echo "New record created successfully";
		}else{
			echo "Error: ".$sql."<br>".$conn->error;
		}
	}
	$conn->close();
?>





