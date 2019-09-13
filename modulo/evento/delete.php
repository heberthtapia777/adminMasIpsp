<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 4/9/2016
 * Time: 23:31
 */
include '../../inc/sessionControl.php';

$data = stripslashes($_POST['res']);

$data = json_decode($data);

$sql = "DELETE FROM evento WHERE idEvento = '".$data->id."' ";

$reg = $db->Execute($sql);

if($reg)
    echo json_encode($data);
else
    echo 0;
?>
