<?php

	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p>
		<?php		
			$error_msg = $_SESSION['message'];
			echo $error_msg;
		?>	
	</p>	
</body>
</html>