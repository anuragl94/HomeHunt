 <!DOCTYPE HTML>
<html>
<head>
	 <title>HomeHunt</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/cosmo.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrapaddon.css">
	<link rel="shortcut icon" href="images/icon2.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
include('config.php'); //contains the connection to the database homehunt.sql
include('navbar.php');
$userid = $_SESSION['userid'];
extract($_POST);
ECHO "<br><br><br>";

if (!isset($_SESSION['valid']))
	header("location: login.php");	// If not logged in, redirect to login page. Straight to the point.
else {
	if (!isset($_FILES['image']['tmp_name'])) {
		$location="";
		}
		else {
		$file=$_FILES['image']['tmp_name'];
		$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name= addslashes($_FILES['image']['name']);
				
				move_uploaded_file($_FILES["image"]["tmp_name"],"images/thumbs/" . $_FILES["image"]["name"]);
				
				$location="images/thumbs/" . $_FILES["image"]["name"];
				
		}
	$query = "INSERT INTO property (User_ID, Area,City,NoOfRooms,QuotedPrice,PropertyName,Zipcode,HouseNo,StreetNo,Image,PropertyUpFor) VALUES ('$userid', '$Area','$City','$NoOfRooms','$QuotedPrice','$PropertyName','$Zipcode','$HouseNo','$StreetNo','$location','$PropertyUpFor')";
	ECHO $query;
	$query = $mysqli->query($query);
	header("location: displayproperty.php");
}
?>
</body>
</html>