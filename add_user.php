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
			<title>TuneIn - Add New User</title>
		
			<!-- import code needed for site to be responsive -->
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<!-- import keywords for search engines -->
			<meta name="Keywords" content="html5, layout, Responsive Design"/>
			<meta name="Author" content="Faith Tuason"/>
			<meta name="Description" content="TuneIn Admin - Add New User Page"/>
			
			<!-- import the webpage's stylesheet goes here -->
			<link rel="stylesheet" href="css/style.css">

			<!-- import the webpage's javascript -->
			<!-- nav javascript -->
			<script src="js/nav.js" defer></script>
		</head>
	
        <body>
            <!-- navigation menu-->
			<?php
			  require("nav.php");
			?>
			<center>
								<div class="admin-menu"><!-- holds the admin menu with links to the different pages only the admin can access -->
									<ul>
										<li><a href="user_list.php">User List</a></li> 
										<li><a href="add_user.php">Add New User</a></li>
										<li><a href="update_user.php">Update User</a></li>
										<li><a href="delete_user.php">Delete User</a></li>
									</ul>
								</div>
			</center>
			
                                <div class="content"><!-- Holds the main page content -->
										<h3><form method="post" id="add_user.php">
											<label style="color: black;" for = 'login'>Username:</label>
											<input type = "text" name= "username" placeholder = "Enter Username"/><br>
											<label style="color: black;" for = 'login'>Password:</label>
											<input type = "password" name= "password" placeholder = "Enter Password"/><br>
											<input type = "submit" value = "Insert"/><br>
										</form></h3>
											
										<?php
										//connect.php (tells where to connect servername, username, password, dbaseName)
										require "3.3_Assessment_FTuason_mysqli.php";
															
										$UserID = isset($_POST['username']) ? $_POST['username']: '';
										$PW = isset($_POST['password']) ? $_POST['password']: '';

										//creates a variable to store sql code for the 'add users' query which will add the user's details (username and password) to my Users table in phpMyAdmin
										$insertquery = "INSERT INTO Users( User_PK, Password ) VALUES( '$UserID', '$PW' )";
										
										//lets the admin know the status of the action; whether or not the user was successfully added or they have to try again.
										if (mysqli_query($conn,$insertquery)) {
											echo "<h3>User Successfully Added</h3>";
										} else {
											echo "<h3>Error adding user. Please Try Again.</h3>";
											}
										?>
									</div>
                                
                <!-- This class is for my footer-->	
				<div class="footer">
					<h1>Footer</h1>
				</div>
                            
        </body>
</html>
