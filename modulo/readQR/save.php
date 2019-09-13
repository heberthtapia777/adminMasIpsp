<?PHP
	include '../../inc/sessionControl.php';

	$fecha = $op->ToDay();
	$hora = $op->Time();

	$data = stripslashes($_POST['res']);

	$id = stripslashes($_POST['id']);

	$data = json_decode($data);

	$query = "SELECT * FROM readQR WHERE idMilitante = $id AND idEvento = $data->evento";
	$str = $db->Execute($query);

	$record = $str->recordCount();

	if ( $record <= 0) {

		$strQuery = "INSERT INTO readQR (idEvento, idMilitante, dateTime ) ";
		$strQuery.= "VALUES (".$data->evento.", '".$id."', '".$fecha." ".$hora."' )";

		$sql = $db->Execute($strQuery);
	}

	if($sql)
		echo json_encode($data);
	else
		echo 0;
?>
