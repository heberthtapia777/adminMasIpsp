<?PHP
  include '../../inc/sessionControl.php';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Tapia">
    <meta name="keyword" content="">

    <title>ADMINISTRADOR - CMS</title>

    <!-- Bootstrap core CSS -->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/bootstrap-datetimepicker.min.css">
    <!--external css-->
    <link rel="stylesheet" type="text/css" href="../../assets/font-awesome/css/all.css">

    <!-- Custom styles for this template -->
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="../../assets/css/style-responsive.css" rel="stylesheet">
    <link href="../../assets/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../../assets/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="../../assets/css/square/blue.css" rel="stylesheet">
    <link href="../../assets/css/theme-default.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../../assets/js/gritter/css/jquery.gritter.css" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- blueimp Gallery styles -->
    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="../../assets/css/jquery.fileupload.css">
    <link rel="stylesheet" href="../../assets/css/jquery.fileupload-ui.css">
    <!-- lightbox -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/lightbox.css">
    <!-- my style -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/myStyle.css">
</head>

<body>


  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>ADMINISTRADOR - CMS</b></a>
            <!--logo end-->

            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="../../inc/outSession.php">Cerrar Session</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <?PHP
        include '../../inc/mainMenu.php';
      ?>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
            <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Control de Asistencia</h3>

            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Asistencia</h4>
                         <form id="buscar" name="buscar" class="form-inline" role="form" action="javascript:buscaMilitante()" >
                        <div class=""><br>
                            <label class="form-inline">
                                Seleccíone un Evento:
                                <?php
                                    $sqle = "SELECT * FROM evento";
                                    $str = $db->execute($sqle);
                                ?>
                                <select name="evento" id="evento" class="form-control input-sm" data-validation="required" >
                                    <option value="" selected="">Seleccíone</option>
                                    <?php
                                    while($reg = $str->FetchRow()){
                                    ?>
                                    <option value="<?=$reg['idEvento'];?>"><?=$reg['name'];?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </label>
                        </div>
                        <br><br>


                            <div class="form-group">
                                <label for="nro">Nro. Documento: </label>
                                <input type="password" autocomplete="off" id="nro" name="nro" class="form-control " >
                            </div>
                            <button type="submit" class="btn btn-theme">Buscar</button>

                        </form>

                          <div class="row mt">
                              <div class="col-lg-12">
                                <div class="content-panel">
                                  <!-- <h4><i class="fa fa-angle-right"></i> Responsive Table</h4> -->
                                  <div class="clearfix"></div>
                                  <br>
                                  <section id="unseen">
                                    <table id="tablaList" class="table table-bordered table-striped table-condensed">
                                      <thead>
                                      <tr>
                                          <th>Nº</th>
                                          <th>Apellido Paterno</th>
                                          <th>Apellido Materno</th>
                                          <th>Nombre</th>
                                          <th>CI</th>
                                          <th>Cargo</th>
                                          <th>Asistencia</th>
                                          <th>Acciones</th>
                                      </tr>
                                      </thead>
                                      <tbody>

                                      </tbody>
                                    </table>
                                  </section>
                                </div><!-- /content-panel -->
                              </div><!-- /col-lg-4 -->
                            </div><!-- /row -->
                      </form>
                  </div>
                </div><!-- col-lg-12-->
            </div><!-- /row -->

        </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
               © 2019
              <a href="responsive_table.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="../../assets/js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.scrollTo.min.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.nicescroll.js"></script>
    <!--common script for all pages-->
    <script src="../../assets/js/common-scripts.js"></script>
    <!--script for this page-->
    <script type="text/javascript" src="../../assets/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../../assets/js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="../../assets/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="../../assets/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../../assets/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="../../assets/js/jszip.min.js"></script>
    <script type="text/javascript" src="../../assets/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="../../assets/js/vfs_fonts.js"></script>


    <script type="text/javascript" src="../../assets/js/jquery.json-2.3.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.form-validator.js"></script>

    <!--DatePicker-->
    <script type="text/javascript" src="../../assets/js/es-ES.js"></script>
    <script type="text/javascript" src="../../assets/js/moment.js"></script>
    <script type="text/javascript" src="../../assets/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="../../assets/js/es.js"></script>
    <!--icheck-->
    <script type="text/javascript" src="../../assets/js/icheck.js"></script>

    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script type="text/javascript" src="../../assets/js/vendor/jquery.ui.widget.js"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
    <!-- blueimp Gallery script -->
    <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
    <!-- The basic File Upload plugin -->
    <script type="text/javascript" src="../../assets/js/jquery.fileupload.js"></script>
    <!-- The File Upload processing plugin -->
    <script type="text/javascript" src="../../assets/js/jquery.fileupload-process.js"></script>
    <!-- The File Upload image preview & resize plugin -->
    <script type="text/javascript" src="../../assets/js/jquery.fileupload-image.js"></script>
    <!-- The File Upload validation plugin -->
    <script type="text/javascript" src="../../assets/js/jquery.fileupload-validate.js"></script>
    <!-- The File Upload user interface plugin -->
    <script type="text/javascript" src="../../assets/js/jquery.fileupload-ui.js"></script>
    <!-- The main application script -->
    <!-- <script type="text/javascript" src="../../assets/js/main.js"></script> -->
    <!-- lightbox -->
    <script type="text/javascript" src="../../assets/js/lightbox.js"></script>

    <script src="../../assets/js/bootstrap-checkbox.js" type="text/javascript" ></script>

    <!--script for this page-->
    <script type="text/javascript" src="../../assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="../../assets/js/gritter-conf.js"></script>

    <script type="text/javascript" src="../../assets/js/myJavaScript.js"></script>




<script>
    $(document).ready(function() {
        $('#tablaList').DataTable({
            "paging":   false,
            "ordering": false,
            "info":     false,
            "bFilter": false
        });

        $.validate({
            lang: 'es',
            modules : 'security'
        });

        $('#nro').focus();

  });


  $('div#sidebar').find('a#qr').addClass('active');

    // Attach an event for when the user submits the form
   function buscaMilitante() {

        // Set the text-output span to the value of the first input
        var input = $('form').find('input').val();
        cadena = input.split(" ");
        num = cadena.length;

        num--;

        fila = '<input id="asis" type="checkbox" data-reverse>';
        icon = '<a href="#" class="delete"><i class="far fa-trash-alt"></i></a>'

        $.ajax({
            url: '../../inc/searchMilitante.php',
            type: 'post',
            dataType: "json",
            cache: false,
            data: 'id='+cadena[num],
            success: function(data){

                var filaEmpy = $("#tablaList tbody tr td.dataTables_empty").length;
                var nFilas = $("#tablaList tbody tr").length;

                var nFila = nFilas-filaEmpy;

                if (data.ci != null && nFila < 1) {

                    var t = $('#tablaList').DataTable();
                    var counter = 1;

                    t.row.add( [
                        counter,
                        data.paterno,
                        data.materno,
                        data.name,
                        data.ci,
                        data.cargo,
                        fila,
                        icon
                    ] ).draw( false );

                    counter++;
                    $('#nro').val('');
                    $('#asis').checkboxpicker();
                    $('#asis').on('change', function() {
                        saveAsis(data.ci);
                        $('#nro').focus();
                    });
                }else{
                    $('#nro').val('');
                    $('#nro').focus();
                }
            }


        });
        t = '';
    }

    function saveAsis(ci){
        var dato = JSON.stringify( $('#buscar').serializeObject() );
        var table = $('#tablaList').DataTable();

        $.ajax({
            url: 'save.php',
            type: 'post',
            dataType: 'json',
            async:true,
            data:{res:dato, id:ci},
            success: function(data){
                table
                  .row( 'tbody tr' )
                  .remove()
                  .draw();
                if (data) {
                    mensage(1);
                }else{
                    mensage(0);
                }
            }
        });
    }

    $('#tablaList tbody').on( 'click', 'a.delete', function () {

        var table = $('#tablaList').DataTable();

        table
            .row( $(this).parents('tr') )
            .remove()
            .draw();
    } );

    function mensage(sw) {
        if (sw == 1) {
            var unique_id = $.gritter.add({
                // (string | mandatory) the heading of the notification
                title: '¡Lectura Correcta!',
                // (string | mandatory) the text inside the notification
                text: 'Se Marco Correctamente la Asistencia.',
                // (string | optional) the image to display on the left
                //image: '../../assets/img/ui-sam.jpg',
                // (bool | optional) if you want it to fade out on its own or just sit there
                sticky: false,
                // (int | optional) the time you want it to be alive for before fading out
                time: '3000',
                //fade_in_speed: 'medium',
                //fade_out_speed: 2000,
                // (string | optional) the class name you want to apply to that specific message
                class_name: 'my-sticky-class'
            });
            return false;
        }else{
            var unique_id = $.gritter.add({
                // (string | mandatory) the heading of the notification
                title: '¡Error en la Lectura!',
                // (string | mandatory) the text inside the notification
                text: 'El Militante ya registro su Asistencia.',
                // (string | optional) the image to display on the left
                //image: '../../assets/img/ui-sam.jpg',
                // (bool | optional) if you want it to fade out on its own or just sit there
                sticky: false,
                // (int | optional) the time you want it to be alive for before fading out
                time: '3000',
                //fade_in_speed: 'medium',
                //fade_out_speed: 2000,
                // (string | optional) the class name you want to apply to that specific message
                class_name: 'gritter-light'
            });
            return false;
        }
    }

</script>


  </body>
</html>

