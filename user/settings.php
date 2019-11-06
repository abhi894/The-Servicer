<?php 
include("includes/header.php"); 
include("includes/settings_handler.php"); 


 ?>

 <div class="main_column column">

 	<h4> Account Settings</h4>

 	Modify the values and click "Update Details"

 	<form action="settings.php">

 		Name : <input type="text" name="name" value="<?php echo $user['name']; ?>"> <br>

 		Email : <input type="email" name="email" value="<?php echo $user['email']; ?>"> <br>

 		Phone : <input type="text" name="phone" value="<?php echo $user['phone']; ?>"> <br>
 		<input type="submit" name="update_details" value="Update Details"> <br>
 	</form>
 		Chance password
 		<form action="settings.php">

 		old password : <input type="password" name="oldpw"  > <br>

 		New password : <input type="password" name="newpw1"  > <br>

 		New password : <input type="password" name="newpw2" > <br>

 		<input type="submit" name="update_pw" value="Update Password"> <br>
 		
 	</form>
 	<h4> Close Account </h4>
 	<form action="closeacc.php">
 		<input type="submit" name="closeacc" id="closeacc" value="Close Account">
 	</form>
 	

 </div>