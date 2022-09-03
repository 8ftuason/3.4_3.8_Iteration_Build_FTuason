<!--ensures user is logged in first before accessing page-->
<?php
		session_start();
		if (!isset($_SESSION['login_user'])){
				header("location:login.php");
				}
		else{
			$User = $_SESSION['login_user'];
		}
?>

<!DOCTYPE html>
<html lang="en">
        <head>
			<title>TuneIn | Update User</title>
		
			<!-- import code needed for site to be responsive -->
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<!-- import keywords for search engines -->
			<meta name="Keywords" content="html5, layout, Responsive Design"/>
			<meta name="Author" content="Faith Tuason"/>
			<meta name="Description" content="TuneIn Admin - Update User Details Page"/>
			
			<!-- favicon -->
			<link rel="icon" type="image/x-icon" href="images/favicon.ico">
			
			<!-- import the webpage's stylesheet goes here -->
			<link rel="stylesheet" href="css/style.css">

			<!-- import the webpage's javascript -->
			<!-- nav javascript -->
			<script src="js/nav.js" defer></script>
			<!-- back to top button javascript -->
			<script src="js/backtotop.js" defer></script>
		</head>
	
        <body style="background-image: url(images/admin-background.jpg);">
            <!-- navigation menu-->
			<?php
			  require("nav.php");
			?>
				
			
                                <div class="admin-content"><!-- Holds the main page content -->
									<?php
										//connect.php (tells where to connect servername, username, password, dbaseName)
										require "3.3_Assessment_FTuason_mysqli.php";

										$ExistingUserID = isset($_POST["ExistingUserName"]) ? $_POST["ExistingUserName"] : '';
										$NewUserID = isset($_POST["NewUserName"]) ? $_POST["NewUserName"] : '';

										//creates a variable to store sql code for the 'update users' query which will update the user's details (username and password) in my Users table in phpMyAdmin
										$updatequery = "UPDATE Users SET User_PK = '$NewUserID' WHERE User_PK = '$ExistingUserID'";
									?>
									<center>
										<img style="width: 100%; max-width: 200px;" src="images/update-icon.png" alt="Profile graphic">
										<h1>UPDATE USER DETAILS</h1>
										<form method="post" id="update_user.php">
											<!-- input box for the user to enter their exsisting username -->
											<input type="text" name = "ExistingUserName" placeholder = "Existing Username"/><br><br>
											<!-- input box for the user to enter their new username -->
											<input type="text" name = "NewUserName" placeholder = "New Username"/><br><br><br>
											<!-- Button for the user to press once they are ready to update their details -->
											<input type="submit" value="Update" />
										</form>

										<?php
											if (mysqli_query($conn,$updatequery)) {
												echo "<p style='color: #3d9c46; font-weight: 700;'>User Details Successfully Updated</p>";
											} else {
												$error = "<p style='color: #F73F3F; font-weight: 700;'>ERROR! Unable to update user details. <br> Please Try Again.</p>";
											}
										?>
									</center>		
								</div>
                       
                    
        </body>
</html>
