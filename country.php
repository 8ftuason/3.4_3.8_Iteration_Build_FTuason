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
	 
		<title>TuneIn | Country</title>
		
		<!-- import code needed for site to be responsive -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- import keywords for search engines -->
		<meta name="Keywords" content="html5, layout, Responsive Design"/>
		<meta name="Author" content="Faith Tuason"/>
		<meta name="Description" content="TuneIn Country Genre"/>
		
		<!-- favicon -->
		<link rel="icon" type="image/x-icon" href="images/favicon.ico">
		
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
			<!-- navigation menu -->
			<?php
			  require("nav.php");
			?>
			
			<!-- banner class to establish what the site is about and what further content may entail (will be an image in later stages)-->
			<center><div class="banner" style="background-image: url('images/country-banner.jpg'); background-size: 100vw 100vh; background-attachment: fixed;">
				<h1 style="padding-top: 18vw; font-size: 4.8vw; color: white;">COUNTRY</h1>
				<h2 style="margin-top: -1.5vw; font-size: 1.75vw;">All Country And Acoustic Songs</h2>
				<img style="width: 100%; max-width: 15px;" src="images/clock.png" alt="Clock Icon">
				<h3 style="margin-top: 0; padding-left: 5px; display: inline-block">01:32:24</h3>
			</div></center>

			<!-- This class is for my main content-->	
			<div class="content"> 
						
						<!-- Playlist headings-->	
                        <heading1>
                                <Song_ID1 style="padding-right: 120px;"><h3 style="color: white;">#</h3></Song_ID1>
                                <Title1><h3>TITLE</h3></Title1>
							    <Artist1><h3>ARTIST</h3></Artist1>
                                <Album1><h3>ALBUM</h3></Album1>
								<Genre1><h3>GENRE</h3></Genre1>
								<Duration1><h3>SECS</h3></Duration1>
                                <Size1><h3>SIZE</h3></Size1>
                        </heading1>            
				
                        	<?php
								require "3.3_Assessment_FTuason_mysqli.php";
					
								//creates a variable to store the sql query that displayed all song info sorted by title then artist (both highest first)
								$query = ("SELECT s.Song_ID, s.Title, s.Duration, s.Size,
								GROUP_CONCAT(DISTINCT a.Album SEPARATOR ', ') AS Album,
								GROUP_CONCAT(DISTINCT r.Artist SEPARATOR ', ') AS Artist,
								GROUP_CONCAT(DISTINCT g.Genre SEPARATOR ', ') AS Genre
								FROM Song_Details AS s 
								INNER JOIN Album a ON s.Album_PK = a.Album_PK
								JOIN SongToArtist j ON s.Song_ID = j.Song_ID
								JOIN Artist r ON r.Artist_PK = j.Artist_PK
								JOIN SongToGenre t ON s.Song_ID = t.Song_ID
								JOIN Genre g ON g.Genre_PK = t.Genre_PK
								WHERE g.Genre = 'Country' 
								OR g.Genre = 'Folk Country' 
								OR g.Genre = 'Acoustic'
								OR g.Genre = 'Bluegrass' 
								OR g.Genre = 'Easy Listening'
								OR g.Genre = 'Mellow'
								OR g.Genre = 'Vocal'
								GROUP BY s.Song_ID
								ORDER BY Song_ID ASC");

								//runs and stores the query using the variables $con (see nav.php) and $query
								$result = mysqli_query($conn,$query);
								//runs in a 'while' loop
								while($output=mysqli_fetch_array($result))
								{	
								?>
				
								<!--php is above. HTML is below. Used to output the query results-->
								<heading2>
									<Song_ID2 style="padding-left: 0.4vw;"><p><?php echo $output['Song_ID']; ?></p></Song_ID2>
									<Title2><p><?php echo $output['Title']; ?></p></Title2>
									<Artist2><p><?php echo $output['Artist']; ?></p></Artist2>
									<Album2><p><?php echo $output['Album']; ?></p></Album2>
									<Genre2><p><?php echo $output['Genre']; ?></p></Genre2>
									<Duration2><p><?php echo $output['Duration']; ?></p></Duration2>
									<Size2><p><?php echo $output['Size']; ?></p></Size2>
								</heading2>
								<?php
								//closes the output while loop
								}
								?>
				 
			</div>
		
		<center>
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
					<a href ="https://www.facebook.com/profile.php?id=100085114878181"><img class="social-icons" src="images/fb.png" alt="Social Media Icon"></a>
					<a href ="https://www.instagram.com/tuneinweb/"><img class="social-icons" style="padding-left: 0.6vw;" src="images/instagram.png" alt="Social Media Icon"></a>
					<a href ="https://twitter.com/TuneInMusicWeb"><img class="social-icons" style="padding-left: 1.4vw;" src="images/twitter.png" alt="Social Media Icon"></a>
				</div>
				<!--Back to top button-->
				<div id="myBtn" onclick="topFunction()"><img src="images/top.png" style="width: 100%; max-width: 3.65vw;"></div>
			</div>
		</center>
	</body>
</html>
