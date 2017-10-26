<?php
ini_set('display_errors', 'On');	//Debug
error_reporting(E_ALL | E_STRICT);

header("Cache-Control: no-cache, must-revalidate");	//No Cache
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

class Manage {	//include class for spl_autoload
    public static function autoload($class) {
        //you can put any file name or directory here
        include $class . '.php';
    }
}



spl_autoload_register(array('Manage', 'autoload'));	//autoload classes
$obj = new main();	//instantiate the program object

?>
