<?php
$dbhost = '172.16.1.5';
$dbuser = 'root';
$dbpass = 'y2oo9+2';
$dbname = 'gestaoSTOCK';


try{
$pdo = new pdo( 'mysql:host='.$dbhost.';dbname='.$dbname.'',$dbuser,$dbpass,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(PDOException $ex){
	die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
}



 ?>
