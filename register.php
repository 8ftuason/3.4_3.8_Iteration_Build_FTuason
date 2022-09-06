<!DOCTYPE html>
<html lang="en">
	 
	<head>
	 
		<title>TuneIn | Register</title>
		
		<!-- import code needed for site to be responsive -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- import keywords for search engines -->
		<meta name="Keywords" content="html5, layout, Responsive Design"/>
		<meta name="Author" content="Faith Tuason"/>
		<meta name="Description" content="TuneIn Sign Up Page"/>
		
		<!-- favicon -->
		<link rel="icon" type="image/x-icon" href="images/favicon.ico">
		
		<!-- import the webpage's stylesheet goes here -->
		<link rel="stylesheet" href="css/style.css">
		
		<!-- import the webpage's javascript -->
		<!-- nav javascript -->
		<script src="js/nav.js" defer></script>
		<!-- show password javascript -->
		<script src="js/showpword.js" defer></script>
		
	</head>
	
	<body style="background-image: url(images/register-background2.jpg);">	
		<!-- navigation menu -->
			<?php
			  require("nav.php");
			?>
		
		<!-- This class is for my main content-->	
		<div class="admin-content">
			<?php
					//connect.php (tells where to connect servername, username, password, dbaseName)
					require "3.3_Assessment_FTuason_mysqli.php";

					$UserID = isset($_POST['username']) ? $_POST['username']: '';
					$PW = isset($_POST['password']) ? $_POST['password']: '';

					//creates a variable to store sql code for the 'add users' query which will add the user's details (username and password) to my Users table in phpMyAdmin
					$insertquery = "INSERT INTO Users( User_PK, Password ) VALUES( '$UserID', '$PW' )";
				?>
			<center>
				<img style="width: 100%; max-width: 200px;" src="images/add-icon.png" alt="Profile graphic">
				<h1>REGISTER</h1>
				<form method = "post" id="add_user">
				<!-- input box for the user to enter their username -->
				<input type = "text" name = "username"  autocomplete="off" placeholder="Username"/><br /><br />
				<!-- input box for the user to enter their password -->
				<input type = "password" name = "password" id="myInput" placeholder="Password"/><br />
				<!-- An element to toggle between password visibility -->
				<input type="checkbox" onclick="myFunction()"><p style="font-size: 0.8vw; display: inline-block; color: #527ECC;">Show Password</p><br /><br />
				<!-- Button for the user to press once they are ready to register -->
				<input type = "submit" value = "Create Account"/><br />
				</form>
				
				<?php
					//lets the admin know the status of the action; whether or not the user was successfully added or they have to try again.
					if (mysqli_query($conn,$insertquery)) {
						echo "<p style='color: #3d9c46; font-weight: 700;'>New User Successfully Registered</p>";
					} else {
						$error = "<p style='color: #F73F3F; font-weight: 700;'>ERROR! Unable to register user. <br> Please Try Again.</p>";
					}
				?>
				<p><a class="hover-underline-animation2" style="color: #1155CC; text-decoration: none;" href='login.php'>Back to Login</a></p>
			</center>			
			
		</div>
		
	</body>

</html>	
