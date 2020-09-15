<?php
ini_set("display_errors", On);
error_reporting(E_ALL);
require("kansuji.php");

$res = true;
$handle=fopen("test.csv","r");
while(($row=fgetcsv($handle, 1000, ","))!==false){
	$res = $res && (kansuji($row[0]) == $row[1]);
}
var_dump($res);
?>