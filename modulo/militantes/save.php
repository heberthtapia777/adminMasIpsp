<?PHP
	include '../../inc/sessionControl.php';


	$fecha = $op->ToDay();
	$hora = $op->Time();

	$data = stripslashes($_POST['res']);

	$data = json_decode($data);

	//$cargo = $op->toCargo($data->cargo);

	$strQuery = "INSERT INTO militante ( paterno, materno,  nombres, ci, cargo ) ";
	$strQuery.= "VALUES ('".$data->paterno."', '".$data->materno."', '".$data->name."', '".$data->ci."', '".$data->cargo."')";

	$sql = $db->Execute($strQuery);

	if($sql)
		echo json_encode($data);
	else
		echo 0;

?>
