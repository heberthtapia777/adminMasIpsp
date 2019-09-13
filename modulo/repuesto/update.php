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

	$strQuery = "UPDATE repuesto SET dateReg = '".$fecha." ".$hora."', ";
	$strQuery.= "numParte = '".$data->numParte."', name = '".$data->name."', fromRep = '".$data->fromRep."', ";
	$strQuery.= "priceSale = '".$data->priceSale."', priceBuy = '".$data->priceBuy."', detail='".$data->detail."', status = 'Activo' ";
	$strQuery.= "WHERE id_repuesto = '".$data->idResp."' ";

	$sql = $db->Execute($strQuery);

	$strQuery = "UPDATE almacen SET dateReg = '".$fecha." ".$hora."', ";
	$strQuery.= "id_sucursal = '".$data->radioRep."', cantidad = '".$data->cantidad."', status = 'Activo' ";
	$strQuery.= "WHERE id_repuesto = '".$data->idResp."' ";

	$sql = $db->Execute($strQuery);

	/*********************ACTUALIZA FOTO Y ENVIANDO DATOS POR EMAIL*******************************/

	//$data->img = '';

	$strQuery = "SELECT * FROM auxImg ";

	$srtQ = $db->Execute($strQuery);

	if ($srtQ){
		while($row = $srtQ->FetchRow()){
			$name = $row['name'];
			$size = $row['size'];

			$strQuery = "INSERT INTO foto ( id_repuesto, name, size, dateReg, status ) ";
			$strQuery.= "VALUES ( '".$data->idResp."', '".$name."', '".$size."', '".$data->date."', 'Activo' )";

			$strQ = $db->Execute($strQuery);
			//$data->img = $img;
		}
	}
	if($data->checksEmail == 'on'){
		//echo 'entra......';
		//include '../../classes/envioData.php';
	}
	//print_r($data);
	/***************************************************************************/

	$sql = "TRUNCATE TABLE auxImg ";
	$strQ = $db->Execute($sql);

	if($sql)
		echo json_encode($data);
	else
		echo 0;

?>