
<?php

include ('connect.php');

$user_email = $_POST['email_address'];
$user_password = $_POST['password'];

//get off sql interjections attack with specal symbol//
//$user_email = stripcslashes($user_email);
//$user_password = stripcslashes($user_password);
//$user_email = mysqli_real_escape_string($user_email);
//$user_password = mysqli_real_escape_string($user_password);

			//	or die("Sorry failed to login : ". mysql_error());//

//query the database for user//

$sql = "select * from tblseller where 
	seller_Email_Address = '".$user_email."' AND seller_Password = '".$user_password."'";	
	

$result = $conn->query($sql);

if($result->num_rows > 0 )
{	

	while($row = $result -> fetch_assoc())
	{
		$The_seller_ID = $row['seller_ID'];
		
		$book_sql = "select * from tblbook where
		seller_ID = '".$The_seller_ID."'";
		
		$book_result = $conn->query($book_sql);
		
		echo
			$row['seller_Name'].
			"<br><br>";
			
		if($result->num_rows > 0 )
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
}

else
{
	echo "Sorry, failed to login with the eamil you just typed in, try again please";
}

?>