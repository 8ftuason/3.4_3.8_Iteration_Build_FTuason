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
			} else {
				//error message if the user enters an invalid username or password.
				$error = "ERROR! Invalid Userame or Password. Please Try Again";
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
		
	</head>
	
	<body>
		
		<!-- This class is for my main content-->	
		<div class="content">
			<center>
				<img style="width: 100%; max-width: 200px;" src="images/placeholder.png" alt="TuneIn logo">
				<h1>LOGIN</h1>
				<h3><form method = "post" id="login">
				<label style="color: black;" for = 'login'>Username:</label>
				<!-- input box for the user to enter their username -->
				<input type = "text" name = "username" placeholder="Enter Username"/><br />
				<label style="color: black;" for = 'login'>Password:</label>
				<!-- input box for the user to enter their password -->
				<input type = "password" name = "password" placeholder="Enter Password"/><br />
				<!-- Button for the user to press once they are ready to login -->
				<input type = "submit" value = " Login "/><br />
				</form></h3>
				<h3 class = "red"><?php echo $error; ?></h3>
			</center>
		</div>
		
	</body>

</html>	
