<?php
session_start();	//LOGIN DETAILS FOR WEB DOMAIN
include_once("config.php");

	

if (isset($_SESSION) and isset($_SESSION["userid"]))
{
	$userid = $_SESSION["userid"];
	$connect = mysql_connect("$db_host","$db_username","$db_password","$db_name") or die("Couldn't connect!");
	mysql_select_db("$db_name") or die("DataBase not found!");
	
	$query = mysql_query("SELECT * FROM users WHERE username = '$username'");
	$numrows = mysql_num_rows($query);

	if ($numrows != 0)
	{
		while($rows = mysql_fetch_assoc($query))
		{
			$dbusername = $rows['username'];
			$dbpassword = $rows['Password'];
			$dbuserid = $rows['User_ID'];
			$dbdisplayname = $rows['FirstName']." ".$rows['LastName'];
		}
		
		if ($username==$dbusername && $Password==$dbpassword)
		{
			// What to do if username and Password matches
			$_SESSION['username'] = $dbusername;
			$_SESSION['dname'] = $dbdisplayname;
			$_SESSION['userid'] = $dbuserid;
			$_SESSION["valid"]=1;
			header("location: home.php");
		}
		else
			ECHO "Incorrect Password!";
	}
	else
		die ("Username invalid. Please check.");
}
else
	die("Login to continue!");	
?>