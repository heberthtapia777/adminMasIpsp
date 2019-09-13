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

	/* ACTUALIZACION DE CATEGORIA */

	$strQuery = "UPDATE categoria SET name = '".$data->name."', description = '".$data->detail."', dateReg = '".$data->date."', status = 'Activo' ";
	$strQuery.= "WHERE id_categoria = '".$data->idCat."' ";

	$sql = $db->Execute($strQuery);

	/*********************ACTUALIZA FOTO Y ENVIANDO DATOS POR EMAIL*******************************/

	$strQuery = "SELECT * FROM auxImg ";

	$srtQ = $db->Execute($strQuery);

	$row = $srtQ->FetchRow();

	if ($row[0]!=''){
		$name = $row['name'];
		$size = $row['size'];

		$strQuery = "UPDATE categoria set foto = '".$name."', size = '".$size."' ";
		$strQuery.= "WHERE id_categoria = ".$data->idCat." ";

		$strQ = $db->Execute($strQuery);
	}

	/***************************************************************************/

	$sql = "TRUNCATE TABLE auxImg ";
	$strQ = $db->Execute($sql);

	if($sql)
		echo json_encode($data);
	else
		echo 0;
?>