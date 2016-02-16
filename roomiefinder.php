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

	<br><br><br>
	<div class="container">
		<div class = "jumbotron">
		<h1>Potential roommates</h1>
		<p>Here's a list</p>
		</div>
	</div>

	 <div class="container">
		<div class="row">
	<?php
	//require 'Questionnaire.php';
	require "config.php";
	require "navbar.php";
	
	$connect = mysql_connect("$db_host","$db_username","$db_password","$db_name") or die("Couldn't connect!");
	mysql_select_db("$db_name") or die("DataBase not found!");
	
	$userid = $_SESSION["userid"];
	$query = mysql_query("SELECT * FROM roomieseeker where User_ID = $userid");
	$numrows = mysql_num_rows($query);
	if ($numrows > 0)
		{
		$row = mysql_fetch_assoc($query);
		$qid = $row['Questionnaire_ID'];
		$row = mysql_query("SELECT * FROM questionnaire WHERE Questionnaire_ID = $qid");
		$row = mysql_fetch_assoc($row);
		$area = $row['Area'];
		//var_dump($row);
		$roomies_query = mysql_query("SELECT * FROM questionnaire WHERE Area = '$area' AND Questionnaire_ID!=$qid");
		while($rows = mysql_fetch_assoc($roomies_query))
			{
				$roomie_qid = $rows['Questionnaire_ID'];
				$roomie_uid = mysql_query("SELECT * FROM roomieseeker WHERE Questionnaire_ID = $roomie_qid");
				$roomie_uid = mysql_fetch_assoc($roomie_uid);
				$roomie_uid = $roomie_uid['User_ID'];
				$roomie_data = mysql_query("SELECT * FROM users WHERE User_ID=$roomie_uid");
				$roomie_data = mysql_fetch_assoc($roomie_data);
				
				ECHO '<div class="col-md-4"><a href="ice-cream-soda.html" class="thumbnail">';
				var_dump($roomie_data);			
				ECHO '</a></div>';
			}
		}

	?>
		</div>
	</div
</body>
</html>