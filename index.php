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
		<!-- back to top button javascript -->
		<script src="js/backtotop.js" defer></script>
		
	</head>
	
	<body>	
		
		<!-- navigation menu-->
		<?php
		  require("nav.php");
		?>
		
		<center>
			<!-- banner class to establish what the site is about and what further content may entail (will be an image in later stages)-->
			<div class="banner">
				<h1 style="padding-top: 200px;">DISCOVER NEW MUSIC.</h1>
				<h2>Tune in to your favourite songs by your favourite artists offline and ad-free today.</h2>
			</div>

			<!-- This class is for my main content-->	
			<div class="content" style="height: 100%;">
				<h1>QUERIES</h1>
				<img style="width: 100%; max-width: 400px; max-height: 200px; padding: 25px;" src="images/placeholder.png" alt="Query 1">
				<img style="width: 100%; max-width: 400px; max-height: 200px; padding: 25px;" src="images/placeholder.png" alt="Query 2"><br>
				<h1>GENRES</h1>
				<img style="width: 100%; max-width: 235px; padding: 32px;" src="images/placeholder.png" alt="Genre">
				<img style="width: 100%; max-width: 235px; padding: 32px;" src="images/placeholder.png" alt="Genre">
				<img style="width: 100%; max-width: 235px; padding: 32px;" src="images/placeholder.png" alt="Genre">
						
			</div>

			<!-- This class is for my footer-->	
			<div class="footer">
				<div class="footer1">
					<h2 style="text-align: left; font-size: 1.8vw;">AUTHORS NOTE</h2>
					<h3 style="text-align: left; font-size: 1.3vw;">© Faith Tuason, <br>Tawa College 2022, <br>all rights reserved.</h3>
				</div>
				<div class="footer2">
					<img style="width: 100%; max-width: 7.3vw; padding-top: 35px;" src="images/placeholder.png" alt="logo">
				</div>
				<div class="footer3">
					<img style="width: 100%; max-width: 3.65vw; padding-top: 60px; padding-left: 20px;" src="images/placeholder.png" alt="Social Media Icon">
					<img style="width: 100%; max-width: 3.65vw; padding-top: 60px; padding-left: 20px;" src="images/placeholder.png" alt="Social Media Icon">
					<img style="width: 100%; max-width: 3.65vw; padding-top: 60px; padding-left: 20px;" src="images/placeholder.png" alt="Social Media Icon">
				</div>
				<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
			</div>	
		</center>
		
	</body>
	
</html>
