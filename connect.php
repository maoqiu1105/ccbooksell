<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "wangqiao";
$db = "wqlhx_ccbooksell";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
	
}

?>