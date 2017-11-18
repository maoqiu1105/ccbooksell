

<?php

	session_start();
?>


<?php

	include ("sign_in_process.php");

 	$_SESSION['seller_email'] = "";
 	$_SESSION['seller_password'] = "";
	
	$seller_info = $_SESSION['seller_email'].$_SESSION['seller_password'];
	echo $seller_info;



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p>welcome</p>
</body>
</html>