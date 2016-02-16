<html>
  <head>
	 <title>HomeHunt - Login</title>
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
	require 'navbar.php';
	?>	

	<br><br><br>
	 <div class="container">
		<div class="jumbotron">
		  <h1>HomeHunt</h1>		
		  <p>We find the perfect home for you!</p>
		  
	<br>
	<div class="container">
	<form onsubmit="return checkForm(this);" method="post" action="login_backend.php">
		<div class="row">
			<div class="col-md-2">
			<p>Username: 
			</div>
			<div class="col-md-3">
			<input type="text" name="username"></p>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-2">
		<p>Password: 
			</div>
			<div class="col-md-3">
		<input type="password" name="password"></p> 
			</div>
		</div>
		<p><input type="submit" id= "submit"></p>
	</form>
	</div>
		</div>
	 </div>
</body>
</html>