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
			<title>TuneIn | Delete User</title>
		
			<!-- import code needed for site to be responsive -->
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<!-- import keywords for search engines -->
			<meta name="Keywords" content="html5, layout, Responsive Design"/>
			<meta name="Author" content="Faith Tuason"/>
			<meta name="Description" content="TuneIn Admin - Delete User Page"/>
			
			<!-- favicon -->
			<link rel="icon" type="image/x-icon" href="images/favicon.ico">
				
			<!-- import the webpage's stylesheet goes here -->
			<link rel="stylesheet" href="css/style.css">

			<!-- import the webpage's javascript -->
			<!-- loader javascript -->
			<script src="js/loader.js" defer></script>
			<!-- nav javascript -->
			<script src="js/nav.js" defer></script>
			<!-- back to top button javascript -->
			<script src="js/backtotop.js" defer></script>
			
		</head>
	
        <body style="background-image: url(images/admin-background.jpg);">
            
			<!-- customised page preloader -->
			<div class="loading-area" id="loadingArea">
				<div class="zoom-in-out-box"><img src="images/logo.png" style="width: 100%;" alt="TuneIn logo"></div>
			</div>
			
			<!-- navigation menu-->
			<?php
			  require("nav.php");
			?>
			
                                <div class="admin-content"><!-- Holds the main page content -->  
									<?php
										//connect.php (tells where to connect servername, username, password, dbaseName)
										require "3.3_Assessment_FTuason_mysqli.php";
											
										$UserID = isset($_POST['UserName']) ? $_POST['UserName']: '';
											
										//creates a variable to store sql code for the 'delete users' query which will delete the user's details from my Users table in phpMyAdmin
										$deletequery = "DELETE FROM Users WHERE User_PK = '$UserID'";
									?>
									<div class="center" style="text-align: center;">
										<img src="images/delete-icon.png" class="admin-icons" alt="Delete Profile graphic">
										<h1>DELETE USER DETAILS</h1>
                                        <form method = "post" id = "delete_user.php" >
											<!-- input box for Graeme to enter the username he wishes to delete-->
											<input type="text" name = "UserName" placeholder="Enter Username"/><br><br>
											<!-- Button for him to press once the is ready to complete his action -->
											<input type="submit" value="Delete" />
										</form>
										<?php
											//lets the admin know the status of the action; whether or not the user was successfully deleted or they have to try again.
											if (mysqli_query($conn,$deletequery)){
												echo "<p style='color: #3d9c46; font-weight: 700;'>User Successfully Deleted</p>";
											} else {
												$error = "<p style='color: #F73F3F; font-weight: 700;'>ERROR! Unable to delete user. <br> Please Try Again.</p>";
											}
										?>
									</div>
                                </div>
                                
                              
        </body>
</html>
