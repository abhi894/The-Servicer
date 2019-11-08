<?php 
include("includes/header.php"); 
include("includes/settings_handler.php"); 


 ?>

 <div class="main_column column">

 <?php
	$user_data_query = mysqli_query($con, "SELECT name, phone, email,locality FROM mechanic WHERE id='$userLoggedIn'");
	$row = mysqli_fetch_array($user_data_query);

	$name = $row['name'];
	$phone = $row['phone'];
	$email = $row['email'];
	$locality = $row['locality']
	?>

	
  <h5>Locality: </h5><?php echo $locality ?> <br>

 <div class="column1">	<h4> Account Settings</h4>

 	Modify the values and click "Update Details"

 	

 	<form action="settings.php" method="POST">


 		Name : <input type="text" name="name" value="<?php echo $name ?>"> <br>

 		Email : <input type="email" name="email" value="<?php echo $email ?>"> <br>

 		Phone : <input type="text" name="phone" value="<?php echo $phone ?>"> <br>
 		<input type="submit" name="update_details" value="Update Details"> <br>
 		<?php echo $message; ?>
 	</form>
 		Change password
 		<form action="settings.php" method="POST">

 		old password : <input type="password" name="oldpw"  > <br>

 		New password : <input type="password" name="newpw1"  > <br>

 		New password : <input type="password" name="newpw2" > <br>

 		<input type="submit" name="update_pw" value="Update Password"> <br>
 		<?php echo $password_message; ?>
 		
 	</form>
	 <h4> Close Account </h4>

 	<form action="closeacc.php" method="POST">
 		<input type="submit" name="closeacc" id="closeacc" value="Close Account">
 	</form>
 	</div>

 </div>