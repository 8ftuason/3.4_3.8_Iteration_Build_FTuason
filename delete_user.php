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
                                      
                                        	<h3><form method = "post" id = "delete_user.php" >
												<label style="color: black;" for = 'login'>Username:</label>
												<input type="text" name = "UserName" placeholder="Enter Username"/><br>
												<input type="submit" value="Delete" />
											</form></h3>
												<?php
													//connect.php (tells where to connect servername, username, password, dbaseName)
													require "3.3_Assessment_FTuason_mysqli.php";
											
													$UserID = isset($_POST['UserName']) ? $_POST['UserName']: '';
											
													//creates a variable to store sql code for the 'delete users' query which will delete the user's details from my Users table in phpMyAdmin
													$deletequery = "DELETE FROM Users WHERE User_PK = '$UserID'";
													
													//lets the admin know the status of the action; whether or not the user was successfully deleted or they have to try again.
													if (mysqli_query($conn,$deletequery)) {
														echo "<h3>User Deleted<h3>";
													} else {
														echo "<h3>Error deleting user. Please Try Again.<h3>";
														}
												?>
                                		</div>
                                
                                <!-- This class is for my footer-->	
								<div class="footer">
									<h1>Footer</h1>
									<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
								</div>
                              
        </body>
</html>
