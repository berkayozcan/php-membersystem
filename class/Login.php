<?php 

class Login{
	public static function isLoggedIn(){

		if(isset($_COOKIE['COID'])){

			if(dbConnect::query('SELECT userID from login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['COID'])))){
				$userid = dbConnect::query('SELECT userID from login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['COID'])))[0]['userID'];

				if(isset($_COOKIE['COID_'])){
					return $userid;
				}else{

					$cstrong = True;
					$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
					dbConnect::query('INSERT INTO login_tokens VALUES(null, :token, :userID)', array(':token'=>sha1($token), ':userID'=>$userid));
					dbConnect::query('DELETE from login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['COID'])));

					setcookie("COID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
					setcookie("COID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

					return $userid;
				}

				
			}	
		}
		return false;
	}
}

 ?>