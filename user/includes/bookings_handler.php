<?php 

if (isset($_POST['book'])) {

	$reg=$_POST['reg'];
	$type=$_POST['type'];
	$locality=$_POST['locality'];


$mechanic_data_query = mysqli_query($con, "SELECT id FROM mechanic WHERE status='1' LIMIT 1");

$check_online= mysqli_num_rows($mechanic_data_query);

if($check_online == 1) {
	$row = mysqli_fetch_array($mechanic_data_query);

	$mecid = $row['id'];

	$date_added = date("Y-m-d H:i:s");

	$query = mysqli_query($con, "INSERT INTO `bookings` (`id`, `user_id`, `mechanic_id`, `datetime`, `locality`, `reg_no`, `type`, `status`) VALUES (NULL, '$userLoggedIn', '$mecid', '$date_added', '$locality', '$reg', '$type', '0')");

	$message = "Booking Sucessfull";
}
else
$message = "No Mechanics online";

}


 ?>