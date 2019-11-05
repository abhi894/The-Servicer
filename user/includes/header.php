<?php 

require 'config/config.php';

if (isset($_SESSION['username'])) {
	$userLoggedIn= $_SESSION['username'];
}
else{
	header("Location: login.php");
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Welcome to The Servicer</title>
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 	<script src="assets/javascript/bootstrap.js"></script>
 	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
 	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
 </head>
 <body>

 	<div class="top_bar">
 		<div class="logo">
 			<a href="index.php">The Servicer</a>
 		</div>
 		<nav>
 		<a href="#">Dashbard</a>
 		<a href="#">My Bookings</a>
 		<a href="#">Profile</a>
 	</nav>


 	</div>