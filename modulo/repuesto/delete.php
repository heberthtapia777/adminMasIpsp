<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 4/9/2016
 * Time: 23:31
 */
include '../../adodb5/adodb.inc.php';
include '../../inc/function.php';

$db = NewADOConnection('mysqli');
//$db->debug = true;
$db->Connect();

$op = new cnFunction();

$data = stripslashes($_POST['res']);

$data = json_decode($data);

//$q = "DELETE FROM repuesto AS r, almacen AS a WHERE r.id_repuesto = '".$data->id."' ";

$sql = "DELETE repuesto, almacen FROM repuesto INNER JOIN almacen WHERE repuesto.id_repuesto = almacen.id_repuesto AND repuesto.id_repuesto = '".$data->id."'";
$reg = $db->Execute($sql);

$sql = "DELETE FROM foto WHERE id_repuesto = '".$data->id."' ";
$reg = $db->Execute($sql);

if($reg)
    echo json_encode($data);
else
    echo 0;
?>