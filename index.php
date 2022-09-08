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
	 
		<title>TuneIn | Home</title>
		
		<!-- import code needed for site to be responsive -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- import keywords for search engines -->
		<meta name="Keywords" content="html5, layout, Responsive Design"/>
		<meta name="Author" content="Faith Tuason"/>
		<meta name="Description" content="TuneIn Homepage"/>
		
		<!-- favicon -->
		<link rel="icon" type="image/x-icon" href="images/favicon.ico">
		
		<!-- import the webpage's stylesheet goes here -->
		<link rel="stylesheet" href="css/style.css">
		
		<!-- import the webpage's javascript -->
		<!-- loader javascript -->
		<script src="js/loader.js" defer></script>
		<!-- nav javascript -->
		<script src="js/nav.js" defer></script>
		<!-- back to top button javascript -->
		<script src="js/backtotop.js" defer></script>
		
	</head>
	
	<body>	
				
		<!-- customised page preloader -->
		<div class="loading-area" id="loadingArea">
			<div class="zoom-in-out-box"><img src="images/logo.png" style="width: 100%;" alt="TuneIn logo"></div>
		</div>
		
				
		<!-- navigation menu-->
		<?php
		  require("nav.php");
		?>
		
		<div class="center">
			<!-- image banner class to establish what the site is about and what further content may entail-->
			<!-- banner uses the parallax scrolling effect (for background image) -->
			<div class="banner" style="background-image: url('images/home-banner.jpg'); background-size: 100vw 100vh; background-attachment: fixed;">
				<div class="text-overlay">
					<h1 style="font-size: 4.8vw; color: white;">Discover new music.</h1>
					<h2 style="text-align: center; margin-top: -2.64vh; font-size: 1.75vw;">Tune in to your favourite songs by your favourite artists today</h2>
				</div>
			</div>

			<!-- This class is for my main content-->	
			<div class="content" style="height: 100%;">
				
				<!-- All users 'saved playlists' (will be linked images in later stages)-->
				<h1 style="color: white;">Your Library</h1>
				<div class="container" style="margin: 1.74vw; height: 14.65vw">
					<a href = "query1.php"><img class="library-image" src="images/query1-cover.jpg" style="border-radius: 5px;" alt="Query 1">
					<div class="text-overlay">
						<h1 style="color: white; text-shadow: none;" class='hover-underline-animation'>QUERY 1</h1>
					</div></a>
				</div>
				
				<div class="container" style="margin: 1.74vw; height: 14.65vw">
					<a href = "query2.php"><img class="library-image" src="images/query2-cover.jpg" style="border-radius: 5px;" alt="Query 2">
					<div class="text-overlay">
						<h1 style="color: white; text-shadow: none;" class='hover-underline-animation'>QUERY 2</h1>
					</div></a>
				</div>
				
				<!-- Recommended Genres (will be linked images in later stages)-->
				<h1 style="color: white;">Genres</h1>
				
				<div class="container" style="margin: 2.2vw; height: 16.32vw;">
					<a href = "rock.php"><img class="genre-image" src="images/rock-cover.jpg" style="border-radius: 5px;" alt="Rock Genre">
					<div class="text-overlay">
						<h1 style="color: white; text-shadow: none;" class='hover-underline-animation'>ROCK</h1>
					</div></a>
				</div>
				
				<div class="container" style="margin: 2.2vw; height: 16.32vw">
					<a href = "country.php"><img class="genre-image" src="images/country-cover.jpg" style="border-radius: 5px;" alt="Country Genre">
					<div class="text-overlay">
						<h1 style="color: white; text-shadow: none;" class='hover-underline-animation'>COUNTRY</h1>
					</div></a>
									
				</div>
				
				<div class="container" style="margin: 2.2vw; height: 16.32vw">
					<a href = "pop.php"><img class="genre-image" src="images/pop-cover.jpg" style="border-radius: 5px;" alt="Pop Genre">
					<div class="text-overlay">
						<h1 style="color: white; text-shadow: none;" class='hover-underline-animation'>POP</h1>
					</div></a>
				</div>
						
			</div>

			<!-- This class is for my footer-->	
			<div class="footer">
				
				<!--Copyright statement-->
				<div class="footer1">
					<h3 style="padding-top: 2.5vw; text-align: left; color: white;">© Faith Tuason, <br>Tawa College 2022, <br>all rights reserved.</h3>
				</div>
				<!--Logo-->
				<div class="footer2">
					<img style="width: 100%; max-width: 7.3vw; padding-top: 2.5vw;" src="images/logo.png" alt="logo">
				</div>
				<!--Social Media Icons-->
				<div class="footer3">
					<a href ="https://www.facebook.com/profile.php?id=100085114878181" target="blank"><img class="social-icons" src="images/fb.png" alt="Facebook Icon"></a>
					<a href ="https://www.instagram.com/tuneinweb/" target="blank"><img class="social-icons" style="padding-left: 0.6vw;" src="images/instagram.png" alt="Instagram Icon"></a>
					<a href ="https://twitter.com/TuneInMusicWeb" target="blank"><img class="social-icons" style="padding-left: 1.4vw;" src="images/twitter.png" alt="Twitter Icon"></a>
				</div>
			
				<!--Back to top button-->
				<div id="myBtn" onclick="topFunction()"><img src="images/top.png" style="width: 100%; max-width: 3.65vw;" alt="back to top button"></div>
			</div>	
		</div>
		
	</body>
	
</html>
