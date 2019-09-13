<?PHP
	include '../../inc/sessionControl.php';


	// $fecha = $op->ToDay();
	// $hora = $op->Time();

	$data = stripslashes($_POST['res']);

	$data = json_decode($data);

	//$cargo = $op->toCargo($data->cargo);

	$strQuery = "update militante set  ";
	$strQuery .= "paterno = upper('".$data->paterno."'), ";
	$strQuery .= "materno = upper('".$data->materno."'), ";
	$strQuery .= "nombres = upper('".$data->name."'), ";
	$strQuery .= "nom_corto = upper('".$data->namec."'), ";
	$strQuery .= "ci = '".$data->ci."', ";
	$strQuery .= "cargo = upper('".$data->cargo."') ";
	$strQuery .= "where id = ".$data->id."; ";

	$sql = $db->Execute($strQuery);

	if($sql)
		echo json_encode($data);
	else
		echo 0;
?>

