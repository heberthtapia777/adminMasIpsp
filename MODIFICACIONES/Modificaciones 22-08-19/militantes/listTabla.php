<?php
include '../../inc/sessionControl.php';
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

        $('input.repuesto, input:radio').iCheck({
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

        $('input.repuesto:checkbox').on('ifChecked', function(event){
            id = $(this).attr('id');
            statusRep(id, 'Activo');
        });
        $('input.repuesto:checkbox').on('ifUnchecked',function(event){
            id = $(this).attr('id');
            statusRep(id, 'Inactivo');
        });

        $.validate({
          lang: 'es',
          modules : 'security'
        });
      });

      $('#obser').restrictLength( $('#max-length-element') );

      $('div#sidebar').find('a#repuesto').addClass('active');
    </script>
<table id="tablaList" class="table table-bordered table-striped table-condensed" width="100%">
                  <thead>
                  <tr>
                      <th>Nº</th>
                      <th>Apellido Paterno</th>
                      <th>Apellido Materno</th>
                      <th>Nombre</th>
                      <th>CI</th>
                      <th>Fecha Nacimiento</th>
                      <th>Edad</th>
                      <th>Edad Tipo</th>
                      <th>Cargo</th>
                      <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?PHP
                  $sql   = "SELECT *";
                  $sql  .= "FROM militante ORDER BY id DESC";

                  $cont = 1;

                  $srtQuery = $db->Execute($sql);
                  if($srtQuery === false)
                      die("failed");

                  while( $row = $srtQuery->FetchRow()){

                      ?>
                      <tr id="tb<?=$row[0]?>">
                          <td align="center"><?=$cont++;?></td>
                          <td align="center"><?=utf8_encode($row['paterno']);?></td>
                          <td align="center"><?=$row['materno'];?></td>
                          <td align="center"><?=$row['nombres'];?></td>
                          <td align="center"><?=$row['ci'];?></td>
                          <td align="center"><?=$row['fecha_nacimiento'];?></td>
                          <td align="center"><?=$row['edad'];?></td>
                          <td align="center"><?=$row['edad_tipo'];?></td>
                          <td align="center"><?=$row['cargo'];?></td>
                          <td width="14%">
                              <div class="btn-group" style="width: 171px">
                                  <a class="btn btn-primary" href="credencial.php?name=<?=utf8_encode($row['nombres']).' '.utf8_encode($row['paterno']).' '.utf8_encode($row['materno']);?>&ci=<?=$row['ci']?>&ca=<?=$row['cargo']?>" target="_blank" role="button">Ver Credencial</a>
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
                      <th>Apellido Paterno</th>
                      <th>Apellido Materno</th>
                      <th>Nombre</th>
                      <th>CI</th>
                      <th>Fecha Nacimiento</th>
                      <th>Edad</th>
                      <th>Edad Tipo</th>
                      <th>Cargo</th>
                      <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
