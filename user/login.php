<?php  
require 'config/config.php';
$error_array = array();

if(isset($_POST['login'])) {

	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); //sanitize email

	$_SESSION['email'] = $email; //Store email into session variable 
	$password = md5($_POST['password']); //Get password

	$check_database_query = mysqli_query($con, "SELECT * FROM user WHERE email='$email' AND password='$password'");
	$check_login_query = mysqli_num_rows($check_database_query);

	if($check_login_query == 1) {
		$row = mysqli_fetch_array($check_database_query);
		$username = $row['id'];

		$user_closed_query = mysqli_query($con, "SELECT * FROM user WHERE email='$email' AND status='0'");
		if(mysqli_num_rows($user_closed_query) == 1) {
			$reopen_account = mysqli_query($con, "UPDATE user SET status='1' WHERE email='$email'");
		}

		$_SESSION['username'] = $username;
		header("Location: index.php");
		exit();
	}
	else {
		array_push($error_array, "Email or password was incorrect<br>");
	}


}

?>
<!DOCTYPE html>
<html>
<head>

	<title></title>
</head>
<body >
<div><h2>Welcome to ServiceBooker</h2></div>

<div>
	Enter your Details
	<div>
		<form name="login" id="login" action="login.php" method="POST">
		Login ID :
		<input type="email" name="email" placeholder="Enter Your User ID"> <br>
		Password : <input type="password" name="password" placeholder="Password"><br>

		 
		<?php if(in_array("Email or password was incorrect<br>", $error_array)) echo "Email or password was incorrect<br>"; ?>

		<input type="submit" name="login" value="Login">
		<button> Forgot login creditals.. </button>
</form>



	</div>
<button> <a href="register.php">New user? Create account </a></button>
</div>
</div>
</body>
</html>