<?php  


require 'config/config.php';


//Declaring variables to prevent errors
$name = ""; //name

$em = ""; //email
$phone = ""; //email 2
$password = ""; //password
$password2 = ""; //password 2
$date = ""; //Sign up date 
$error_array = array(); //Holds error messages

if(isset($_POST['register_button'])){

	//Registration form values

	//First name
	$name = strip_tags($_POST['reg_fname']); //Remove html tags
	
	$name = ucfirst(strtolower($name)); //Uppercase first letter
	$_SESSION['reg_fname'] = $name; //Stores first name into session variable



	//email
	$em = strip_tags($_POST['reg_email']); //Remove html tags
	$em = str_replace(' ', '', $em); //remove spaces
	$em = ucfirst(strtolower($em)); //Uppercase first letter
	$_SESSION['reg_email'] = $em; //Stores email into session variable

	//email 2
	$phone = strip_tags($_POST['reg_email2']); //Remove html tags
	$phone = str_replace(' ', '', $phone); //remove spaces
	$_SESSION['reg_email2'] = $phone; //Stores email2 into session variable

	//Password
	$password = strip_tags($_POST['reg_password']); //Remove html tags
	$password2 = strip_tags($_POST['reg_password2']); //Remove html tags

	$date = date("Y-m-d"); //Current date

	
		if(filter_var($em, FILTER_VALIDATE_EMAIL)) {

			$em = filter_var($em, FILTER_VALIDATE_EMAIL);

			//Check if email already exists 
			$e_check = mysqli_query($con, "SELECT email FROM user WHERE email='$em'");

			//Count the number of rows returned
			$num_rows = mysqli_num_rows($e_check);

			if($num_rows > 0) {
				array_push($error_array, "Email already in use<br>");
			}

		}
		else {
			array_push($error_array, "Invalid email format<br>");
		}


	
	


	if(strlen($name) > 25 || strlen($name) < 2) {
		array_push($error_array, "Your name must be between 2 and 25 characters<br>");
	}

	

	if($password != $password2) {
		array_push($error_array,  "Your passwords do not match<br>");
	}
	else {
		if(preg_match('/[^A-Za-z0-9]/', $password)) {
			array_push($error_array, "Your password can only contain english characters or numbers<br>");
		}
	}

	if(strlen($password > 30 || strlen($password) < 5)) {
		array_push($error_array, "Your password must be betwen 5 and 30 characters<br>");
	}


	if(empty($error_array)) {
		$password = md5($password); //Encrypt password before sending to database

		


		$query = mysqli_query($con, "INSERT INTO user VALUES ('', '$name', '$em', '$password', '$phone', '1')");

		array_push($error_array, "<span style='color: #14C800;'>You're all set! Goahead and login!</span><br>");

		//Clear session variables 
		$_SESSION['reg_fname'] = "";
		$_SESSION['reg_email'] = "";
		$_SESSION['reg_email2'] = "";

	}

}

?>


<html>
<link rel="stylesheet" href="styles/register.css"/>
<head>
	<title>User Registration</title>
</head>
<body>
<div class="home">
	<a href="../index.html"><h3>Home</h3></a>
</div>

<div class="container">
	<section id="content">
		<form action="register.php" method="POST">
			<h1>Sign Up</h1>
      <div>
				<input type="text" name="reg_fname" placeholder="First Name" value="<?php 
		if(isset($_SESSION['reg_fname'])) {
			echo $_SESSION['reg_fname'];
		} 
		?>" required>
        <?php if(in_array("Your name must be between 2 and 25 characters<br>", $error_array)) echo "Your first name must be between 2 and 25 characters<br>"; ?>
			</div>
      
      
			<div>
				<input type="email" name="reg_email" placeholder="Email" value="<?php 
		if(isset($_SESSION['reg_email'])) {
			echo $_SESSION['reg_email'];
		} 
		?>" required>
			</div>
      
      <div>
			<input type="text" name="reg_email2" placeholder="Phone number" value="<?php 
		if(isset($_SESSION['reg_email2'])) {
			echo $_SESSION['reg_email2'];
		} 
		?>" required>
		<?php if(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>"; 
		else if(in_array("Invalid email format<br>", $error_array)) echo "Invalid email format<br>";
		else if(in_array("Emails don't match<br>", $error_array)) echo "Emails don't match<br>"; ?>
			</div>
      
      
      <div>
				<input type="password" name="reg_password" placeholder="Password" required>
			</div>
      
      <div>
				<input type="password" name="reg_password2" placeholder="Confirm Password" required>
        <?php if(in_array("Your passwords do not match<br>", $error_array)) echo "Your passwords do not match<br>"; 
		else if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "Your password can only contain english characters or numbers<br>";
		else if(in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)) echo "Your password must be betwen 5 and 30 characters<br>"; ?>
			</div>
			<div>
				<input type="submit" name="register_button" value="Register">
				<a href="login.php">Already a user? </a>
			</div>
		</form><!-- form -->
		<div class="button">
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>