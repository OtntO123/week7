<?php
$dns = 'mysql:host=sql.njit.edu;dbname=kz233';
$username = 'kz233';
$password = 'imperil89';
try {
$conn = new PDO($dns, $username, $password);
}

catch(PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
}

$sql = "select id,email,fname,password from accounts  ";

global $conn;
global $results;
try {
	$q = $conn->prepare($sql);
	$q->execute();
	$results = $q->fetchAll();
	$q->closeCursor();	
	} catch (PDOException $e) {
	echo ("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
	}	

$string = '';		
		$string .= "<html>";
		$string .= "<head>
		<style>
		table {
		    border-collapse: collapse;
		    width: 100%;
		}
		th, td {
		    text-align: left;
		    padding: 8px;
		}
		th {
		    background-color: Indigo;
		    color: white;
		}
		tr:nth-child(even){background-color: #f2f2f2}
		tr:hover {background-color: LightSkyBlue}
		caption { 
			display: table-caption;
			text-align: center;
			color: MidnightBlue;
			font-size:200%;
		}
		</style>
		</head>";
		$string .= "<body>";
		$string .= "<div style='overflow-x:auto;'>";
		$string .= "<table style='width:100%'><caption>" . "filename" . "</caption>";
		$appp = $results;
		foreach($appp as $i => $k) {	
			$string .= "<tr>";
			foreach($k as $j) {	//split data
				$string .= ($i == 0) ? "<th>$j</th>" : "<td>$j</td>";
        		}
        		$string .= "</tr>";
		}
		$string .= "</table></div>";
		$string .= "</body>";
echo $string;
?>
