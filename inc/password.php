<?PHP
	ini_set("session.use_trans_sid","0");
	ini_set("session.use_only_cookies","1");
	ini_set("register_long_array","on");

	session_start();
	date_default_timezone_set("America/La_Paz" ) ;
	session_set_cookie_params(0,"/",$_SERVER["HTTP_HOST"],0);

	include "conexion.php";

	$data = stripslashes($_POST['res']);
	$data = json_decode($data);



	$sql = 'SELECT * ';
	$sql.= 'FROM empleado AS e, usuario AS u ';
	$sql.= 'WHERE e.login LIKE "'.$data->username.'" AND e.pass LIKE "'.md5($data->password).'" ';


	$strSql = $db->Execute($sql);
	$reg = $strSql->FetchRow();
	$num = $strSql->RecordCount();

	$_SESSION['idEmp']	= $reg['idEmpleado'];
	//$_SESSION['cargo']	= $reg['cargo'];
	$_SESSION['tiempo'] = time();

	//$data->cargo = $reg['cargo'];

	if($num == 1){
		/*$strQuery = 'UPDATE usuario SET status = "Activo", dateReg = "'.date("Y-n-j H:i:s").'" WHERE id_usuario = "'.$reg['id_usuario'].'"';
		$str = $db->Execute($strQuery);
		$_SESSION["idUser"] = $reg['id_usuario'];
		$_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s");*/
		echo json_encode($data);
	}else{
		//$_SESSION["idUser"] = NULL;
		echo 0;
	}

?>
