<?PHP
  include 'conexion.php';

  $id = $_REQUEST['id'];

  $data = new stdClass();

  $sql = "SELECT * FROM militante WHERE ci = '$id' ";

  $str = $db->Execute($sql);

  $row = $str->FetchRow();

	$data->name    = utf8_encode($row['nombres']);
	$data->paterno = utf8_encode($row['paterno']);
	$data->materno = utf8_encode($row['materno']);
	$data->ci      = $row['ci'];
	$data->cargo   = utf8_encode($row['cargo']);

  echo json_encode($data);

?>
