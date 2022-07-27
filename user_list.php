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
			<link rel="stylesheet" href="css/grids.css">
			
			<!-- import the webpage's javascript -->
			<!-- nav javascript -->
			<script src="js/nav.js" defer></script>
			<!-- back to top button javascript -->
			<script src="js/backtotop.js" defer></script>
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
			
			
                                <div class="admin_content"><!-- Holds the main page content -->
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
										echo "<user2>" . $output['User_PK'] . "</user2><br>";
									//closes the while loop
										}
								?>
								<h2>PASSWORDS</h2>
								<?php
									//runs the query to display all the users passwords
									$result = mysqli_query($conn,$query);

									while ($output = mysqli_fetch_array($result))
									{
										echo "<user2>" . $output['Password'] . "</user2><br>";
									//closes the while loop
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
