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

			<!-- import the webpage's stylesheet goes here -->
			<link rel="stylesheet" href="css/style.css">

			<!-- import the webpage's javascript -->
			<!-- nav javascript -->
			<script src="js/nav.js" defer></script>
			<!-- back to top button javascript -->
			<script src="js/backtotop.js" defer></script>
		</head>
	
        <body>
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
									<center>
										<img style="width: 100%; max-width: 200px;" src="images/placeholder.png" alt="Profile graphic">
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
									</center>
                                </div>
                                
                              
        </body>
</html>
