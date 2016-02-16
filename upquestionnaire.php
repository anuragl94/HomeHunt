<!DOCTYPE html>
<html>
  <head>
	 <title>Welcome to HomeHunt</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/cosmo.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrapaddon.css">
	<link rel="shortcut icon" href="images/icon2.png">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
	function apply()
		{
		document.frm.sub.disabled=true;
		if(document.frm.chk.checked==true)
			{
			document.frm.sub.disabled=false;
			}
		if(document.frm.chk.checked==false)
			{
			document.frm.sub.enabled=false;
			}
	}
	function fnn(){
		alert("Fill this questionnaire to make yourselves discoverable to other roommate seekers!");
	
	}
	function check()
	{
		//need to validate littil
	}
	</script>

	</head>

  <body onload="fnn()">
  <div class="dimmer">
  <?php
  include_once("navbar.php");
  ?>
	<br><br><br>
	 <div class="container">
		<div class="jumbotron">
		<h1>Tell Us About Yourself</h1>
		<br>
		<div class="container">
		<form name = "frm" action="upquestionnaire_backend.php" method="post">
		
		<div class="row"><p>
			Area: <input type = "text" name="Area"><br>
		</div></p>
		
		<div class="row"><p>
			No of Roommates: <input type ="number" min=1 max=5 name="rmcount"><br>
		</div></p>
		
		<div class="row"><p>
		Gender
		<input type="radio" name="Gender" value="Male" checked>Male
		<input type="radio" name="Gender" value="Female">Female<br>
		</div></p>
	
		<div class="row"><p>
		Language spoken: 
		<select name="language">
		<option value="English">English</option>
		<option value="Hindi">Hindi</option>
		<option value="Bengali">Bengali</option>
		<option value="Kannada">Kannada</option>
		<option value="Tamil">Tamil</option>
		<option value="Telugu">Telugu</option>
		<option value="Malayalam">Malayalam</option>
		</select>
		</div></p>
		
		<div class="row"><p>
		You are a
		<input type="radio" name="food" value="veg" checked>Vegetarian
		<input type="radio" name="food" value="nonveg">Non-Vegetarian
		</div>
<div class="row"><p>
				You :
		<input type="radio" name="flat" value="have" checked>Have a flat
		<input type="radio" name="flat" value="nhave">Don't have a flate
		</div></p>

		<div class="row"><p>
		<input type="checkbox" name="chk" onClick="apply()"> I agree to the <a target="_blank" onclick="window.open('policies.html', 'width=200','_blank', 'toolbar=0,location=0,menubar=0, height=300, width= 300')"><u>privacy policy</u></a>
		<br>
		<p><input type="submit" id= "submit"></p>

		</div></p>
		</form>
		</div>
		</div>
	 </div>
	</div>
	</body>
</html>
