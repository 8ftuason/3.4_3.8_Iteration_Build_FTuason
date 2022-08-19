<!-- when user is signed in-->
<?php
if(session_id() == ''){session_start();}
if(isset($_SESSION['login_user'])){
?>

<!-- This is for my navigation menu with links to all my pages-->
<nav class="navbar">
	<a href="index.php"><img style="width: 100%; max-width: 50px; margin: .5rem;" src="images/placeholder.png" alt="TuneIn logo"></a>
	<!-- This is for when my navigation menu transitions into a burger menu for smaller screens-->
	<a href="#" class="toggle-button">
		<span class="bar"></span>
		<span class="bar"></span>
		<span class="bar"></span>
	</a>
	<div class="navbar-links">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href>Playlists</a>
				<ul>
					<li><a href="query1.php">Query 1</a></li>
					<li><a href="query2.php">Query 2</a></li>
				</ul>
				<?php
					//if the admin logs in (Graeme) then it the nav will show an additional link to the admin settings pages
                    if ($_SESSION["login_user"] == "Graeme"){
                    	echo"<li><a href>Admin Settings</a>
							<ul>
								<li><a href='user_list.php'>User List</a></li> 
								<li><a href='add_user.php'>Add New User</a></li>
								<li><a href='update_user.php'>Update User</a></li>
								<li><a href='delete_user.php'>Delete User</a></li>
							</ul>
						</li>";
                    }?>
			<li><a href='logout.php'>Logout</a></li>
		</ul>
	</div>
</nav> 
        
<!--when user is not signed in-->
<?php } else {
?>

<nav class="navbar">
	<a href="index.php"><img style="width: 100%; width: 50px; margin: .5rem;" src="images/placeholder.png" alt="TuneIn logo"></a>
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
