<?php
session_start();
?>

<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
		  <div class="navbar-header">
			 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>								
			 </button>
			 <a class="navbar-brand" href="">HomeHunt</a>
		  </div>
		  <div class="collapse navbar-collapse" id="myNavbar">
			 <ul class="nav navbar-nav">
				<li><a href="home.php">Home</a></li>
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Browse<span class="caret"></span></a>
				  <ul class="dropdown-menu">
					 <li><a href="buy.php">To buy</a></li>
					 <li><a href="lease.php">To lease</a></li>
				  </ul>
				</li>
				
				<?php
				if  (isset($_SESSION["valid"]) and ($_SESSION['valid']==1))
					{
					ECHO '<li><a href="dummyroomiefinder.php">Roomies</a></li>
								<li><a href="upproperty.php">Upload property</a></li>';
					}
				?>
			 
			 </ul>
			 <ul class="nav navbar-nav navbar-right">
			<?php
				if  (isset($_SESSION["valid"]) and ($_SESSION['valid']==1))
					{
					ECHO '<li><a href="actualprofile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;'.$_SESSION['dname'].'</a></li>';
					ECHO '<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Logout</a></li>';
					}
				else
				ECHO'
				<li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
				<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>'
			?>
			 </ul>
		  </div>
		</div>
	 </nav>