<?php
session_start();
//destroys session and logs user out and brings them back to the login page
if(isset($_SESSION['login_user'])){
    session_destroy();
    header("location:login.php");
    }
else{
    header("location:index.php");
}
?>
