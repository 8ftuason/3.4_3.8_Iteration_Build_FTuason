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
			<!-- banner class to establish what the site is about and what further content may entail (will be an image in later stages)-->
			<div class="banner">
				<h1>BANNER</h1>
			</div>

			<!-- This class is for my main content-->	
			<div class="content">
				<h1>MAIN CONTENT</h1>
				<div class="scroll-trial">
				</div>		
			</div>

			<!-- This class is for my footer-->	
			<div class="footer">
				<h1>Footer</h1>
			</div>	
		</center>
		
	</body>
	
</html>
