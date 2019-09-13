<?php
include '../../inc/sessionControl.php';

$data = stripslashes($_POST['res']);

$data = json_decode($data);

?>

<?PHP
    $sqle = "SELECT * ";
    $sqle.= "FROM readQR ";
    $sqle.= "WHERE idEvento = $data->id ";

    $srtQuery = $db->Execute($sqle);

    $rowe = $srtQuery->FetchRow();

    if($rowe)
        echo json_encode($data);
    else
        echo 0;
?>
