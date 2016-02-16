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
<body>
<?php
	require "config.php";
	require "navbar.php";

?>
<br><br><br>
	<div class="container">
	<div class = "jumbotron">	
		<?php
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
$City='Bangalore';
$food=$_POST['food'];
if($food == "veg") 
{
	$food=1;
}
else 
{$food=0;}
$chk = $_POST['flat'];	
if($chk == "have") 
{
	$chk=1;
}
else 
{$chk=0;}
		
$sql="INSERT INTO questionnaire (Area,City,Language,Vegetarian,NoOfRoomies,Gender,HaveAFlat,User_ID)
VALUES ('$_POST[Area]','$City','$_POST[language]',$food,'$_POST[rmcount]','$_POST[Gender]',$chk,'$userid ')";

if (!mysqli_query($con,$sql))
{
  die('Error: ' . mysqli_error($con));
}
echo "record added";
header("Location: actualprofile.php");
mysqli_close($con);


	?>
		
		</div>
	</div>	
</body>
</html>