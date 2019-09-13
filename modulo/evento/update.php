<?PHP
	include '../../inc/sessionControl.php';


	$fecha = $op->ToDay();
	$hora = $op->Time();

	$data = stripslashes($_POST['res']);

	$data = json_decode($data);

	//$cargo = $op->toCargo($data->cargo);

	$strQuery = "UPDATE evento SET name = '".$data->nameU."', site = '".$data->siteU."',  obser = '".$data->obserU."', date = '".$data->date1."', time = '".$data->time1."', status = '".$data->statusU."' WHERE idEvento = '".$data->idEvento."' ";

	$sql = $db->Execute($strQuery);

	if($sql)
		echo json_encode($data);
	else
		echo 0;

?>
