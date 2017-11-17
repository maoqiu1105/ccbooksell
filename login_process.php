
<?php

include "connect.php";

$user_email = $_POST['email'];
$user_password = $_POST['password'];

//get off sql interjections attack with specal symbol//
//$user_email = stripcslashes($user_email);
//$user_password = stripcslashes($user_password);
//$user_email = mysqli_real_escape_string($user_email);
//$user_password = mysqli_real_escape_string($user_password);

			//	or die("Sorry failed to login : ". mysql_error());//

//query the database for user//
$sql = "select * from tblseller where 
	email_Address = '".$user_email."' AND password = '".$password."'";

$result = $conn->query($sql)	
$row = mysql_fetch_array($result)

if ($row['email_Address'] == $user_email)
{
	if($row['password'] == $password)
	{
		echo "Welcome ".$row['name'];
	}
	
}
else("login failed, try one more time plase");
?>