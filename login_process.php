<?php
include ('connect.php');

$seller_email_address = mysqli_real_escape_string($conn,$_POST['email_address']); 
$seller_password = mysqli_real_escape_string($conn,$_POST['password']);

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