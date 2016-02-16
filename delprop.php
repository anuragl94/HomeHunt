<?php
session_start();
	require "config.php";
	if(isset($_GET['pid']))
{
	$pid=$_GET['pid'];
	
	$con=mysqli_connect("$db_host","$db_username","$db_password","$db_name");
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_SESSION) and isset($_SESSION["userid"]))
		$userid = $_SESSION["userid"];
	else
		{header("location: login.php");}
$sql="DELETE FROM property WHERE PropertyID=$pid AND User_ID =$userid";
ECHO "DELETE FROM property WHERE PropertyID=$pid AND User_ID =$userid";

if (!mysqli_query($con,$sql))
{
  die('Error: ' . mysqli_error($con));
}
echo "record deleted";
mysqli_close($con);
header("Location: viewprop.php");
}
?>
