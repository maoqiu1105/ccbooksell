<?php

session_start();
include ('connect.php');


if(isset($_POST['email_address'])){

	$seller_email_address = mysqli_real_escape_string($conn,$_POST['email_address']); 	

	}			
	else if(isset($_SESSION['email']))
	{
		$seller_email_address = $_SESSION['email'];
	}


if (isset($_POST['password'])) {

	$seller_password = mysqli_real_escape_string($conn,$_POST['password']);

	}
	else if(isset($_SESSION['password']))
	{
		$seller_password = $_SESSION['password'];
	}

$sql = "SELECT * FROM tblseller WHERE 
			seller_Email_Address = '".$seller_email_address."' 
			AND seller_Password = '".$seller_password."'";	

$result = $conn->query($sql);

	if($result->num_rows > 0 )
	{	

	}

	else
	{
		echo "Sorry, failed to login with the eamil you just typed in, try again please";
	}

?>