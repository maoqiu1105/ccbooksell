<?php

	session_start();
	include ('connect.php');

	$move = $_SESSION['move'];
	$sellername = $_SESSION['name'];
	header("refresh:1; url=seller_page.php");

?>

<!DOCTYPE html>

<html>

	<head>

		<title>
			<?php echo $move." "."success"; ?>				
		</title>

	</head>

	<body>
		<p>
			<?php  echo $move." "."successed!"; ?>
		</p>
	</body>
</html>