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
			<title>TuneIn - Update User</title>
		
			<!-- import code needed for site to be responsive -->
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<!-- import keywords for search engines -->
			<meta name="Keywords" content="html5, layout, Responsive Design"/>
			<meta name="Author" content="Faith Tuason"/>
			<meta name="Description" content="TuneIn Admin - Update User Details Page"/>

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

										$ExistingUserID = isset($_POST["ExistingUserName"]) ? $_POST["ExistingUserName"] : '';
										$NewUserID = isset($_POST["NewUserName"]) ? $_POST["NewUserName"] : '';

										//creates a variable to store sql code for the 'update users' query which will update the user's details (username and password) in my Users table in phpMyAdmin
										$updatequery = "UPDATE Users SET User_PK = '$NewUserID' WHERE User_PK = '$ExistingUserID'";
									?>
									<center>
										<h1>UPDATE USER DETAILS</h1>
										<h3><form method="post" id="update_user.php"  >
											<label for = 'login'>Existing Username*</label><br>
											<input type="text" name = "ExistingUserName" placeholder = "Enter Existing Username"/><br>
											<label for = 'login'>New Username*</label><br>
											<input type="text" name = "NewUserName" placeholder = "Enter New Username"/><br>
											<input type="submit" value="Update" />
										</form></h3>

										<?php
											if (mysqli_query($conn,$updatequery)){
												echo "<h3>User Details Successfully Updated</h3>";
											} else {
												$error = "Error Updating User Details. Please Try Again.";
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
