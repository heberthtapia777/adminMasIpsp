<?php

include '../../adodb5/adodb.inc.php';
include '../../inc/function.php';

$db = NewADOConnection('mysqli');
//$db->debug = true;
$db->Connect();

$op = new cnFunction();

$id = $_REQUEST['id'];

$data = new stdClass();

$sql = "SELECT foto, size FROM categoria WHERE id_categoria = ".$id."";

$srtQuery = $db->Execute($sql);
$c = 0;
while( $row = $srtQuery->FetchRow()){
	$data->id[$c] = $row[0];
	$data->size[$c] = $row[1];
	$c++;
}

$data->num = $c;

echo json_encode($data);

?>