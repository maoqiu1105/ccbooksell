<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="./css_folder/book_list.css">
		<link rel="stylesheet" type="text/css" href="./css_folder/shared.css">
		<script src="checkdata.js"></script>
		<title>book list</title>
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
		<h1>you searched by </h1>
		<p>
			<?php 
				if ($_GET["book_name"] != null) {
					echo "name: ".$_GET["book_name"]."<br>";
				}
				if ($_GET["category_name"] != null) {
					echo "category: ".$_GET["category_name"];			
				}
			?>
		</p>
		<!-- display the searched book list -->
		<div class="book_searched_result" >
			<table id="book_searched_table">
				<tr>
					<th>Book Name</th>
					<th>Category Name</th>
					<th>Price(CAD)</th>
					<th>Seller</th>
				</tr>
				<!-- get the book information from the wqlhx_ccbooksell database -->
				<?php
					//connect the database to php
					include("connect.php");
					$book_name = $_GET["book_name"];
					$category_name=$_GET["category_name"];
					// check the book name or category name 
					if ($book_name == null) {
						$sql = "SELECT book_ID, book_Name, category_Name, book_ISBN, book_Price, date_Post, seller_Name FROM tblcategory
								JOIN tblbook 
    								ON tblcategory.category_ID = tblbook.book_Category_ID
								JOIN tblseller 
    								ON tblbook.seller_ID = tblseller.seller_ID
								WHERE category_Name = '".$category_name."';";
					}
					else{
						$sql = "SELECT book_ID, book_Name, category_Name, book_ISBN, book_Price, date_Post, seller_Name FROM tblcategory
								JOIN tblbook 
    								ON tblcategory.category_ID = tblbook.book_Category_ID
								JOIN tblseller 
    								ON tblbook.seller_ID = tblseller.seller_ID
								WHERE book_Name LIKE '%".$book_name."%';";
					}
					$result = $conn->query($sql);
					if ($result->num_rows > 0) 
					{
						//output data from table
						while ($row = $result->fetch_assoc()) 
						{
							if ($row["category_Name"] != $category_name && $category_name != null) {
								echo "0 item";
							}
							else{
								echo 
								"<tr>".
									"<td>". 
									"<a href='book_detail.php?book_id=".$row["book_ID"]."&book_name=".$row["book_Name"]."'>".$row["book_Name"]. "</a>".
									"</td>".
									"<td>". $row["category_Name"]. "</td>".
									"<td>". $row["book_Price"]. "</td>".
									"<td>". $row["seller_Name"]. "</td>".
								"</tr>";
							}
						}
					}
					else
					{	
						echo "0 item";
					}
					$conn->close();
				?>			
			</table>
			
		</div>
		<!-- line to divide the footer  -->
		<hr>
		<footer>
			<a href="index.html">Home</a>
		</footer>
	</body>
</html>