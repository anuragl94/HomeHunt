<html>
<head>
	 <title>HomeHunt - Upload property</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/cosmo.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrapaddon.css">
	<link rel="shortcut icon" href="images/icon2.png">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script>
    function checkForm(form) 
{ 
if (form.NoOfRooms.value != "" && (form.NoOfRooms.value >4|| form.NoOfRooms.value <1))
{
	return false; 
}
re = /[0-9]/; 
    if(!re.match(form.Zipcode.value)) 
    { 
    alert("ONLY NUMBERS ALLOWED");
     form.Zipcode.focus(); 
     return false;
	}
}</script>
</head>

<body>
<br><br><br>
<?php
include('navbar.php');
?>

<div class="container">
		<div class="jumbotron">
		  <h1>HomeHunt</h1>		
		  <p>Please upload details of the property you want to advertise</p>
		  
	<br>
	<div class="container">
	<form ... onsubmit="return checkForm(this);" name = "frm" action="upproperty_backend.php" method="post">
	
		<div class="row">
			<div class="col-md-3">
			<p>Area: 
			</div>
			<div class="col-md-6">
			<input type="text" name="Area" required>
			</p>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-3">
		<p>City: 
			</div>
			<div class="col-md-6">
		<input type="text" name="City" required>
		</p> 
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
		<p>Number of Rooms: 
			</div>
			<div class="col-md-6">
		<input type="number" name="NoOfRooms" min="1" max="4" required>
		</p> 
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
		<p>Quoted Price: 
			</div>
			<div class="col-md-6">
		<input type="number" name="QuotedPrice" min="0" step="100" required>
		</p> 
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
		<p>Property Name: 
			</div>
			<div class="col-md-6">
		<input type="text" name="PropertyName" required>
		</p> 
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
		<p>Zipcode: 
			</div>
			<div class="col-md-6">
		<input type="number" name="Zipcode" required>
		</p> 
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
		<p>House Number: 
			</div>
			<div class="col-md-6">
		<input type="text" name="HouseNo" required>
		</p> 
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
		<p>Street Number: 
			</div>
			<div class="col-md-6">
		<input type="text" name="StreetNo" required>
		</p> 
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-3">
		<p>Property Is Up For: 
			</div>
			<div class="col-md-6">
		<input type="radio" name="PropertyUpFor" value="Sale" checked>Sale
        <input type="radio" name="PropertyUpFor" value="Rent">Rent
		</p>
		</div>
		</div>
		
		<div class="row">
			<div class="col-md-3">
		<p>Select Image: 
			</div>
			<div class="col-md-6">
		<input type="file" name="image" class="ed">
		</p> 
			</div>
		</div>
	<input type="submit" value="Submit">
	</form>
	</div>
		</div>
	 </div>

</body>
</html>