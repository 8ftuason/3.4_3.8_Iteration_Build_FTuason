<!-- when user is signed in-->
<?php
if(session_id() == ''){session_start();}
if(isset($_SESSION['login_user'])){
?>

<!-- This is for my navigation menu with links to all my pages-->
<nav class="navbar">
	<a href="index.php"><img  src="images/logo.png" style="width: 100%; max-width: 80px; margin: .5rem;" alt="TuneIn logo"></a>
	<!-- This is for when my navigation menu transitions into a burger menu for smaller screens-->
	<a href="#" class="toggle-button">
		<span class="bar"></span>
		<span class="bar"></span>
		<span class="bar"></span>
	</a>
	<div class="navbar-links">
		<ul>
			<li><img style="margin-top: 10px; width: 100%; max-width: 30px;" src="images/profile.png" alt="Profile Icon"></li>
			<li><a style="display: inline-block; font-weight: 700;"><?php echo ($_SESSION['login_user'])?></a></li>
			<li2><a>|</a></li2>
			<li class="hover-underline-animation"><a href="index.php"><img style="width: 100%; max-width: 25px;" src="images/home-icon.png" alt="Home Icon"></a></li>
			<li class="hover-underline-animation"><a href><img style="width: 100%; max-width: 25px;" src="images/playlist-icon.png" alt="Playlist Icon"></a>
				<ul>
					<li class="hover-underline-animation"><a href="query1.php">Query 1</a></li>
					<li class="hover-underline-animation"><a href="query2.php">Query 2</a></li>
				</ul>
				<?php
					//if the admin logs in (Graeme) then it the nav will show an additional link to the admin settings pages
                    if ($_SESSION["login_user"] == "Graeme"){
                    	echo"<li class='hover-underline-animation'><a href><img style='width: 100%; max-width: 25px;' src='images/settings-icon.png' alt='settings icon'></a>
							<ul>
								<li class='hover-underline-animation'><a href='user_list.php'>User List</a></li> 
								<li class='hover-underline-animation'><a href='add_user.php'>Add New User</a></li>
								<li class='hover-underline-animation'><a href='update_user.php'>Update User</a></li>
								<li class='hover-underline-animation'><a href='delete_user.php'>Delete User</a></li>
							</ul>
						</li>";
                    }?>
			<li class="hover-underline-animation"><a href='logout.php'><img style="width: 100%; max-width: 25px;" src="images/logout-icon.png" alt="Logout Icon"></a></li>
		</ul>
	</div>
</nav> 
        
<!--when user is not signed in-->
<?php } else {
?>

<nav class="navbar">
	<a href="index.php"><img style="width: 100%; max-width: 50px; margin: .5rem;" src="images/logo.png" alt="TuneIn logo"></a>
	<a href="#" class="toggle-button">
		<span class="bar"></span>
		<span class="bar"></span>
		<span class="bar"></span>
	</a>
	<div class="navbar-links">
		<ul>
			<li class="hover-underline-animation"><a href="login.php">Login</a></li>
			<li class="hover-underline-animation"><a href="register.php">Sign Up</a></li> 
		</ul>
	</div>
</nav>

<?php } 
?>
