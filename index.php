<?php
	include('class/dbConnect.php'); 
	include('class/Login.php');

	if(Login::isLoggedIn()){
		echo "Logged In!";
		echo Login::isLoggedIn();
	}else{
		echo "Not logged in!";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP Member System</title>
</head>
<body>
	<?php include('navigation.php'); ?>
	<h1>Simple PHP Member System Using Cookies!</h1>

</body>
</html>