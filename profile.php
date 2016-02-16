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
<?php
	require "config.php";
	require "navbar.php";
?>
	<br><br><br>
	<div class="container">
		
		<?php
		$connect = mysql_connect("$db_host","$db_username","$db_password","$db_name") or die("Couldn't connect!");
	mysql_select_db("$db_name") or die("DataBase not found!");
	
	if (isset($_SESSION) and isset($_SESSION["userid"]))
		$userid = $_SESSION["userid"];
	else
		{header("location: login.php");}
		$query = mysql_query("SELECT * FROM questionnaire WHERE User_ID='$userid'");
		$numrows = mysql_num_rows($query);
		if ($numrows > 0)
		{
		while($row = mysql_fetch_assoc($query))
			{					
				ECHO '<div class="col-md-4"><div class="thumbnail">';
				ECHO "You have filled the questionnaire with the following details:<br><br>";
				//var_dump($row);
				
				ECHO '<div class="itembox">';
				extract($row);
				ECHO "<div class='itembox'>
							<div class='address'>
							Area: $Area<br>
							City: $City<br>
							Language: $Language<br>
							Food preferences: ";
							if ($Vegetarian==0)	ECHO "Non-";
								ECHO "Vegetarian<br>
							Preferred number of roommates: $NoOfRoomies<br>
							Gender: $Gender<br>
							Already have a flat? ";
							if ($HaveAFlat==1)	ECHO "Yes";else ECHO "No";
				ECHO "</div></div>";
				
				ECHO '<br><a href="upquestionnaire.php">Click here to update your questionnaire!</a><br>';	
				ECHO '<a href="delquestionnaire.php">Click here if you no longer seek a roommate!</a>';		
				ECHO '</div></div>';			
			}
		}
		else{
			header("location: questionnaire.php");
		}

	?>
		
		</div>
	</div>

	 <div class="container">
		<div class="row">
	
	

	
	
	
	
	
		</div>
	</div>
	
	<script>
		function apply_filter(myForm) {
		var allInputs = myForm.getElementsByTagName('input');
		var input, i;

		for(i = 0; input = allInputs[i]; i++) {
			if(input.getAttribute('name') && !input.value) {
				input.setAttribute('name', '');
			}
		}
	};
	</script>
</body>
</html>