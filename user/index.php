<?php 
include("includes/header.php"); 
$message="";
include("includes/bookings_handler.php"); 
?>

<div class="main_column column"> 

	<h4> Book Service</h4>

  <h6> Enter the vehicle details here </h6>
  <br>
  <br>


	<form action="index.php" method="POST">
		

 		<div class="form-group">
  <label for="usr">Vehicle Registration Number :</label>
  <input type="text" class="form-control" id="usr" name="reg">
</div>

 		<div class="form-group">
  <label for="sel1">Type : </label>
  <select class="form-control" id="sel1" name="type">
    <option value="car">Car</option>
    <option value="bike">Bike</option>
    
  </select>

 		 <div class="form-group">
  <label for="sel1">Locality :</label>
  <select class="form-control" id="sel1" name="locality">
    <option value="kalamassery">kalamassery</option>
    <option value="kakkanad">kakkanad</option>
    <option value="edapally">edapally</option>
    <option value="aluva">aluva</option>

  </select>

  

  <?php echo $message; ?>
<div class="summit">
 <input type="submit"  name="book" value="Book Now" >

	</form>

</div>



 </div>
 
 </div>
 </body>
 </html>