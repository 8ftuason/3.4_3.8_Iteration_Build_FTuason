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
	 
		<title>TuneIn | Query 2</title>
		
		<!-- import code needed for site to be responsive -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- import keywords for search engines -->
		<meta name="Keywords" content="html5, layout, Responsive Design"/>
		<meta name="Author" content="Faith Tuason"/>
		<meta name="Description" content="TuneIn Query 2 Page"/>
		
		<!-- favicon -->
		<link rel="icon" type="image/x-icon" href="images/favicon.ico">
		
		<!-- import the webpage's stylesheet goes here -->
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/grids.css">
		
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
		
			<!-- navigation menu -->
			<?php
			  require("nav.php");
			?>
			
			<!-- image banner class to establish what the site is about and what further content may entail-->
			<!-- banner uses the parallax scrolling effect (for background image) -->
			<div class="center">
				<div class="banner" style="background-image: url('images/query2-banner.jpg'); background-size: 100vw 100vh; background-attachment: fixed;">
				<div class="text-overlay">
					<h1 style="font-size: 4.8vw; color: white;">QUERY 2</h1>
					<h2 style="text-align: center; margin-top: -1.5vw; font-size: 1.75vw;">All Songs sorted by Genre and  Artist(s) A - Z</h2>
				
				
							<?php
								//connect.php (tells where to connect servername, username, password, dbaseName)
								require "3.3_Assessment_FTuason_mysqli.php";
					
								//creates a variable to store the sql query that calculates the total time of the playlist
								$query = ("SELECT SEC_TO_TIME(SUM(s.Duration)) AS Total_Time
								FROM Song_Details AS s");
					
								//runs and stores the query using the variables $con (see nav.php) and $query
								$result = mysqli_query($conn,$query);
								//runs in a 'while' loop
								while($output=mysqli_fetch_array($result))
								{	
								?>
								<!--php is above. HTML is below. Used to output the query results-->
								<div class="center" style="text-align: center;">
									<img class="clock-icon" src="images/clock.png" alt="Clock Icon">
									<h3 class="total-time"><?php echo $output['Total_Time']; ?></h3>
								</div>
				
								<?php
								//closes the output while loop
								}
								?>
				</div>
			</div></div>

			<!-- This class is for my main content-->	
			<div class="content" style="text-align: left;"> 
				
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
					
								//creates a variable to store the sql query that displayed all song info sorted by genre then artist (both lowest first)
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
								GROUP BY s.Song_ID
								ORDER BY Genre ASC, Artist ASC");
					
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
			
		<div class="center">
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
					<a href ="https://www.facebook.com/profile.php?id=100085114878181"><img class="social-icons" src="images/fb.png" alt="Facebook Icon"></a>
					<a href ="https://www.instagram.com/tuneinweb/"><img class="social-icons" style="padding-left: 0.6vw;" src="images/instagram.png" alt="Instagram Icon"></a>
					<a href ="https://twitter.com/TuneInMusicWeb"><img class="social-icons" style="padding-left: 1.4vw;" src="images/twitter.png" alt="Twitter Icon"></a>
				</div>
				<!--Back to top button-->
				<div id="myBtn" onclick="topFunction()"><img src="images/top.png" style="width: 100%; max-width: 3.65vw;" alt="back to top button"></div>
			</div>
		</div>
	</body>
</html>
