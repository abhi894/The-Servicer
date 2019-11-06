<?php
include("includes/header.php");

if(isset($_POST['cancel'])) {
	header("Location: settings.php");
}

if(isset($_POST['close_account'])) {
	$close_query = mysqli_query($con, "DELETE FROM `user` WHERE `user`.`id` = $userLoggedIn");
	session_destroy();
	header("Location: login.php");
}


?>

<div class="main_column column">

	<h4>Close Account</h4>

	Are you sure you want to close your account?<br><br>
	Closing your account will Remove your Data forever<br><br>


	<form action="closeacc.php" method="POST">
		<input type="submit" name="close_account" id="close_account" value="Yes! Close it!" class="danger settings_submit">
		<input type="submit" name="cancel" id="update_details" value="No way!" class="info settings_submit">
	</form>

</div>