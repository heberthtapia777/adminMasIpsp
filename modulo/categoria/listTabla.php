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

    $('input.statusCat , #checksEmail, #checksEmailU').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        //increaseArea: '100%' // optional
      });

    $('input.statusCat').on('ifChecked', function(event){
        id = $(this).attr('id');
        statusCat(id, 'Activo');
    });
    $('input.statusCat').on('ifUnchecked',function(event){
        id = $(this).attr('id');
        statusCat(id, 'Inactivo');
    });
  });

  $('#obser').restrictLength( $('#max-length-element') );

  $('div#sidebar').find('a#categoria').addClass('active');
</script>
<table id="tablaList" class="table table-bordered table-striped table-condensed" width="100%">
                  <thead>
                  <tr>
                      <th>Nº</th>
                      <th>Fecha</th>
                      <th>Foto</th>
                      <th>Nombre Categoria</th>
                      <th>Detalle</th>
                      <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?PHP
                    $sql = "SELECT * ";
                    $sql.= "FROM categoria ";

                    $cont = 1;

                    $srtQuery = $db->Execute($sql);
                    if($srtQuery === false)
                        die("failed");

                    while( $row = $srtQuery->FetchRow()){
                  ?>
                      <tr id="tb<?=$row[0]?>">
                          <td align="center"><?=$cont++;?></td>
                          <td><?=$row['dateReg']?></td>
                          <td align="center" width="10%">
                              <?PHP
                              if( $row['foto'] != '' )
                              {
                                  ?>
                                  <a href="../../modulo/categoria/uploads/files/<?=($row['foto']);?>" title="<?=($row['foto']);?>" download="<?=($row['foto']);?>" data-lightbox="lightbox-admin" data-title="Optional caption.">
                                  <img class="thumb" src="../../thumb/phpThumb.php?src=../modulo/categoria/uploads/files/<?=($row['foto']);?>&amp;w=120&amp;h=80&amp;far=1&amp;bg=FFFFFF&amp;hash=361c2f150d825e79283a1dcc44502a76" alt="">
                                  </a>
                                  <?PHP
                              }
                              else{
                                  ?>
                                  <img class="thumb" src="../../thumb/phpThumb.php?src=../modulo/categoria/uploads/sin_imagen.jpg&amp;w=120&amp;h=80&amp;far=1&amp;bg=FFFFFF&amp;hash=361c2f150d825e79283a1dcc44502a76" alt="">
                                  <?PHP
                              }
                              ?>
                          </td>
                          <td><?=$row['name'];?></td>
                          <td><?=$row['description'];?></td>
                          <td width="15%">
                              <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dataUpdate"
                                        data-idCat="<?=$row['id_categoria']?>"
                                        data-foto="<?=$row['foto']?>"
                                        data-name="<?=$row['name']?>"
                                        data-detail="<?=$row['description']?>"
                                        data-size="<?=$row['size']?>"
                                    >
                                    <i class='fa fa-pencil-square-o '></i>
                                        <span>Editar</span>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDelete" data-id="<?=$row['id_categoria']?>"><i class='glyphicon glyphicon-trash'></i> Eliminar
                                    </button>
                              </div>
                              <div style="margin-top: 5px">
                                  <div class="checkbox" id="status<?=$row['id_categoria']?>">
                                          <?PHP
                                          if( $row['status'] == 'Activo' ){
                                          ?>
                                              <input type="checkbox" class="statusCat" name="checks" checked id="<?=$row['id_categoria']?>"/>
                                              <label>Status</label>
                                          <?PHP
                                          }else{
                                          ?>
                                              <input type="checkbox" class="statusCat" name="checks" id="<?=$row['id_categoria']?>"/>
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
                      <th>Foto</th>
                      <th>Nombre Categoria</th>
                      <th>Detalle</th>
                      <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>