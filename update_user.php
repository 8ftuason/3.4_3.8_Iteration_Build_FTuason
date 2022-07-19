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
			<title>TuneIn - Add New User</title>
		
			<!-- import code needed for site to be responsive -->
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<!-- import keywords for search engines -->
			<meta name="Keywords" content="html5, layout, Responsive Design"/>
			<meta name="Author" content="Faith Tuason"/>
			<meta name="Description" content="TuneIn Admin - Add New User Page"/>

			<!-- import the webpage's stylesheet goes here -->
			<link rel="stylesheet" href="css/style.css">
		</head>
        <body>
             <!-- logo at top of page-->
			<center><a href="index.php"><img style="width: 100%; max-width: 100px;" src="images/placeholder.png" alt="TuneIn logo"></a></center>	
			
			<!-- navigation menu (burger menu)-->
			<?php
			  require("nav.php");
			?>
			
								<div class="aside"><!-- holds the admin menu with links to the different pages only the admin can access -->
									<ul>
										<li><a href="user_list.php">User List</a></li> 
										<li><a href="add_user.php">Add New User</a></li>
										<li><a href="update_user.php">Update User</a></li>
										<li><a href="delete_user.php">Delete User</a></li>
									</ul>
								</div>
			
			
                                <div class="admin_content"><!-- holds the main content on the admin pages (different styling to other pages) -->
											<h3><form method="post" id="update_user.php"  >
												<label style="color: black;" for = 'login'>Existing Username:</label>
												<input type="text" name = "ExistingUserName" placeholder = "Enter Existing Username"/><br>
												<label style="color: black;" for = 'login'>New Username:</label>
												<input type="text" name = "NewUserName" placeholder = "Enter New Username"/><br>
												<input type="submit" value="Update" />
											</form></h3>

											<?php
												//connect.php (tells where to connect servername, username, password, dbaseName)
												require "3.3_Assessment_FTuason_mysqli.php";
						
												$ExistingUserID = isset($_POST["ExistingUserName"]) ? $_POST["ExistingUserName"] : '';
												$NewUserID = isset($_POST["NewUserName"]) ? $_POST["NewUserName"] : '';

												//creates a variable to store sql code for the 'update users' query which will update the user's details (username and password) in my Users table in phpMyAdmin
												$updatequery = "UPDATE Users SET User_PK = '$NewUserID' WHERE User_PK = '$ExistingUserID'";
									
												if (mysqli_query($conn,$updatequery)) {
													echo "<h3>User Updated</h3>";
												} else {
													echo "<h3>Error Updating User Details. Please Try Again.</h3> ";
												}
											?>
											
								</div>
                                
                    <!-- This class is for my footer-->	
					<div class="footer">
						<h1>Footer</h1>
					</div>    
                    
        </body>
</html>
