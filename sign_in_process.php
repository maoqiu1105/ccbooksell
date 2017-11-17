<?php

	include('connect.php');

/*get user input name from submited form*/
	$user_name = $_POST['username'];
	
	
/*get user input first password from submited form*/	
	$first_user_password = $_POST['first_password'];

	
/*get user input second password from submited form*/
	$second_user_password = $_POST['second_password'];

		
/*validation for user name and password*/
	$CONST_CHAR_MAX = 100;
	$CONST_CHAR_MIN = 0;
	$name_length = strlen($user_name);
	$first_password_length = strlen($first_user_password);
	$second_password_length = strlen($second_user_password);
	$validation_msg = "";

/*validation for name*/	
	if(($name_length > $CONST_CHAR_MIN) && ($name_length < $CONST_CHAR_MAX))
	{
		/*some detection of sql interjection or regular expression here*/
			/*after js validation and php validation do the resigning of value*/
				/*echo name validated*/

	}else{
		$validation_msg .= "name can not be empty or far beyound 20 characters" . "\n";
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
		echo $user_name."\n".$first_user_password."\n".$second_user_password."\n";
		
		
		$sql = "INSERT INTO tblseller(name,password,book_ID,seller_ID)
				VALUE('$user_name','$first_user_password','111',Default)";	
		if($conn->query($sql)=== TRUE)
		{
			echo "New record created successfully";
		}else{
			echo "Error: ".$sql."<br>".$conn->error;
		}
	}
	
	
	
	$conn->close();
?>
