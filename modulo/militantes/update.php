<?PHP
	include '../../inc/sessionControl.php';


	// $fecha = $op->ToDay();
	// $hora = $op->Time();

	$data = stripslashes($_POST['res']);

	$data = json_decode($data);

	//$cargo = $op->toCargo($data->cargo);

	$strQuery = "update militante set  ";
	$strQuery .= "paterno = '".$data->paterno."', ";
	$strQuery .= "materno = '".$data->materno."', ";
	$strQuery .= "nombres = '".$data->name."', ";
	$strQuery .= "nom_corto = '".$data->namec."', ";
	$strQuery .= "ci = '".$data->ci."', ";
	$strQuery .= "cargo = '".$data->cargo."' ";
	$strQuery .= "where id = ".$data->id."; ";

	$sql = $db->Execute($strQuery);

	if($sql)
		echo json_encode($data);
	else
		echo 0;
?>

