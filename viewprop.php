<html>
  <head>
	 <title>HomeHunt - View your property</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/cosmo.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrapaddon.css">
	<link rel="shortcut icon" href="images/icon2.png">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</head>
<body>

<br><br><br>
	<div class="container">
		
	</div>

	 <div class="container">
		<div class="row">
	<?php
	//require 'Questionnaire.php';
	require "config.php";
	require "navbar.php";
	
	$connect = mysql_connect("$db_host","$db_username","$db_password","$db_name") or die("Couldn't connect!");
	mysql_select_db("$db_name") or die("DataBase not found!");

if (isset($_SESSION) and isset($_SESSION["userid"]))
		$userid = $_SESSION["userid"];
	else
		{header("location: login.php");}
	
	$query = mysql_query("SELECT * FROM property where User_ID = $userid");
	$numrows = mysql_num_rows($query);
	if ($numrows > 0)
		{
		
		while($rows = mysql_fetch_assoc($query))
			{
				$pid=$rows['PropertyID'];
				
				ECHO '<div class="col-md-4"><div class="thumbnail">';
				//var_dump($rows);
				extract($rows);
				ECHO '<div class="itembox">';
				ECHO '<div class="titlearea">'.$PropertyName.'</div>';
				ECHO "<div class='imgarea'>";
				
				if($Image!="")
					ECHO "<img src='images/thumbs/$Image' />";
				
				ECHO	"<div class='infoarea'>
								</div>
							</div>";
				ECHO "<div class='tags'>
								<div class='rooms'>".$NoOfRooms."BHK</div>
								<div class='rate'>".$QuotedPrice." INR per month</div>
							</div>";
				ECHO '<div class="address"><span class="glyphicon glyphicon-map-marker"></span>'.$Area.', '.$City.'</div></div>';
				ECHO "<br><a href='delprop.php?pid=".$pid."'>Delete this property <span class='glyphicon glyphicon-remove'></span></a></div></div>";		
			}
			
			
		}
		else {
		
				ECHO 'div class="container">
		<div class="jumbotron">';
				ECHO "looks like you haven't uploaded any properties";			
				ECHO '</div></div>';
		}
		

	?>
		</div>
	</div>
	
	
</body>
</html>