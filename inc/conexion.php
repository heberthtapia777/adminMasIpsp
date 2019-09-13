<?php
	//echo ('dsfsd sdf');
	ob_start();
    include(dirname(__FILE__).'/../adodb5/adodb.inc.php');


	$pwd   = urlencode('mysql');
	$flags =  MYSQL_CLIENT_COMPRESS;
	$dsn   = "mysqli://root:$pwd@localhost/bd_masipsp?persist&clientflags=$flags";
	$db    = ADONewConnection($dsn);  # no need for PConnect()
	if (!$db) die("Conexion incorrecta");

	/*$pwd   = urlencode('ebBDq7)@GmlO');
	$flags =  MYSQL_CLIENT_COMPRESS;
	$dsn   = "mysqli://masipsp:$pwd@localhost/bd_masipsp?persist&clientflags=$flags";
	$db    = ADONewConnection($dsn);  # no need for PConnect()
	if (!$db) die("Conexion incorrecta");*/
?>
