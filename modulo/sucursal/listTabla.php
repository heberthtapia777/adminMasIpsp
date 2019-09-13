<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 23/9/2016
 * Time: 16:25
 */
session_start();

include '../../adodb5/adodb.inc.php';
include '../../inc/function.php';

$db = NewADOConnection('mysqli');
//$db->debug = true;
$db->Connect();

$op = new cnFunction();
?>
<script>
  $(document).ready(function() {
    $('#tablaList').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ filas por pagina",
            "zeroRecords": "No se encontro nada - Lo siento",
            "info": "Mostrando _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Filtrada de _MAX_ registros en total)",
            "search":         "Buscar:",
            "paginate": {
                "first":      "Primero",
                "last":       "Ultimo",
                "next":       "Siguiente",
                "previous":   "Anterior"
            }
        },
        "columnDefs": [
            {
                "targets": [ 1 ],
                "visible": false,
                "searchable": true
            }
        ]
    });

    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      //increaseArea: '100%' // optional
    });

    $('input:radio').on('ifChecked', function(event){
        $('input:radio').validate();
    });
    $('input:radio').on('ifUnchecked',function(event){
       //
    });

    $('input:checkbox').on('ifChecked', function(event){
        id = $(this).attr('id');
        statusSuc(id, 'Activo');
    });
    $('input:checkbox').on('ifUnchecked',function(event){
        id = $(this).attr('id');
        statusSuc(id, 'Inactivo');
    });

    $.validate({
      lang: 'es',
      modules : 'security'
    });
  });

  $('#obser').restrictLength( $('#max-length-element') );

  $('div#sidebar').find('a#sucursal').addClass('active');
</script>
<table id="tablaList" class="table table-bordered table-striped table-condensed" width="100%">
  <thead>
  <tr>
      <th>Nº</th>
      <th>Fecha</th>
      <th>Nombre</th>
      <th>Dirección</th>
      <th>Acciones</th>
  </tr>
  </thead>
  <tbody>
  <?PHP
  $sql   = "SELECT * ";
  $sql  .= "FROM sucursal ";

  $cont = 1;

  $srtQuery = $db->Execute($sql);
  if($srtQuery === false)
      die("failed");

  while( $row = $srtQuery->FetchRow()){

      ?>
      <tr id="tb<?=$row[0]?>">
          <td align="center"><?=$cont++;?></td>
          <td align="center"><?=$row['dateReg']?></td>
          <td align="center"><?=$row['nameSuc'];?></td>
          <td align="center"><?=$row['address'];?></td>
          <td width="14%">
              <div class="btn-group" style="width: 171px">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dataUpdate"
                      data-idResp     =   "<?=$row['id_sucursal']?>"
                      data-name       =   "<?=$row['nameSuc']?>"
                      data-detail     =   "<?=$row['address']?>">
                      <i class='glyphicon glyphicon-edit'></i> Modificar
                  </button>

                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDelete" data-id="<?=$row['id_sucursal']?>"  >
                      <i class='glyphicon glyphicon-trash'></i> Eliminar
                  </button>
              </div>
              <div style="margin-top: 5px">
                  <div class="checkbox" id="status<?=$row['id_sucursal']?>">
                      <?PHP
                          if( $row['status'] == 'Activo' ){
                      ?>
                          <input type="checkbox" name="checks" checked id="<?=$row['id_sucursal']?>"/>
                          <label>Status</label>
                      <?PHP
                          }else{
                      ?>
                          <input type="checkbox" name="checks" id="<?=$row['id_sucursal']?>"/>
                          <label>Status</label>
                      <?PHP
                          }
                      ?>
                  </div>
              </div>
          </td>
      </tr>
      <?PHP
  }
  ?>
  </tbody>
  <tfoot>
    <tr>
        <th>Nº</th>
        <th>Fecha</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Acciones</th>
    </tr>
  </tfoot>
</table>