<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./css_folder/book_list.css">
	<link rel="stylesheet" type="text/css" href="./css_folder/shared.css">
	<script src="checkdata.js"></script>
	<title>seller profile</title>
</head>
<body>

</body>
</html>
<?php
include('login_process.php');
while($row = $result -> fetch_assoc())
	{
		$The_seller_ID = $row['seller_ID'];
		$book_result = "SELECT * FROM tblbook WHERE seller_ID = '".$The_seller_ID."'";
		$book_result = $conn->query($book_result);
		
		echo
		"<p>Welcome, ".$row['seller_Name']."<br><br></p>";
			
		if($book_result->num_rows > 0 )
		{
			while($book_row = $book_result -> fetch_assoc())
			{
				echo
					"Book category : ".$book_row['book_Category_ID']."<br/>".
					"Book ID : ".$book_row['book_ID']."<br/>".
					"Book ISBN : ".$book_row['book_ISBN']."<br/>".
					"Book Name : ".$book_row['book_Name']."<br/>".
					"Book Price : ".$book_row['book_Price']."<br/>".
					"Sold Book : ".$book_row['book_Sold']."<br/>".
					"Post date : ".$book_row['date_Post']."<br/>".
					"Seller ID : ".$book_row['seller_ID'].
					"<br><br><br><br>";
			}
			
		}
	}
?>
