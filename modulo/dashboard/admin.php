<?PHP
  include '../../inc/sessionControl.php';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Heberth Tapia">
    <meta name="keyword" content="">
    <meta http-equiv="content-Type" content="text/html" charset="iso-8859-1" />
<meta http-equiv="content-type" content="Mime-Type" charset="iso-8859-1" />

    <title>ADMINISTRADOR - CMS</title>

    <!-- Bootstrap core CSS -->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link rel="stylesheet" type="text/css" href="../../assets/font-awesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="../../assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="../../assets/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="../../assets/css/style-responsive.css" rel="stylesheet">

    <script src="../../assets/js/chart-master/Chart.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="../../https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
            <a href="../../index.html" class="logo"><b>ADMINISTRADOR - CMS</b></a>
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
            <div class="row">
                <div class="col-lg-9 main-chart">
                    <div class="border-head">
                       <h2>EVENTOS</h2>
                    </div>
                    <div class="row mt">
                    <!-- SERVER STATUS PANELS -->
                    <?php
                        $sql = "SELECT e.name, COUNT(q.idMilitante) AS total ";
                        $sql.= "FROM evento AS e, readQR AS q ";
                        $sql.= "WHERE e.idEvento = q.idEvento GROUP BY (q.idEvento) ORDER BY (e.idEvento) DESC";

                        $cont = 1;

                        $srtQuery = $db->Execute($sql);
                        if($srtQuery === false)
                            die("failed");

                        while( $row = $srtQuery->FetchRow()){
                    ?>
                        <div class="col-md-4 col-sm-4 mb">
                            <div class="darkblue-panel pn">
                                <div class="darkblue-header">
                                    <h2><?=$row['name']?></h2>
                                </div>
                                    <h1 class="mt"><i class="far fa-calendar-alt fa-2x"></i></h1>

                                    <h3>ASISTENTES</h3>
                                <footer>
                                    <div class="centered">
                                        <h4><?=$row['total'];?></h4>
                                    </div>
                                </footer>
                            </div><! -- /darkblue panel -->
                        </div><!-- /col-md-4 -->
                    <?php
                        }
                    ?>

                    </div><!-- /row -->

                </div><!-- /col-lg-9 END SECTION MIDDLE -->




      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->

                  <div class="col-lg-3 ds">

                        <!-- CALENDAR-->
                        <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 22%; margin-top: -100px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><!-- / calendar -->

                </div><!-- /col-lg-3 -->
              </div><! --/row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
               © 2019
              <a href="../../index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery-1.10.2.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../../assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="../../assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="../../assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script type="text/javascript" src="../../assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="../../assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="../../assets/js/sparkline-chart.js"></script>
	<script src="../../assets/js/zabuto_calendar.js"></script>

	<script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: '¡Bienvenido al Administrador!',
            // (string | mandatory) the text inside the notification
            text: 'Coloquese en el botón para Cerrar. Puede ocultar la barra lateral izquierda haciendo clic en el botón junto al logotipo.',
            // (string | optional) the image to display on the left
            image: '../../assets/img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
	</script>

	<script type="application/javascript">

        var eventData = [
            {
              "date":"2017-08-14",
              "badge":true,
              "title":"Tonight",
              "body":"<p class=\"lead\">Party<\/p><p>Like it's 1999.<\/p>",
              "footer":"At Paisley Park",
              "classname":"purple-event"
            },
            {"date":"2017-08-07","badge":true,"title":"Example 1"},
            {"date":"2017-08-25","badge":true,"title":"Example 2"}
        ];

        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });

            $("#my-calendar").zabuto_calendar({
                cell_border: false,
                today: true,
                show_days: true,
                weekstartson: 0,
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });

        });

        function myDateFunction(id, fromModal) {
          $("#date-popover").hide();
          if (fromModal) {
              $("#" + id + "_modal").modal("hide");
          }
          var date = $("#" + id).data("date");
          var hasEvent = $("#" + id).data("hasEvent");
          if (hasEvent && !fromModal) {
              return false;
          }
          $("#date-popover-content").html('You clicked on date ' + date);
          $("#date-popover").show();
          return true;
        }

        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }

        $('div#sidebar').find('a#admin').addClass('active');

    </script>


  </body>
</html>
