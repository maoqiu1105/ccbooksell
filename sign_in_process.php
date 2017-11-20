<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
	session_start();
/*
	$_SESSION['email'] = $_POST['email_address'];
	$_SESSION['name'] = $_POST['sellername'];
*/
	include('connect.php');


	$seller_name = $_POST['sellername'];
	$seller_email_address = $conn->escape_string($_POST['email_address']); 
 	$first_user_password = $conn->escape_string(password_hash($_POST['first_password'], PASSWORD_BCRYPT));
	$second_user_password = $conn->escape_string(password_hash($_POST['second_password'], PASSWORD_BCRYPT));
	$hash = $conn->escape_string( md5( rand(0,1000) ) );

	$sql = "INSERT INTO tblseller(seller_Name,seller_Email_Address,seller_Password,seller_ID)
				VALUES ('".$seller_name."','".$seller_email_address."','".$first_user_password."',Default)";
	$result=$conn->query($sql);



	if ($result) {
		echo "win";
	}
	else
	{
		echo $conn->error;
	}


// /*check email address is exist*/
// 	$result = $conn->query("SELECT * FROM tblseller WHERE seller_Email_Address = '".$seller_email_address."'");

// 	$row  = $result->fetch_assoc();

// 	if( $row->num_rows == 0 )
// 	{
// 		/*	if( $result->num_rows != 0 )
// 	{
// 		$_SESSION['message'] = 'User with this email already exists!';
// 		header("location: error.php");
// 	}	*/
// 	/*else
// 	{
// allow to insert
// */
// 		$sql = "INSERT INTO tblseller(seller_Name,seller_Email_Address,seller_Password,seller_ID)
// 				VALUES ('$user_name','$user_email_address','$first_user_password',Default)";	
// 		if($conn->query($sql)=== TRUE)
// 		{
// 			echo "New record created successfully";
// 			header("location : index.html");
// 		}else{
// 			echo "Error: ".$sql."<br>".$conn->error;
// 			header("location: error.php");
// 		}
// 	}




	$conn->close();
?>





