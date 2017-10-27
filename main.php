<?php

class main {

	protected $html;

	public function __construct()	{
		$this->html .= "<html>";
		$this->html .= "<head>";

		$dns = 'mysql:host=sql.njit.edu;dbname=kz233';
		$usr = 'kz233';
		$pwd = 'imperil89';
		$sqlcmd = "select * from accounts where id < 6";

		if(Database::connect($dns, $usr, $pwd) != '')	{
			$this->html .= Database::connect($dns, $usr, $pwd);	//return err if not connected
		} else {
			$this->html .= table::tablestyle();	//table style
			$this->html .= '<h1>Success to login MySQL</h1>';
			$this->html .= '<h2>MySQL command is: ' . $sqlcmd . '</h2>';	//show sql command
			$this->html .= "</head>";
			$this->html .= "<body>";
			$this->html .= Database::exec($dns, $usr, $pwd, $sqlcmd);	//run sql command and return result
		}
	}
	
	public function __destruct()	{
		$this->html .= "</body>";
		$this->html .= "</html>";
		echo $this->html;	//print html code
	}

}
