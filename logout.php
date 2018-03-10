<?php 
	include('class/dbConnect.php');
	include('class/Login.php');

	if(!Login::isLoggedIn()){
		die("Not logged in.");
	}

	if(isset($_POST['confirm'])){
		if(isset($_POST['alldevices'])){
							dbConnect::query('DELETE FROM login_tokens WHERE userID=:userid', array(':userID'=>Login::isLoggedIn()));


		}else{
			if(isset($_COOKIE['COID'])){
				dbConnect::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['COID'])));
			}

			setcookie('COID', '1', time()-3600);
			setcookie('COID_', '1', time()-3600);
		}
	}
 ?>

 <h2>Logout page</h2>

 <form action="logout.php" method="POST">
 	<input type="checkbox" name="alldevices">Logout all devices?</br>
 	<input type="submit" name="confirm" value="Logout">
 </form>
