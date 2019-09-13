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
                    "searchable": true
                }
            ]
        });

        $.validate({
          lang: 'es',
          modules : 'security',
          modules : 'date'
        });
      });

      $('#obser').restrictLength( $('#max-length-element') );

      $('div#sidebar').find('a#repuesto').addClass('active');
    </script>
<table id="tablaList" class="table table-bordered table-striped table-condensed">
  <thead>
  <tr>
      <th>Nº</th>
      <th>Fecha</th>
      <th>Hora</th>
      <th>Nombre</th>
      <th>Lugar de Event</th>
      <th>Observaciones</th>
      <th>Estado</th>
      <th>Acciones</th>
  </tr>
  </thead>
  <tbody>
  <?PHP
    $sql = "SELECT * ";
    $sql.= "FROM evento ";
    $sql.= "ORDER BY (idEvento) DESC ";

    $cont = 1;

    $srtQuery = $db->Execute($sql);
    if($srtQuery === false)
        die("failed");

    while( $row = $srtQuery->FetchRow()){
        if ($row['status'] == 'Activo') {
            $label = '<span class="label label-success">'.$row['status'].'</span>';
        }elseif ($row['status'] == 'Terminado') {
            $label = '<span class="label label-warning">'.$row['status'].'</span>';
        }else{
            $label = '<span class="label label-danger">'.$row['status'].'</span>';
        }

        $time = explode(":", $row['time']);

        $time = $time[0].":".$time[1];
  ?>
      <tr id="tb<?=$row[0]?>">
          <td align="center"><?=$cont++;?></td>
          <td><?=$row['date']?></td>
          <td><?=$row['time']?></td>
          <td><?=$row['name'];?></td>
          <td><?=$row['site'];?></td>
          <td><?=$row['obser'];?></td>
          <td><?=$label;?></td>
          <td width="15%">
              <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dataUpdate"
                      data-date     ="<?=$row['date']?>"
                      data-time     ="<?=$time?>"
                      data-name     ="<?=$row['name']?>"
                      data-site     ="<?=$row['site']?>"
                      data-obser    ="<?=$row['obser']?>"
                      data-status   ="<?=$row['status']?>"
                      data-idevento ="<?=$row['idEvento']?>"
                  >
                    <i class='fa fa-pencil-square-o '></i>
                    <span>Modificar</span>
                  </button>
              </div>
              <div style="margin-top: 5px">
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDelete" data-id="<?=$row['idEvento']?>"  ><i class='glyphicon glyphicon-trash'></i> Eliminar
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
      <th>Nº</th>
      <th>Fecha</th>
      <th>Hora</th>
      <th>Nombre</th>
      <th>Lugar de Event</th>
      <th>Observaciones</th>
      <th>Estado</th>
      <th>Acciones</th>
  </tr>
  </tfoot>
</table>
