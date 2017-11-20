<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
include("connect.php");

$book_id = $_GET["book_id"];

$sql = "SELECT * FROM tblbook WHERE book_ID = $book_id";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$image=$row["book_Img"];

header("content-type: image/jpeg");

echo $image;

?>