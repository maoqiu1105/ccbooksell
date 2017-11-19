<?
	session_start();
	$book_id=$_GET["book_id"];
	$book_name=$_GET["book_name"];
?>
<!DOCTYPE html>
<html>
<head>
		<script src="checkdata.js"></script>
	<title>
		<?php
		echo $book_name." -  detail";
		?>
	</title>
</head>
<body>
	<!-- search bar -->
	<header style="height: 30px">
		<div style="float: left;">
			<form action="book_list.php" method="get" name="search" onsubmit="return ValidateForm()">
				<input type="text" name="book_name">
				<select name="category_name">
					<option value="">please select your category</option>
					<option value="Art & Photography">Art & Photography</option>
					<option value="Biographies & Memoirs">Biographies & Memoirs</option>
					<option value="Children' 's Books">Children's Books</option>
				</select>
				<input type="submit" value="Search">
			</form>
		</div>
		<div style="float: right;">
			<button type="button" onclick="window.location='sign_in.html'">Sign in</button>
			<button type="button" onclick="window.location='login.html'">Login</button>
		</div>
	</header>
	<!--error message cuz the text inout or category selection is blank -->
	<p id="error_message"></p>
	<!-- line to divide the search bar and searched book list -->
	<hr>
	<!--book detail go here-->
	<?php
		include("connect.php");
		$sql="SELECT book_ID, book_Name, category_Name, book_ISBN, book_Price, date_Post, seller_Name, seller_Email_Address FROM tblcategory
					JOIN tblbook 
    					ON tblcategory.category_ID = tblbook.book_Category_ID
					JOIN tblseller 
    					ON tblbook.seller_ID = tblseller.seller_ID
					WHERE book_ID='".$book_id."';";
		$result=$conn->query($sql);
		$row = $result->fetch_assoc();
		echo 
			//display book detail information
			"<fieldset>".
				"<legend>book detail</legend>".
				"book name: ".$row["book_Name"]."<br>".
				"book category: ".$row["category_Name"]."<br>".
		    	"book ISBN: ".$row["book_ISBN"]."<br>".
				"book price: ".$row["book_Price"]."<br>".
				"post date: ".$row["date_Post"]."<br>".
				"book image: <img src=getimage.php?book_id=".$book_id.">".
			"</fieldset>";
		echo
			//display the seller contact information
			"<fieldset>".
				"<legend>seller contact information</legend>".
				"seller name: ".$row["seller_Name"]."<br>".
				"seller email: ". 
				"<a href='mailto:".$row["seller_Email_Address"]."'>".
				$row["seller_Email_Address"].
				"<br>".
			"</fieldset>";

		//close the database connection 
		$conn->close();
	?>

	<!-- line to divide the footer  -->
	<hr>
	<footer>
		<a href="index.html">home</a>
	</footer>
</body>
</html>