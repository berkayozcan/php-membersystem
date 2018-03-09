<?php 
	include('dbConnect.php');

	if(isset($_POST['submit'])){
		$username = trim($_POST['username']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$passwordconfirm = trim($_POST['password-confirm']);

		echo $username, $email, $password, $passwordconfirm;
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Register Page</title>
</head>
<body>
	<?php include('navigation.php'); ?>
	<h2>Register Form</h2>
	<form action="register.php" method="POST">
		<input type="text" name="username" placeholder="Username..."></br>
		<input type="email" name="email" placeholder="E-Mail..."></br>
		<input type="password" name="password" placeholder="Password..."></br>
		<input type="password" name="password-confirm" value="Register" placeholder="Password Confirm..."></br>
		<input type="submit" name="submit">
	</form>
</body>
</html>
