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
	 
		<title>TuneIn - Query 1</title>
		
		<!-- import code needed for site to be responsive -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- import keywords for search engines -->
		<meta name="Keywords" content="html5, layout, Responsive Design"/>
		<meta name="Author" content="Faith Tuason"/>
		<meta name="Description" content="TuneIn Query 1 Page"/>
		
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
			
			<center><div class="banner">
				<h1 style="padding-top: 14vw; font-size: 4.8vw; color: white;">QUERY 1</h1>
				<h2 style="margin-top: -1.5vw; font-size: 1.75vw;">All Songs sorted by Title and Artist(s) Z-A</h2>
				
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
								<center><h3><?php echo $output['Total_Time']; ?></h3></center>
				
								<?php
								//closes the output while loop
								}
								?>
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
								GROUP BY s.Song_ID
								ORDER BY Title DESC, Artist DESC");
					
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
		<!-- This class is for my footer-->	
		<center>
			<!-- This class is for my footer-->	
			<div class="footer">
				<!--Copyright statement-->
				<div class="footer1">
					<h3 style="padding-top: 2.5vw; text-align: left; color: white;">© Faith Tuason, <br>Tawa College 2022, <br>all rights reserved.</h3>
				</div>
				<!--Logo-->
				<div class="footer2">
					<img style="width: 100%; max-width: 7.3vw; padding-top: 2.5vw;" src="images/placeholder.png" alt="logo">
				</div>
				<!--Social Media Icons-->
				<div class="footer3">
					<img style="width: 100%; max-width: 3.65vw; padding-top: 4.4vw; padding-left: 1.5vw;" src="images/placeholder.png" alt="Social Media Icon">
					<img style="width: 100%; max-width: 3.65vw; padding-top: 4.4vw; padding-left: 1.5vw;" src="images/placeholder.png" alt="Social Media Icon">
					<img style="width: 100%; max-width: 3.65vw; padding-top: 4.4vw; padding-left: 1.5vw;" src="images/placeholder.png" alt="Social Media Icon">
				</div>
				<!--Back to top button-->
				<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
			</div>
		</center>
	</body>
</html>
