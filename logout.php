<?php
session_start(); 

if (isset($_SESSION['username'])) { 
    session_destroy(); //Destroy the session data.
}

header("Location: login.php"); //Redirect to the login page after logout.
?>