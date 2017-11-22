<?php

	session_start();
	$move = $_SESSION['move'];
	$error_msg = $_SESSION['error'];

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php  $move." "."error"?></title>
</head>
<body>
	<p>
		<?php	echo $error_msg?>	
	</p>	
</body>
</html>