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
<link rel="stylesheet" href="styles/login.css"/>
<head>
	<title>User Login</title>
</head>
<body style="margin:0px">

<div>
<div class="home">
	<a href="../index.html"><h3>Home</h3></a>
</div>

<div class="login_title">
	<h1>Welcome To Service Booker</h1><br>
</div>


<div class="container">
	<section id="content">
		<form name="login" id="login" action="login.php" method="POST">
			<h1>Login Form</h1>
			<div>
				<input type="email" name="email" placeholder="Email">
			</div>
			<div>
				<input type="password" name="password" placeholder="Password"><br>
        <?php if(in_array("Email or password was incorrect<br>", $error_array)) echo "Email or password was incorrect<br>"; ?>
			</div>
      
			<div>
				<input type="submit" name="login" value="Login">
				<a href="#">Lost your password?</a>
				<a href="register.php">New user? </a></button>
			</div>
		</form><!-- form -->
		<div class="button">
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>