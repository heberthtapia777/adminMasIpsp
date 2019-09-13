<?PHP
	session_start();

	include '../../adodb5/adodb.inc.php';
	include '../../inc/function.php';

	$db = NewADOConnection('mysqli');

	$db->Connect();

	$op = new cnFunction();

	$fecha = $op->ToDay();
	$hora = $op->Time();

	$data = stripslashes($_POST['res']);

	$data = json_decode($data);

	$strQuery = "UPDATE sucursal SET dateReg = '".$fecha." ".$hora."', ";
	$strQuery.= "nameSuc = '".$data->name."', address = '".$data->address."', status = 'Activo' ";
	$strQuery.= "WHERE id_sucursal = '".$data->idSuc."' ";

	$sql = $db->Execute($strQuery);

	if($sql)
		echo json_encode($data);
	else
		echo 0;

?>