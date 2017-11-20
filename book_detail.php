<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!DOCTYPE html>
<html>
<head>
	<script src="checkdata.js"></script>
	<link rel="stylesheet" type="text/css" href="./css_folder/book_detail.css">
	<link rel="stylesheet" type="text/css" href="./css_folder/shared.css">
	<title>
		<?php
			$book_id=$_GET["book_id"];
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
				<select name="category_name" style="height: 200%">
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
	<p id="error_message" style="color:red"></p>
	<!-- line to divide the search bar and searched book list -->
	<hr>
	<!-- select data from database -->
	<div id="main">
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
			//display the book image
			"<img src=getimage.php?book_id=".$book_id.">";
	?>
	<!--book detail go here-->
	<fieldset>
		<legend>book detail</legend>
		<?php
			echo //display book detail information
				"<table id=book_detail>
					<tr>
						<td>book name:</td>
						<td>".$row["book_Name"]."</td>
					</tr>
					<tr>
						<td>book category:</td>
						<td>".$row["category_Name"]."</td>
					</tr>
					<tr>
						<td>book ISBN:</td>
						<td>".$row["book_ISBN"]."</td>
					</tr>
					<tr>
						<td>book price:</td>
						<td>".$row["book_Price"]."</td>
					</tr>
						<td>post date</td>
						<td>".$row["date_Post"]."</td>
					</tr>
				</table>";
			
		?>
	</fieldset>
	<fieldset>
		<legend>seller contact information</legend>
		<?php
			echo
				//display the seller contact information
				"seller name: ".$row["seller_Name"]."<br>".
				"seller email: ". 
				"<a href='mailto:".$row["seller_Email_Address"]."'>contact me </a>".
				"<br>";
			//close the database connection 
			$conn->close();
		?>
	</fieldset>

	</div>
	

	<footer>
		<!-- line to divide the footer  -->
		<hr>
		<p><a href="index.html">Home</a></p>
	</footer>
</body>
</html>