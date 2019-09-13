<?php
include '../../inc/sessionControl.php';

$id =  $_POST['id'];

?>


<script type="text/javascript" language="javascript" class="init">

    $(document).ready(function() {
         $('#tablaList').DataTable({
        dom: 'Bfrtip',
       buttons: [
            {
                extend: 'excelHtml5',
                title: 'Lista de Asistentes'
            },
            {
                extend: 'pdfHtml5',
                title: 'Lista de Asistentes'
            }
        ],
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

    });

    $.validate({
        lang: 'es',
        modules : 'security'
    });

</script>

        <div class="clearfix"></div>
        <br>
        <table id="tablaList" class="table table-bordered table-striped table-condensed" width="100%">
                  <thead>
                  <tr>
                      <th>Nº</th>
                      <th>Fecha</th>
                      <th>Ap. Paterno</th>
                      <th>Ap. Materno</th>
                      <th>Nombres</th>
                      <th>C.I.</th>
                      <th>Celular</th>
                      <th>Instuticion</th>
                      <th>Cargo</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?PHP
                    $sql = "SELECT * ";
                    $sql.= "FROM readQR AS q, evento AS e, militante AS m ";
                    $sql.= "WHERE m.ci = q.idMilitante ";
                    $sql.= "AND e.idEvento = q.idEvento ";
                    $sql.= "AND e.idEvento = $id ";
                    $sql.= "ORDER BY (q.idReadqr) DESC ";

                    $cont = 1;

                    $srtQuery = $db->Execute($sql);
                    if($srtQuery === false)
                        die("failed");

                    while( $row = $srtQuery->FetchRow()){
                  ?>
                      <tr id="tb<?=$row[0]?>">
                          <td align="center"><?=$cont++;?></td>
                          <td><?=$row['dateTime']?></td>
                          <td><?=utf8_encode($row['paterno'])?></td>
                          <td><?=utf8_encode($row['materno'])?></td>
                          <td><?=utf8_encode($row['nombres'])?></td>
                          <td><?=$row['ci']?></td>
                          <td><?=$row['celular1']?></td>
                          <td width="10%"><?=$row['institucion_min_trabajo']?></td>
                          <td><?=$row['cargo']?></td>
                      </tr>
                      <?PHP
                  }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                      <th>Nº</th>
                      <th>Fecha</th>
                      <th>Ap. Paterno</th>
                      <th>Ap. Materno</th>
                      <th>Nombres</th>
                      <th>C.I.</th>
                      <th>Celular</th>
                      <th>Instuticion</th>
                      <th>Cargo</th>
                  </tr>
                  </tfoot>
                </table>
