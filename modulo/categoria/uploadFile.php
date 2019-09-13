<?php
include '../../adodb5/adodb.inc.php';

$db = NewADOConnection('mysqli');
//$db->debug = true;
$db->Connect();

$sql = "TRUNCATE TABLE auxImg ";
$strImg = $db->Execute($sql);

$name = $_POST['name'];
$size = $_POST['size'];

$strQuery = "INSERT INTO auxImg( name, size ) ";
$strQuery.= "VALUES( '".$name."', '".$size."' ) ";

$srt = $db->Execute($strQuery);

if($srt)
	echo 1;
else
	echo 0;
?>