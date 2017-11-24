<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./css_folder/seller_profile.css">
	<link rel="stylesheet" type="text/css" href="./css_folder/shared.css">
	<script src="checkdata.js"></script>
	<title>seller profile</title>
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
	<div class="main">
	<?php
	include('login_process.php');
	while($row = $result -> fetch_assoc())
		{
			$The_seller_ID = $row['seller_ID'];
			$book_result = "SELECT book_Name,book_Price,date_Post,book_ISBN,book_ID,category_Name FROM tblcategory
								JOIN  tblbook 
									ON tblcategory.category_ID = tblbook.book_Category_ID
								JOIN tblseller
									ON tblbook.seller_ID=tblseller.seller_ID
								WHERE tblseller.seller_ID = '".$The_seller_ID."'";
			$book_result = $conn->query($book_result);
			
			echo
			"<p>Welcome, ".$row['seller_Name']."<br><br></p>";
				
			//fetch the data from database and display them by table	
			if($book_result->num_rows > 0 )
			{
				while($book_row = $book_result -> fetch_assoc())
				{
					echo
					"<table>
						<tr><td>Book Name : </td><td>".$book_row['book_Name']."</td></tr>
						<tr><td>Book category : </td><td>".$book_row['category_Name']."</td></tr>
						<tr><td>Book ISBN : </td><td>".$book_row['book_ISBN']."</td></tr>
						<tr><td>Book Price : </td><td>".$book_row['book_Price']."</td></tr>
						<tr><td>Post date : </td><td>".$book_row['date_Post']."</td></tr>
					</table>
					<p id='manage_book'><button onclick=''>Add 	</a><a href='edit_book.php'>Edit </a><a href=''>Delete </a></p>";
				}
			}
			else {
				echo "your don't have any book here, do you want to add book?";
			}
		}
	?>	
	</div>
	<footer>
		<!-- line to divide the footer  -->
		<hr>	
		<a href="index.html">Home</a>
	</footer>
</body>
</html>

