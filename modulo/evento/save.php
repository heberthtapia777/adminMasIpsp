<?PHP
	include '../../inc/sessionControl.php';


	$fecha = $op->ToDay();
	$hora = $op->Time();

	$data = stripslashes($_POST['res']);

	$data = json_decode($data);

	//$cargo = $op->toCargo($data->cargo);

	$strQuery = "INSERT INTO evento ( name, site,  obser, date, time, status ) ";
	$strQuery.= "VALUES ('".$data->name."', '".$data->site."', '".$data->obser."', '".$data->date."', '".$data->time."', '".$data->status."')";

	$sql = $db->Execute($strQuery);

	if($sql)
		echo json_encode($data);
	else
		echo 0;

?>
