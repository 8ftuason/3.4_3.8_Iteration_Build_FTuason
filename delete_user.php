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
			<title>TuneIn - Delete User</title>
		
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
										<h1>DELETE USER DETAILS</h1>
                                        <h3><form method = "post" id = "delete_user.php" >
											<label style="color: black;" for = 'login'>Username*</label><br>
											<input type="text" name = "UserName" placeholder="Enter Username"/><br>
											<input type="submit" value="Delete" />
										</form></h3>
										<?php
											//lets the admin know the status of the action; whether or not the user was successfully deleted or they have to try again.
											if (mysqli_query($conn,$deletequery)){
												echo "<h3>User Deleted<h3>";
											} else {
												$error = "<h3>Error deleting user. Please Try Again.<h3>";
											}
										?>
									</center>
                                </div>
                                
                                <!-- This class is for my footer-->	
								<div class="footer">
									<h1>Footer</h1>
									<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
								</div>
                              
        </body>
</html>
