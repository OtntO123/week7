<?php
class Database {
	static public function connect($a, $b, $c) {	//test connectivity
		try {
			$conn = new PDO($a, $b, $c);	//send sql code through PDO
		} catch(PDOException $e) {
			return "Connection failed: " . $e->getMessage();
		}
	}
	
	static public function exec($dns, $usr, $pwd, $sqlcmd) {	//run sql code
		try {	
			$conn = new PDO($dns, $usr, $pwd);
			$q = $conn->prepare($sqlcmd);
			$q->execute();	//run sql code
			$str = $q->fetchAll();	//fetch result
			//print_r($str);
			return table::tablecontect($str, 'MySQL Result:');	//print result through tableconnect function
			$q->closeCursor();	
		} catch (PDOException $e) {
			return "500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage();	//print error
		}
	}

}
