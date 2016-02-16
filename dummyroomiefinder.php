<html>
  <head>
	 <title>HomeHunt - RoomieFinder</title>
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
		<h1>Roomates!</h1>
		<p>Apply some filters if you need to</p>
		<form onsubmit="return apply_filter(this)" name="filters">
		<p>City: <input type="text" name="area"/><br></p>
		<p>Look for a roommate with a flat? <input type="checkbox" name="chk"/></p>
		
		<p> Preferred Gender of roommate  <br>
		<input type="radio" name="sex" value="Male">Male<br>
		<input type="radio" name="sex" value="Female">Female<br></p>
		<p>Looking for a roommate who is <br>
		<input type="radio" name="veg" value="veg">Vegetarian<br>
		<input type="radio" name="veg" value="nveg">Non Vegetarian<br></p> 
		<p><button type="submit">Apply</button></p>
		</form>
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

if (isset($_SESSION) and isset($_SESSION["userid"]))
		$userid = $_SESSION["userid"];
	else
		{header("location: login.php");}
	$areafilter = $chkfilter = $gfilter = $vfilter = "";
	if (isset($_GET['area']))
		{
		$area = $_GET['area'];
		$areafilter = " AND Area = '$area'";
		}
	if (isset($_GET['chk']))
		{
		$chk = $_GET['chk'];	
		if($chk=="on"){$chk=1;}
		else {$chk=0;}
		$chkfilter = " AND HaveAFlat = $chk";
		}
	if (isset($_GET['sex']))
		{
		$sex = $_GET['sex'];
		echo $sex;
		$gfilter = " AND Gender = '$sex'";
		}
	if (isset($_GET['veg']))
		{
		$v = $_GET['veg'];	
		if($v=="veg"){$v=1;}
		else {$v=0;}
		$vfilter = " AND Vegetarian = $v";
		}
	$query = mysql_query("SELECT * FROM questionnaire where User_ID = $userid");
	$numrows = mysql_num_rows($query);
	if ($numrows > 0)
		{
		$row = mysql_fetch_assoc($query);
		$qid = $row['Questionnaire_ID'];
		$row = mysql_query("SELECT * FROM questionnaire WHERE Questionnaire_ID = $qid");
		$row = mysql_fetch_assoc($row);
		$area = $row['Area'];
		//var_dump($row);
		$roomies_query = mysql_query("SELECT * FROM questionnaire WHERE Questionnaire_ID!=$qid".$areafilter.$chkfilter.$gfilter.$vfilter);
		//ECHO "SELECT * FROM questionnaire WHERE Questionnaire_ID!=$qid".$areafilter.$chkfilter.$gfilter.$vfilter;
		while($rows = mysql_fetch_assoc($roomies_query))
			{
				$roomie_qid = $rows['Questionnaire_ID'];
				$roomie_uid = mysql_query("SELECT * FROM questionnaire WHERE Questionnaire_ID = $roomie_qid");
				$roomie_uid = mysql_fetch_assoc($roomie_uid);
				$roomie_uid = $roomie_uid['User_ID'];
				$roomie_data = mysql_query("SELECT * FROM users WHERE User_ID=$roomie_uid");
				$roomie_data = mysql_fetch_assoc($roomie_data);
				
				ECHO '<div class="col-md-4"><a href="" class="thumbnail">';
				ECHO '<div class="itembox">';
				extract($roomie_data);
				ECHO "<div class='titlearea'><h2>$FirstName $LastName</h2></div>";
				ECHO "<div class='tags'>
							<div class='rooms'>
								$Gender<br>
								<em>Born on </em>$DOB
							</div></div>";
				ECHO "<div class='itembox'>
							<div class='address'>
							<span class='glyphicon glyphicon-envelope'></span> $Mail
							<br><span class='glyphicon glyphicon-earphone'></span> $Contact
							<br><span class='glyphicon glyphicon-home'></span> $City
							</div></div>";
				//var_dump($roomie_data);
				ECHO '</div></a></div>';
			}
		}
		else {
		
			{header("location: questionnaire.php");}
		}
		

	?>
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