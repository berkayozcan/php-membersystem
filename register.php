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

 <form action="register.php" method="POST">
 	<input type="text" name="username" placeholder="Username...">
 	<input type="email" name="email" placeholder="E-Mail...">
 	<input type="password" name="password" placeholder="Password...">
 	<input type="password" name="password-confirm" placeholder="Password Confirm...">
 	<input type="submit" name="submit">
 </form>