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
			<title>TuneIn - User List</title>
		
			<!-- import code needed for site to be responsive -->
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<!-- import keywords for search engines -->
			<meta name="Keywords" content="html5, layout, Responsive Design"/>
			<meta name="Author" content="Faith Tuason"/>
			<meta name="Description" content="TuneIn Admin - User List Page"/>

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
			
                                <div class="content"><!-- holds the main page content -->
								<div class="section1"><!-- This class is to split the content in half and places the usernames to the left-->
									<h2>USERS</h2>
									<?php
										//connect.php (tells where to connect servername, username, password, dbaseName)
										require "3.3_Assessment_FTuason_mysqli.php";

										//creates a variable to store sql code for the 'display all users' query
										$query = ("SELECT * FROM Users");

										//runs the query to display all the users usernames
										$result = mysqli_query($conn,$query);

										while ($output = mysqli_fetch_array($result))
										{
											echo "<p>" . $output['User_PK'] . "<p><br>";
										//closes the while loop
											}
									?>
								</div>
								<div class="section2"><!-- This class is to split the content in half and places the passwords to the right-->
									<h2>PASSWORDS</h2>
									<?php
										//runs the query to display all the users passwords
										$result = mysqli_query($conn,$query);

										while ($output = mysqli_fetch_array($result))
										{
											echo "<p>" . $output['Password'] . "</p><br>";
										//closes the while loop
											}
									?>
								</div>
                        		</div>
			
                     <!-- This class is for my footer-->	
					<div class="footer">
						<h1>Footer</h1>
					</div>
			
        </body>
</html>
