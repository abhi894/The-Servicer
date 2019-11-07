<?php 
include("includes/header.php"); 



?>
<div class="main_column column"> 
<?php 

$data = mysqli_query($con, "SELECT * FROM bookings WHERE user_id='$userLoggedIn' ORDER BY id DESC");

while ($row= mysqli_fetch_array($data)) {
	$str="";
	$id= $row['id'];
	$mecid= $row['mechanic_id'];
	$uid= $row['user_id'];
	$loc= $row['locality'];
	$regnum=$row['reg_no'];
	$type=$row['type'];
	$status=$row['status'];
	$bookdate=$row['datetime'];

	if ($status==0) {
		$status= "Not Completed";
	}
	else
		$status= "Completed";


$mecdata = mysqli_query($con, "SELECT * FROM mechanic WHERE id='$mecid'");
$mechanic=mysqli_fetch_array($mecdata);

$mecname= $mechanic['name'];
$mecemail= $mechanic['email'];
$mecphone= $mechanic['phone'];




?>  <div class="bookings"> 
<div class='pic'>
	<img src='assets/pic.jpg' width='50'>
</div>

Booking ID: <?php echo $id; ?> &nbsp

Mechanic Details <br> Name: <?php echo $mecname; ?> &nbsp

Number: <?php echo $mecphone; ?> &nbsp

Email: <?php echo $mecemail; ?> &nbsp <br>

Locality: <?php echo $loc; ?> &nbsp 

Registration Number: <?php echo $regnum; ?> &nbsp 

Vehicle type: <?php echo $type; ?> &nbsp 

<br>

status: <?php echo $status; ?> &nbsp 

Booking Date & Time: <?php echo $bookdate; ?> &nbsp 
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
  Cancel booking
</button>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Are you sure?</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-footer">
      	<form action="mybookings.php?" method="POST">
        <input type="submit" name="delete" class="btn btn-danger" data-dismiss="modal" value="Yes i am Sure"></input>
        </form>
      
      </div>

    </div>
  </div>
</div>

</div> 
<?php 
}



?>




</div>