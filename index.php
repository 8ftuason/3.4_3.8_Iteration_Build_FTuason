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
	 
		<title>TuneIn - Home</title>
		
		<!-- import code needed for site to be responsive -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- import keywords for search engines -->
		<meta name="Keywords" content="html5, layout, Responsive Design"/>
		<meta name="Author" content="Faith Tuason"/>
		<meta name="Description" content="TuneIn Homepage"/>
		
		<!-- import the webpage's stylesheet goes here -->
		<link rel="stylesheet" href="css/style.css">
		
	</head>
	
	<body>
		
		<!-- navigation menu (burger menu)-->
		<?php
		  require("nav.php");
		?>
		<center>
		<div class="banner">
			<h1>BANNER</h1>
		</div>
		</center>
		
		<!-- This class is for my main content-->	
		<div class="content">
			<center>
			    <img style="width: 100%; max-width: 250px; padding: 50px;" src="images/placeholder.png">
			    <img style="width: 100%; max-width: 250px; padding: 50px;" src="images/placeholder.png"><br>
				
				  <img style="width: 100%; max-width: 250px; padding: 50px;" src="images/placeholder.png">
			    <img style="width: 100%; max-width: 250px; padding: 50px;" src="images/placeholder.png">
			</center>		
		</div>
		
				
		<!-- This class is for my footer-->	
		<div class="footer">
			<h1>Footer</h1>
		</div>	
		
	</body>
	
</html>
