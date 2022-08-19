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
            <!-- navigation menu-->
			<?php
			  require("nav.php");
			?>
			
                                <div class="admin-content" style="background-color: #292a33; padding: 0; height: 350px; overflow-y: auto; 
	overflow-x: hidden;"><!-- holds the main page content -->
								<heading3><!-- This class is to split the content in half and places the usernames to the left-->
									<User1><h3 style="color: white;">USERNAME</h3></User1>
									<Password1><h3 style="color: white;">PASSWORD</h3></Password1>
								</heading3>
									
										<?php
										//connect.php (tells where to connect servername, username, password, dbaseName)
										require "3.3_Assessment_FTuason_mysqli.php";

										//creates a variable to store sql code for the 'display all users' query
										$query = ("SELECT * FROM Users");

										//runs the query to display all the users usernames
										$result = mysqli_query($conn,$query);

										while ($output = mysqli_fetch_array($result))
										{
										?>
										<heading4><!-- This class is to split the content in half and places the passwords to the right-->
											<User2 style="padding-left: 0.36vw;"><p><?php echo $output['User_PK']; ?></p></User2>
											<Password2><p><?php echo $output['Password']; ?></p></Password2>
										</heading4>
										<?php
										//closes the output while loop
										}
										?>
                        		</div>
			
			
        </body>
</html>
