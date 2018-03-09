<?php 
	include('class/dbConnect.php');

	if(isset($_POST['login'])){
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		
		if(dbConnect::query('SELECT username from users WHERE username=:username', array(':username'=>$username))){
			if(password_verify($password, dbConnect::query('SELECT password from users WHERE username=:username', array(':username'=>$username))[0]['password'])){
				echo "Logged in!";

				$cstrong = True;
				$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));

				$user_id = dbConnect::query('SELECT userID from users where username=:username', array(':username'=>$username))[0]['userID'];
				dbConnect::query('INSERT INTO login_tokens VALUES(null, :token, :userID)', array(':token'=>sha1($token), ':userID'=>$user_id));

				setcookie("COID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);

			}else{
				echo "Incorrect password";
			}
		}else{
			echo "User not registered.";
		}
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
		<input type="submit" name="login" value="Login">
	</form>

</body>
</html>