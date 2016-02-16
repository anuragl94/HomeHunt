<!DOCTYPE HTML>
<html>
<head>
	 <title>HomeHunt</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/cosmo.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrapaddon.css">
	<link rel="shortcut icon" href="images/icon2.png">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<br><br><br>

<?php
include('config.php');
include('navbar.php');
$userid=$_SESSION['userid'];
$connect = mysql_connect("$db_host","$db_username","$db_password","$db_name") or die("Couldn't connect!");
	mysql_select_db("$db_name") or die("DataBase not found!");
	
	$query = "SELECT * FROM property WHERE User_ID = '$userid'";
	echo $query;
	$query = mysql_query($query);
	$result = mysql_num_rows($query);

if($result!=0)
{
echo '<div class="container">
		<div class="jumbotron">
		  <h1>HomeHunt</h1>		
		  <p>Successfully uploaded! :)</p>';
}
else
	echo '<div class="row"><div class="col-md-2"><p>Problem displaying data</p></div></div>';
	echo '</div></div>';

?>
</body>
</html>
