<!DOCTYPE html>
<html>
  <head>
	 <title>FoodFusion</title>
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
  include_once("navbar.php");
  ?>
	<br><br><br>
	 <div class="container">
		<div class="jumbotron">
		  <h1>Find food combos!</h1>		
		  <p>Experience, share and explore!</p>
		</div>
	 </div>

	 <div class="container">
		<div class="row">
		
		<?php
		function make_seed()
			{
			list($usec, $sec) = explode(' ', microtime());
			return (float) $sec + ((float) $usec * 100000);
			}
		srand(make_seed());
		for ($counter=1; $counter<=6; $counter+=1)
		{
		$stars=10*rand(1,10);
		if ($stars>=70)
			$status="progress-bar-success";
		else if($stars>=40)
			$status="progress-bar-warning";
		else if($stars<40)
			$status="progress-bar-danger";
		ECHO '
			<div class="col-md-3">
				<a href="ice-cream-soda.html" class="thumbnail">
				<div class="itembox">
				<p class="titlearea">Combo #'.$counter.'</p>
					<div class="imgarea">
					<img src="images/'.$counter.'.jpg" alt="Ice cream soda" style="width:150px;height:150px">
					</div>
				<br>
					<div class="progress">
						<div class="progress-bar '.$status.'" style="width:'.$stars.'%"></div>
					</div>
				</div>
				</a>
			</div>
			';
		}
			?>
		</div>
	</div>
</body>

<script>
	function navbarmod() {
		document.getElementByClass('navbar').style.color="white";
	}
	
	navbarmod();
</script>

</html>