<!DOCTYPE html>
<html lang="en">
	 
	<head>
	 
		<title>TuneIn - Register</title>
		
		<!-- import code needed for site to be responsive -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- import keywords for search engines -->
		<meta name="Keywords" content="html5, layout, Responsive Design"/>
		<meta name="Author" content="Faith Tuason"/>
		<meta name="Description" content="TuneIn Sign Up Page"/>
		
		<!-- import the webpage's stylesheet goes here -->
		<link rel="stylesheet" href="css/style.css">
		
		<!-- import the webpage's javascript -->
		<!-- nav javascript -->
		<script src="js/nav.js" defer></script>
		<!-- nav javascript -->
		<script src="js/showpword.js" defer></script>
		
	</head>
	
	<body>	
		
		<!-- This class is for my main content-->	
		<div class="content" style="height: 100%;">
			<?php
					//connect.php (tells where to connect servername, username, password, dbaseName)
					require "3.3_Assessment_FTuason_mysqli.php";

					$UserID = isset($_POST['username']) ? $_POST['username']: '';
					$PW = isset($_POST['password']) ? $_POST['password']: '';

					//creates a variable to store sql code for the 'add users' query which will add the user's details (username and password) to my Users table in phpMyAdmin
					$insertquery = "INSERT INTO Users( User_PK, Password ) VALUES( '$UserID', '$PW' )";
				?>
			<center>
				<img style="width: 100%; max-width: 200px;" src="images/placeholder.png" alt="Profile graphic">
				<h1>REGISTER</h1>
				<h4><form method = "post" id="add_user">
				<label for = 'login'>Username*</label><br />
				<!-- input box for the user to enter their username -->
				<input type = "text" name = "username" placeholder="Enter Username"/><br />
				<label for = 'login'>Password*</label><br />
				<!-- input box for the user to enter their password -->
				<input type = "password" name = "password" id="myInput" placeholder="Enter Password"/><br />
				<!-- Button for the user to press once they are ready to login -->
				<input type = "submit" value = "Create Account"/><br />
				</form></h4>	
				<?php
					//lets the admin know the status of the action; whether or not the user was successfully added or they have to try again.
					if (mysqli_query($conn,$insertquery)) {
						echo "<h3>New User Successfully Registered</h3>";
					} else {
						$error = "ERROR! Unable to register user. Please Try Again";
					}
				?>
				<p><a href='login.php'>Back to Login</a></p>
			</center>			
			
		</div>
		
	</body>

</html>	
