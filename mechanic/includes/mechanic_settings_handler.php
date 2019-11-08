<?php 

if (isset($_POST['update_details'])) {
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];

	$email_check = mysqli_query($con, "SELECT * FROM mechanic WHERE email='$email'");
	$row = mysqli_fetch_array($email_check);
	$matched_user = $row['id'];

	if($matched_user == "" || $matched_user == $userLoggedIn) {
		$message = "Details updated!<br><br>";


		$query = mysqli_query($con, "UPDATE mechanic SET name='$name', phone='$phone', email='$email' WHERE id='$userLoggedIn'");
	}
	else 
		$message = "That email is already in use!<br><br>";
}
else 
	$message = "";

	if(isset($_POST['update_pw'])) {

	$old_password = strip_tags($_POST['oldpw']);
	$new_password_1 = strip_tags($_POST['newpw1']);
	$new_password_2 = strip_tags($_POST['newpw2']);

	$password_query = mysqli_query($con, "SELECT password FROM mechanic WHERE id='$userLoggedIn'");
	$row = mysqli_fetch_array($password_query);
	$db_password = $row['password'];

	if(md5($old_password) == $db_password) {

		if($new_password_1 == $new_password_2) {


			if(strlen($new_password_1) <= 4) {
				$password_message = "Sorry, your password must be greater than 4 characters<br><br>";
			}	
			else {
				$new_password_md5 = md5($new_password_1);
				$password_query = mysqli_query($con, "UPDATE mechanic SET password='$new_password_md5' WHERE id='$userLoggedIn'");
				$password_message = "Password has been changed!<br><br>";
			}


		}
		else {
			$password_message = "Your two new passwords need to match!<br><br>";
		}

	}
	else {
			$password_message = "The old password is incorrect! <br><br>";
	}

}
else {
	$password_message = "";
}

if(isset($_POST['closeacc'])) {
	header("Location: closeacc.php");
}

 ?>