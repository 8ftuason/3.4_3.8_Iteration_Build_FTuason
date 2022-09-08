<!-- when user is signed in-->
<?php
if(session_id() == ''){session_start();}
if(isset($_SESSION['login_user'])){
?>

<!-- This is for my navigation menu with links to all my pages-->
<nav class="navbar">
	<a href="index.php"><img class= "logo" src="images/logo.png" style="width: 100%; max-width: 60px; margin: .5rem;" alt="TuneIn logo"></a>
	<!-- This is for when my navigation menu transitions into a burger menu for smaller screens-->
	<a href="#" class="toggle-button">
		<span class="bar"></span>
		<span class="bar"></span>
		<span class="bar"></span>
	</a>
	<div class="navbar-links">
		<ul>			
			<li class="hover-underline-animation"><a href>Playlists</a>
				<ul>
					<li class="hover-underline-animation"><a href="query1.php">Query 1</a></li>
					<li class="hover-underline-animation"><a href="query2.php">Query 2</a></li>
				</ul>
				<?php
					//if the admin logs in (Graeme) then it the nav will show an additional link to the admin settings pages
                    if ($_SESSION["login_user"] == "Graeme" or $_SESSION["login_user"] == "graeme"){
                    	echo"<li class='hover-underline-animation'><a href>Admin Settings</a>
							<ul>
								<li class='hover-underline-animation'><a href='user_list.php'>User List</a></li> 
								<li class='hover-underline-animation'><a href='add_user.php'>Add New User</a></li>
								<li class='hover-underline-animation'><a href='update_user.php'>Update User</a></li>
								<li class='hover-underline-animation'><a href='delete_user.php'>Delete User</a></li>
							</ul>
						</li>";
                    }?>
			<li class="hide"><a style="margin-right: 10px;">|</a></li>
			<li class="hide"><img style="margin-top: 10px; width: 100%; max-width: 30px;" src="images/profile.png" alt="Profile Icon"></li>
			<li class="hide"><a style="display: inline-block; font-weight: 700;"><?php echo ($_SESSION['login_user'])?></a></li>
			<li class="hover-underline-animation"><a href='logout.php'>Logout</a></li>
		</ul>
	</div>
</nav> 
        
<!--when user is not signed in-->
<?php } else {
?>

<nav class="navbar">
	<a href="index.php"><img class= "logo" src="images/logo.png" style="width: 100%; max-width: 60px; margin: .5rem;" alt="TuneIn logo"></a>
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
