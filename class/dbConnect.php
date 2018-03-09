<?php 


class dbConnect{
	private static function connect(){
		$pdo = new PDO('mysql:host=127.0.0.1;dbname=db_phpMember;charset=utf8', 'root', 'brkozc95');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}

	public static function query($query, $params = array()){
		$statement = self::connect()->prepare($query);
		$statement->execute($params);

		if(explode(' ', $query)[0] == 'SELECT'){
			$data = $statement->fetchALL();
			return $data;	
		}
		
	}
}

 ?>
