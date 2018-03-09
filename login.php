<?php 
	include('dbConnect.php');

	if(isset($_POST['submit'])){
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		echo $username, $password;
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<?php include('navigation.php'); ?>
	<h2>Login Form</h2>
	<form action="login.php" method="POST">
		<input type="text" name="username" placeholder="Username...">
		<input type="password" name="password" placeholder="Password...">
		<input type="submit" name="submit" value="Login">
	</form>

</body>
</html>