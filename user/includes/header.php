<?php 

require 'config/config.php';

if (isset($_SESSION['username'])) {
	$userLoggedIn= $_SESSION['username'];
	$user_details_query = mysqli_query($con, "SELECT * FROM user WHERE id='$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);
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
 	<script src="https://kit.fontawesome.com/859866b78b.js" crossorigin="anonymous"></script>
 	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
 </head>
 <body>

 	<div class="top_bar">
 		<div class="logo">
 			<a href="index.php">The Servicer</a>
 		</div>
 		<nav>
 		<a href="#"><i class="fas fa-home"></i> Dashbard</a>&nbsp
 		<a href="#"><i class="far fa-object-ungroup"></i> My Bookings</a> &nbsp
 		<a href="#"><i class="fas fa-users-cog"></i>  Settings</a>&nbsp
 		<a href="logout.php"><i class="fas fa-sign-out-alt"></i> Sign out</a>&nbsp
 	</nav>
 


 	</div>