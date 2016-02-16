<html>
  <head>
	 <title>HomeHunt - Buy property</title>
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
		<h1>Properties available for sale!</h1>
		<p>Apply some filters if you need to</p>
		<form onsubmit="return apply_filter(this)" name="filters">
		<p>Area: <input type="text" name="area"/><br></p>
		<p>Price: <input type="number" step="1000" name="min"/> to <input type="number" step="10000" name="max"/></p>
		<p>No of Bed Rooms: <input type="number" step="1" name="room"/></p>
		<p><button type="submit">Apply</button></p>
		</form>
		</div>
	</div>

	 <div class="container">
		<div class="row">
	<?php
	require "config.php";
	require "navbar.php";
	
	$connect = mysql_connect("$db_host","$db_username","$db_password","$db_name") or die("Couldn't connect!");
	mysql_select_db("$db_name") or die("DataBase not found!");
	
	if (isset($_SESSION) and isset($_SESSION["userid"]))
		$userid = $_SESSION["userid"];
	else
		$userid = "User_ID";
	$areafilter = $pricefilter = $roomfilter = "";
	if (isset($_GET['area']))
		{
		$area = $_GET['area'];
		$areafilter = "AND Area = '$area'";
		}
	if (isset($_GET['min']) AND isset($_GET['max']))
		{
		$minrange = $_GET['min'];	
		$maxrange = $_GET['max'];
		$pricefilter = " AND QuotedPrice BETWEEN $minrange AND $maxrange";
		}
	if (isset($_GET['room']))
		{
		$room = $_GET['room'];	
		
		$roomfilter = " AND NoOfRooms = $room";
		}
	
	$query = mysql_query("SELECT * FROM property WHERE PropertyUpFor='Sale'".$areafilter.$pricefilter.$roomfilter);

	
	$numrows = mysql_num_rows($query);
	if ($numrows > 0)
		{
		while($row = mysql_fetch_assoc($query))
			{
				$uid = $row['User_ID'];
				$query1 = mysql_query("SELECT FirstName,LastName,Mail,Contact FROM users WHERE User_ID='$uid'");
				$row1 = mysql_fetch_assoc($query1);
				extract($row);
				extract($row1);
					
				ECHO '<div class="col-md-4"><a class="thumbnail">';
				ECHO '<div class="itembox">';
				ECHO '<div class="titlearea">'.$PropertyName.'</div>';
				ECHO "<div class='imgarea'>";
				
				if($Image!="")
					ECHO "<img src='images/thumbs/$Image' />";
				
				ECHO	"<div class='infoarea'>
								<br><br>House number $HouseNo, $StreetNo street, $Area, $City - $Zipcode<br>
								<br><em>Contact owner: </em>$FirstName $LastName<br>
								$Mail<br>$Contact
								</div>
							</div>";
				ECHO "<div class='tags'>
								<div class='rooms'>".$NoOfRooms."BHK</div>
								<div class='rate'>".$QuotedPrice." INR</div>
							</div>";
				ECHO '<div class="address"><span class="glyphicon glyphicon-map-marker"></span>'.$Area.', '.$City.'</div></div>';
				//var_dump($row);
				//var_dump($row1);
				ECHO '</a></div>';
			}
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