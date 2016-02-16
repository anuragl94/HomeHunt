<html>
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/cosmo.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrapaddon.css">
	<link rel="shortcut icon" href="images/icon2.png">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
<script type="text/javascript">
function checkForm(form) 
{ 
if(form.username.value == "") 
{ 
alert("Error: Username cannot be blank!"); 
form.username.focus(); 
return false; 
} 
re = /^\w+$/; 
if(!re.test(form.username.value)) 
{ 
alert("Error: Username must contain only letters, numbers and underscores!"); 
form.username.focus();
 return false; 
 }


 if(form.displayname.value == "") 
 { 
 alert("Error: Displayname cannot be blank!"); 
 form.username.focus(); 
 return false; 
 } 
 re = /^[a-zA-Z]*$/; 
 if(!re.test(form.displayname.value)) 
 { 
 alert("Error: Displayname must contain only alphabets "); 
 form.username.focus();
  return false; 
  }

 
  if(form.pwd1.value == "") 
  { 
  alert("Error: Password is mandatory!"); 
  form.pwd1.focus(); 
  return false; 
  } 
 
  if(form.pwd2.value == "") 
  { 
  alert("Error: Re confirming password is necessary!"); 
  form.pwd2.focus(); 
  return false; 
  } 
  
  if(form.pwd1.value != "" && form.pwd1.value == form.pwd2.value) 
  { 
  if(form.pwd1.value.length < 8) 
  {
   alert("Error: Password must contain at least 8 characters!"); 
   form.pwd1.focus(); return false;
    } 
    if(form.pwd1.value == form.username.value) 
    { 
    alert("Error: Password must be different from Username!"); 
    form.pwd1.focus(); 
    return false; 
    } 
    re = /[0-9]/; 
    if(!re.test(form.pwd1.value)) 
    { 
    alert("Error: password must contain at least one number (0-9)!");
     form.pwd1.focus(); 
     return false;
      }
       re = /[a-z]/; 
       if(!re.test(form.pwd1.value))
        { 
        alert("Error: password must contain at least one lowercase letter (a-z)!");
         form.pwd1.focus(); 
         return false;
          }
           re = /[A-Z]/; 
           if(!re.test(form.pwd1.value)) 
           { 
           alert("Error: password must contain at least one uppercase letter (A-Z)!"); 
           form.pwd1.focus();
            return false; 
            }
             } 
             else if (form.pwd1.value != form.pwd2.value)
             {
              alert("Error: Passwords Dont match"); 
              form.pwd1.focus();
               return false;
                }
                 alert("Welcome to FoodVille!");
                  return true;
                   }





			  	 		function somefunc()
			   	{	
			   		var chu= document.getElementById("chu");
			   		var chuchu =document.getElementById("chuchu");
		
		
			   		if (chu.checked==true)
			   				chuchu.disabled=false;
			   			else
			   				chuchu.disabled=true;
			   		} 


                    </script> 
                    
<title> 
 HomeHunt - Signup 
</title>
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
	<br>
	<form  onsubmit="return checkForm(this);" method="post" action="check.php">
	<p>FirstName:   
	<input type="text" name="firstname"></p>
	<p>LastName: 
	<input type="text" name="lastname"></p>
	<p>Username: 
	<input type="text" name="username"></p>
	<p>Gender:   
	<br>      
	<input type="radio" name="sex" value="male" checked>Male
	<br>
	<input type="radio" name="sex" value="female">Female<br>
	</p>
	<p>DOB:
	<input type="date" name="DOB"></p>
	<p>Contact:
	<input type="text" name="contact"></p>
	<p>City:
	<input type="text" name="city"></p>
	<p>Email:
	<input type="email" name="ename"></p>
	<p>Password: 
	<input type="password" name="pwd1"></p> 
	<p>Confirm Password: 
	<input type="password" name="pwd2"></p>


	<p><input type="checkbox" name="agreement" value="yo" onchange="somefunc()" id="chu"> I agree to the <a target="_blank" onclick="window.open('policies.html', 'width=200','_blank', 'toolbar=0,location=0,menubar=0, height=300, width= 300')"><u>  terms  & conditions</u></a><br> 
	<p><input type="submit" id= "chuchu" disabled ></p> 
	</form>
	</div>
		</div>
	 </div>
</body>
</html>
