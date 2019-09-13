<?PHP
	session_start();

	include '../../adodb5/adodb.inc.php';
	include '../../inc/function.php';

	$db = NewADOConnection('mysqli');
	//$db->debug = true;
	$db->Connect();

	$op = new cnFunction();

	$fecha = $op->ToDay();
	$hora = $op->Time();

	$data = stripslashes($_POST['res']);

	$data = json_decode($data);

	$strQuery = "INSERT INTO categoria ( name, description, dateReg, status ) ";
	$strQuery.= "VALUES ( '".$data->name."', '".$data->detail."', '".$data->date."', 'Activo' )";

	$sql = $db->Execute($strQuery);

	$lastId = $db->insert_Id();

	/*********************ACTUALIZA FOTO Y ENVIANDO DATOS POR EMAIL*******************************/

	$data->img = '';

	$strQuery = "SELECT * FROM auxImg ";

	$srtQ = $db->Execute($strQuery);

	$row = $srtQ->FetchRow();

	if ($row[0]!=''){
		$name = $row['name'];
		$size = $row['size'];

		$strQuery = "UPDATE categoria set foto = '".$name."', size = '".$size."' ";
		$strQuery.= "WHERE id_categoria = ".$lastId." ";

		$strQ = $db->Execute($strQuery);
		$data->img = $name;
	}
	if($data->checksEmail == 'on'){
		//echo 'entra......';
		//include '../../classes/envioData.php';
	}
	//print_r($data);
	/***************************************************************************/

	$sql = "TRUNCATE TABLE auxImg";
	$strQ = $db->Execute($sql);

	if($sql)
		echo json_encode($data);
	else
		echo 0;
?>