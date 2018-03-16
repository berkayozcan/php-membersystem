<?php 
	include('class/dbConnect.php');

	if(isset($_POST['register'])){
		$username = trim($_POST['username']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$passwordconfirm = trim($_POST['password-confirm']);


		if(!dbConnect::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))){

			if($password == $passwordconfirm){
				if(strlen($username) >=3 && strlen($username) <= 32){

					if(preg_match('/[a-zA-Z0-9_]+/', $username)){

						if(strlen($password) >=6 && strlen($password) <=32){

							if(filter_var($email, FILTER_VALIDATE_EMAIL)){

								if(!dbConnect::query('SELECT email from users WHERE email=:email', array(':email'=>$email))){

									dbConnect::query('INSERT INTO users VALUES(null, :username, :password, :email, null)', array(':username'=>$username, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':email'=>$email));
									echo "Success";

								}else{
									echo "E-mail in use";
								}
							}else{
								echo "Invalid email!";
							}
						}else{
							echo "Invalid password";
						}
					}else{
						echo "Invalid username";
					}
				}else{
					echo "Invalid username!";
				}
			}else{
				echo "Passwords not match!";
			}
		}else{
			echo "User already exists!";
		}
		
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
		<input type="password" name="password-confirm" placeholder="Password Confirm..."></br>
		<input type="submit" name="register" value="Register">
	</form>
</body>
</html>
