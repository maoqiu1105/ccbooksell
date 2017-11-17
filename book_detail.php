<!DOCTYPE html>
<html>
<head>
	<title>
		<!--set up page title by book name-->
		<?php
		$book_name=$_GET["book_name"];
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
	<!--book detail go here-->
	<?php
		include("connect.php");
		$book_name=$_GET["book_name"];
		$sql="SELECT book_ID, book_Name, category_Name, book_ISBN, book_Price, date_Post, seller_Name, seller_Email_Address FROM tblcategory
					JOIN tblbook 
    					ON tblcategory.category_ID = tblbook.book_Category_ID
					JOIN tblseller 
    					ON tblbook.seller_ID = tblseller.seller_ID
					WHERE book_Name = '".$book_name."'";
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
	<footer>
		<a href="index.html">home</a>
	</footer>
</body>
</html>