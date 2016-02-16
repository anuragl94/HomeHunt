<!DOCTYPE html>

<html>
  <head>
	 <title>HomeHunt - Profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/cosmo.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrapaddon.css">
	<link rel="shortcut icon" href="images/icon2.png">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</head>

  <body>
  <div class="dimmer">
  <?php
  include_once("navbar.php");
  if (isset($_SESSION) and isset($_SESSION["userid"]))
		$userid = $_SESSION["userid"];
	else
		{header("location: login.php");}
  ?>
	<br><br><br>
	 <div class="container">
		<div class="jumbotron">
		<h1>HomeHunt</h1>
		<p>
		
		</p>
		<p>

<a href="viewprop.php">View your property</a><br>
<a href="profile.php">Update your profile</a>


		</p>
		</div>
	 </div>
	</div>
	</body>
</html>
