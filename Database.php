<?php
class Database {
	static public function connect($a, $b, $c) {
		try {
			$conn = new PDO($a, $b, $c);
		} catch(PDOException $e) {
			return "Connection failed: " . $e->getMessage();
		}
	}
	
	static public function exec($dns, $usr, $pwd, $sqlcmd) {
		try {	
			$conn = new PDO($dns, $usr, $pwd);
			$q = $conn->prepare($sqlcmd);
			$q->execute();
			$str = $q->fetchAll();
			//print_r($str);
			return table::tablecontect($str, 'MySQL Result:');
			$q->closeCursor();	
		} catch (PDOException $e) {
			return "500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage();
		}
	}

}
