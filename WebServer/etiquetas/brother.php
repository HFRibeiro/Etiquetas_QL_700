<?php
$size = $_GET['s'];
$pic = $_GET['p'];
echo $size."<br>".$pic."<br>";
exec('sh /var/www/html/print.sh '.$size.' '.$pic,$output);
var_dump($output);
?>