<?php
	include('class/dbConnect.php'); 
	include('class/Login.php');

	if(Login::isLoggedIn()){
		if(isset($_POST['changepassword'])){

			$oldpassword = $_POST['oldpassword'];
			$newpassword = $_POST['newpassword'];
			$newpasswordrepeat = $_POST['newpasswordrepeat'];
			$userid = Login::isLoggedIn();

			if(password_verify($oldpassword, dbConnect::query('SELECT password from users WHERE userID=:userid', array(':userid'=>$userid))[0]['password'])){
				if($newpassword == $newpasswordrepeat){
					if(strlen($newpassword) >=6 && strlen($newpassword) <=32){
						dbConnect::query('UPDATE users SET password=:newpassword WHERE userID=:userid', array(':newpassword'=>password_hash($newpassword, PASSWORD_BCRYPT), ':userid'=>$userid));
							echo "Password changed!";
					}
				}else{
					echo "Password dont match";
				}
			}else{
				echo "Incorrect old password";
			}

		}
	}else{
		die ('Not logged in!');
	}
?>
<?php include('navigation.php'); ?>
<h1>Change Password</h1>
<form action="change-password.php" method="post">
	<input type="password" name="oldpassword" placeholder="Current Password..."></p>
	<input type="password" name="newpassword" placeholder="New Password..."></p>
	<input type="password" name="newpasswordrepeat" placeholder="Repeat New Password..."></p>
	<input type="submit" name="changepassword" value="Change Password">
</form>