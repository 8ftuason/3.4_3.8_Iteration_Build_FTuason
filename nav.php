<!-- when user is signed in-->
<?php
if(session_id() == ''){session_start();}
if(isset($_SESSION['login_user'])){
?>
     
<!-- This is for my burger navigation/menu with links to all my pages-->
<nav>
			<label>
				<input type="checkbox">
				<span class="menu"> <span class="hamburger"></span> </span>
				<ul>
					<li><a href="index.php">Home</a></li> 
					<li><a href="query1.php">Query 1</a></li>
					<li><a href="query2.php">Query 2</a></li>
					<?php
						//if the admin logs in (Graeme) then it the nav will show an additional link to the admin settings pages
                        if ($_SESSION["login_user"] == "Graeme"){
                            echo"<li><a href='user_list.php'>Admin Settings</a></li>";
                        }?>
					<li><a href='logout.php'>Logout</a></li>
				</ul>
			</label>
</nav> 
        
<!--when user is not signed in-->
<?php } else {
?>

<nav>
    <label>
			<input type="checkbox">
			<span class="menu"> <span class="hamburger"></span> </span>
			<ul>
				<li><a href="index.php">Home</a></li> 
				<li><a href="query1.php">Query 1</a></li>
				<li><a href="query2.php">Query 2</a></li>
				<li><a href='logout.php'>Logout</a></li>
			</ul>
		</label>
</nav>

<?php } 
?>
