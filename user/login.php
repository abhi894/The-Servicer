<?php  
$con = mysqli_connect("localhost", "root", "", "servicer"); //Connection variable

if(mysqli_connect_errno()) 
{
	echo "Failed to connect: " . mysqli_connect_errno();
}


?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title></title>
</head>
<body style="text-align-last: center;
    padding: 10%;
    background-color: aliceblue;">

    <div style="    background-color: #CDDC39;
    border-radius: 25px;
    padding: 10px;">
<div><h2>Welcome to ServiceBooker</h2></div>

<div>
	Enter your Details
	<div>
		<form name="loginbook" id="loginbook" action="#">
		Login ID :
		<input type="text" name="u_id" placeholder="Enter Your User ID"> <br>
		Password : <input type="password" name="password"><br>
		<input type="submit" name="login" value="Login">
		<button> Forgot login creditals.. </button>
</form>



	</div>
<button> <a href="register.php">New user? Create account </a></button>
</div>
</div>
</body>
</html>