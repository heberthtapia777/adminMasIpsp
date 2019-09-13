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
      <th style="text-align: center">Nº</th>
      <th style="text-align: center">Apellido Paterno</th>
      <th style="text-align: center">Apellido Materno</th>
      <th style="text-align: center">Nombre</th>
      <th style="text-align: center">Nombre<br/>Corto</th>
      <th style="text-align: center">Cedula<br/>Identidad</th>
      <!-- <th style="text-align: center">Fecha Nacimiento</th> -->
      <!--<th style="text-align: center">Edad</th>
      <th style="text-align: center">Edad Tipo</th>-->
      <th style="text-align: center">Cargo</th>
      <th style="text-align: center">Acciones</th>
  </tr>
  </thead>
  <tbody>
  <?PHP
  $sql = "SELECT * FROM militante ORDER BY id DESC ";

  $cont = 1;

  $srtQuery = $db->Execute($sql);
  if($srtQuery === false)
      die("failed");

  while( $row = $srtQuery->FetchRow()){

      ?>
      <tr id="tb<?=$row[0]?>">
          <td align="center"><?=$cont++;?></td>
          <!-- <td align="center"><?=$row['id'];?></td> -->
          <td align="center"><?=utf8_encode($row['paterno']);?></td>
          <td align="center"><?=utf8_encode($row['materno']);?></td>
          <td align="center"><?=utf8_encode($row['nombres']);?></td>
          <td align="center"><?=utf8_encode($row['nom_corto']);?></td>
          <td align="center"><?=$row['ci'];?></td>
          <!-- <td align="center"><?=$row['fecha_nacimiento'];?></td> -->
          <!--<td align="center"><?=$row['edad_tipo'];?></td>-->
          <td align="center"><?=utf8_encode($row['cargo']);?></td>
          <td width="14%">
              <div style="margin-bottom: 5px" >
                  <a class="btn btn-primary" href="credencial.php?name=<?=utf8_encode($row['nombres']).' '.utf8_encode($row['paterno']).' '.utf8_encode($row['materno']);?>&ci=<?=$row['ci']?>&ca=<?=utf8_encode($row['cargo'])?>" target="_blank" role="button">Ver Credencial 1</a>
              </div>
              <div style="margin-bottom: 5px" >
                  <a class="btn btn-info" href="credencial1.php?name=<?=utf8_encode($row['nombres']).' '.utf8_encode($row['paterno']).' '.utf8_encode($row['materno']);?>&ci=<?=$row['ci']?>&ca=<?=utf8_encode($row['cargo'])?>" target="_blank" role="button">Ver Credencial 2</a>
              </div>

              <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                  data-target="#dataUpdate"
                      data-id     ="<?=$row['id']?>"
                      data-name     ="<?=utf8_encode($row['nombres'])?>"
                      data-namec    ="<?=utf8_encode($row['nom_corto'])?>"
                      data-paterno  ="<?=utf8_encode($row['paterno'])?>"
                      data-materno  ="<?=utf8_encode($row['materno'])?>"
                      data-cargo    ="<?=utf8_encode($row['cargo'])?>"
                      data-ci ="<?=$row['ci']?>"
                  >
                    <i class='fa fa-pencil-square-o '></i>
                    <span>Editar</span>
                  </button>
              </div>
          </td>
      </tr>
      <?PHP
  }
  ?>
  </tbody>
  <tfoot>
  <tr>
      <th>ID</th>
      <th>Apellido Paterno</th>
      <th>Apellido Materno</th>
      <th>Nombre</th>
      <th>Nombre<br/>Corto</th>
      <th>CI</th>
      <!-- <th>Fecha Nacimiento</th> -->
      <!--<th>Edad</th>
      <th>Edad Tipo</th>-->
      <th>Cargo</th>
      <th>Acciones</th>
  </tr>
  </tfoot>
</table>
