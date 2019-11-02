<?php 
require 'config/config.php';
if (isset($_SESSION['username'])) {
	$userLoggedIn= $_SESSION['username'];
}
else {
	header("Location: login.php");
}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Welcome to The Servicer</title>
 </head>
 <body> 