<?php
class table {
	static public function tablestyle() {	//table style
		$string = "<style>
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
		</style>";
		return $string;
	}
	
	static public function tablecontect($tabl, $tablename) {	//display result within table function
		$str = "<div style='overflow-x:auto;'>";
		$str .= "<table style='width:100%'><caption>" . $tablename . "</caption>";
		foreach($tabl as $i => $k) {	
			$str .= "<tr>";
			if ($k == $tabl[0]) {	//first line of type name
				foreach($k as $m => $n) {
					if (!is_numeric($m)) {
						$str .= "<th>$m</th>";
					}
				}
				$str .= "</tr><tr>";
			}
			foreach($k as $j => $o) {	//split data
				if (!is_numeric($j)) {
					$str .= "<td>$o</td>";
				}
			}
				$str .= "</tr>";
		}
		$str .= "</table></div>";
		return 'There is ' . ++$i . ' whose user ID is less than 6 in table "accounts"<br>' . $str;	//answer question and display result
	}
}
