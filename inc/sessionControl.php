<?php
session_start();
    include "../../inc/conexion.php";
    include '../../inc/function.php';

  $op = new cnFunction();

  if( !isset($_SESSION['idEmp']) ) {
        session_destroy();
        header("Location: ../../index.php");
  }

?>
