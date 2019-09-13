<?php
/*
 * jQuery File Upload Plugin PHP Example
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * https://opensource.org/licenses/MIT
 */

include '../../../adodb5/adodb.inc.php';
$db = NewADOConnection('mysqli');

$db->Connect();

$file = $_REQUEST['file'];

if ($file) {
	# code...
	$strQuery = "UPDATE empleado SET foto ='', size = '' ";
	$strQuery.= "WHERE foto = '".$file."' ";

	$reg = $db->Execute($strQuery);
}

error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');
$upload_handler = new UploadHandler();
