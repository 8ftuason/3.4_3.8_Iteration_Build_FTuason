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
		
		<!-- logo at top of page-->
		<center><a href="index.php"><img style="width: 100%; max-width: 100px;" src="images/placeholder.png" alt="TuneIn logo"></a></center>	
		
		<!-- navigation menu (burger menu)-->
		<?php
		  require("nav.php");
		?>
		
		<div class="banner">
			<h1>SLIDESHOW</h1>
		</div>
		
		<!-- This class is for my main content-->	
		<div class="content">
			<h1>MAIN CONTENT</h1>
		</div>
		
				
		<!-- This class is for my footer-->	
		<div class="footer">
			<h1>Footer</h1>
		</div>	
		
	</body>
	
</html>
