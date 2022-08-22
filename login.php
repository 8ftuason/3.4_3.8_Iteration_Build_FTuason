<?php
	ob_start();
	session_start();
		$error = NULL;
		if($_SERVER["REQUEST_METHOD"] == "POST") {
			//connect.php (tells where to connect servername, username, password, dbaseName)
			require "3.3_Assessment_FTuason_mysqli.php";
			//username and password sent from form
			$myusername = mysqli_real_escape_string($conn, $_POST['username']);
			$mypassword = mysqli_real_escape_string($conn, $_POST['password']);
			
			$query = "SELECT User_PK FROM Users WHERE User_PK = '$myusername' and Password = '$mypassword'";
			
			$result = mysqli_query($conn,$query);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			$count = mysqli_num_rows($result);
			
			//If result matched $myusername and $mypassword, table row must be 1 row
			if($count == 1) {
				$_SESSION['login_user'] = $myusername;
				header("location: index.php");
			} 
			if($myusername == "Graeme") {
				header("location: user_list.php");
			} else {
				//error message if the user enters an invalid username or password.
				$error = "ERROR! Invalid Userame or Password.<br> Please Try Again.";
			} 
		} 
	ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
	 
	<head>
	 
		<title>TuneIn - Login</title>
		
		<!-- import code needed for site to be responsive -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- import keywords for search engines -->
		<meta name="Keywords" content="html5, layout, Responsive Design"/>
		<meta name="Author" content="Faith Tuason"/>
		<meta name="Description" content="TuneIn Homepage"/>
		
		<!-- import the webpage's stylesheet goes here -->
		<link rel="stylesheet" href="css/style.css">
		
		<!-- import the webpage's javascript -->
		<!-- nav javascript -->
		<script src="js/nav.js" defer></script>
		<!-- show password javascript -->
		<script src="js/showpword.js" defer></script>
		
	</head>
	
	<body>	
		
		<!-- navigation menu-->
		<?php
		  require("nav.php");
		?>

		<!-- This class is for my main content-->	
		<div class="admin-content">
			<center>
				<img style="width: 100%; max-width: 200px;" src="images/placeholder.png" alt="Profile graphic">
				<h1>LOGIN</h1>
				<form method = "post" id="login">
				<!-- input box for the user to enter their username -->
				<input type = "text" name = "username"  autocomplete="off" placeholder="Username"/><br /><br />
				<!-- input box for the user to enter their password -->
				<input type = "password" name = "password" id="myInput" placeholder="Password"/><br />
				<!-- An element to toggle between password visibility -->
				<input type="checkbox" onclick="myFunction()"><p style="font-size: 0.8vw; display: inline-block; color: #527ECC;">Show Password</p><br /><br />
				<!-- Button for the user to press once they are ready to login -->
				<input type = "submit" value = "Login"/><br />
				</form>
				<!-- if the user has an invalid login this will relay the error message stored above in the '$error' php variable -->
				<p style="color: #F73F3F; font-weight: 700;"><?php echo $error; ?></p>
				
				<!--Takes user to register if they don't have an account -->
				<p><a class="hover-underline-animation2" style="color: #1155CC; text-decoration: none;" href='register.php'>Don't have an account?</a></p>
			</center>
		</div>
		
	</body>

</html>	
