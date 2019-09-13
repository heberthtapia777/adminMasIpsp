<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>LOGIN - ADMINISTRADOR</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/myStyle.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>

  <style>
    .alert {
        border: 1px solid transparent;
        border-radius: 4px;
        margin-bottom: 0px;
        padding: 10px;
        font-size: 11px;
        margin-bottom: 5px;
    }

    #alert{
        display: none;
    }

    .form-control-feedback {
    	top: 0px;
   	}

  </style>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">

		      <form id="login" class="form-login" action="javascript:verifica('login','password.php');">
		        <h2 class="form-login-heading">login</h2>
		        <div class="login-wrap">
		        	<div class="form-group">
		            <input type="text" id="username" name="username" class="form-control" placeholder="User ID" data-validation="required" autofocus autocomplete="off">
		            </div>
		            <div class="form-group">
		            <input type="password" id="password" name="password" class="form-control" placeholder="Password" data-validation="required" autocomplete="off">
		            </div>
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Olvidó su contraseña?</a>

		                </span>
		            </label>
		            <div class="clearfix"></div>
                    <div id="alert" class="alert alert-danger col-xs-offset-1 col-xs-10 col-sm-10 col-md-10">
                        <strong>¡Error!</strong> Usuario o contrase&ntilde;a no validas.
                    </div>
		            <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> INGRESAR</button>
		            <!-- <hr> -->

		            <!-- <div class="login-social-link centered">
		            <p>or you can sign in via your social network</p>
		                <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
		                <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
		            </div>
		            <div class="registration">
		                Don't have an account yet?<br/>
		                <a class="" href="#">
		                    Create an account
		                </a>
		            </div> -->

		        </div>

		          <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Olvidó su contraseña ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Introduzca su dirección de correo electrónico a continuación para restablecer su contraseña.</p>
		                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="button"><Submit>Enviar</Submit></button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->

		      </form>

	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="assets/js/jquery.json-2.3.js"></script>
    <!-- <script type="text/javascript" src="assets/js/valida.2.1.6.js"></script> -->
    <script type="text/javascript" src="assets/js/jquery.form-validator.js"></script>
    <<script src="assets/js/myJavaScript.js" type="text/javascript" charset="utf-8" async defer></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});

        $(document).ready(function(){
        	$.validate({
	          lang: 'es',
	          modules : 'security, modules/logic'
	      	});
        })

    </script>


  </body>
</html>
