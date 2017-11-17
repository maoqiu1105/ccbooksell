<!DOCTYPE html>
<html>
<head>
	<title>
		<?php
		$book_name=$_GET["book_name"];
		echo $book_name." -  detail";
		?>
	</title>
</head>
<body>
	<?php
		include("connect.php");
		$book_name=$_GET["book_name"];
		$sql="SELECT book_ID, book_Name, category_Name, book_ISBN, book_Price, date_Post, seller_Name, sell_Email_Address FROM tblcategory
					JOIN tblbook 
    					ON tblcategory.category_ID = tblbook.book_Category_ID
					JOIN tblseller 
    					ON tblbook.seller_ID = tblseller.seller_ID
					WHERE book_Name = '".$book_name."'";
		$result=$conn->query($sql);
		$row = $result->fetch_assoc();	
		echo 
			//display book detail information
			"<fieldset>
				<legend>book detail</legend>".
				"book name: ".$row["book_Name"]."<br>".
				"book category: ".$row["category_Name"]."<br>".
		    	"book ISBN: ".$row["book_ISBN"]."<br>".
				"book price: ".$row["book_Price"]."<br>".
				"post date: ".$row["date_Post"]."<br>".
			"</fieldset>";

			//display the seller contact information
			"<fieldset><legend>seller contact information</legend>".
				"seller name: ".$row["seller_Name"]."<br>".
				"seller email: ". $row["seller_Email_Address"]. "<br>".
			"</fieldset>";

		//close the database connection 
		$conn->close();
	?>
</body>
</html>