<?PHP
$sql = "TRUNCATE TABLE aux_img ";
$strQ = $db->Execute($sql);
$fecha = $op->ToDay();
$hora = $op->Time();

$sql ="SELECT * FROM categoria";
$query = $db->Execute($sql);

$sql ="SELECT * FROM sucursal";
$strQuery = $db->Execute($sql);
?>
<form id="formNew" action="javascript:saveForm('formNew','save.php')" class="form-horizontal" autocomplete="off" >
	<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">Nuevo Militante</h4>
				</div>
				<div class="modal-body">
					<div id="datos_ajax"></div>

					<div class="form-group">
						<label for="fecha" class="control-label col-md-2">Fecha:</label>
						<div class="col-md-4">
							<input id="fecha" name="fecha" type="text" class="form-control" value="<?=$fecha;?> <?=$hora;?>" disabled="disabled" />
						</div>
						<input id="date" name="date" type="hidden" value="<?=$fecha;?> <?=$hora;?>" />
						<input id="tabla" name="tabla" type="hidden" value="militante">
					</div>

					<div class="form-group">
						<label for="paterno" class="control-label col-md-2">Apellido Paterno:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="paterno" name="paterno" placeholder="Ap. Paterno"
								   data-validation="required"> <!--server-->
								   <!--data-validation-url="modulo/almacen/validateCode.php"-->
						</div>
					</div>
					<div class="form-group">
						<label for="materno" class="control-label col-md-2">Apellido Materno:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="materno" name="materno" placeholder="Ap. Materno" data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="control-label col-md-2">Nombres:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="Nombres" data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<label for="ci" class="control-label col-md-2">C.I.:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="ci" name="ci" placeholder="Nº de carnet de identidad" data-validation="required number">
						</div>
					</div>
					<div class="form-group">
						<label for="cargo" class="control-label col-md-2">Cargo:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="cargo" name="cargo" placeholder="Cargo" data-validation="required">
						</div>
					</div>

					<div class="row">

				</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal">
						<i class="fa fa-close" aria-hidden="true"></i>
						<span>Cancelar</span>
					</button>
					<button type="submit" id="save" class="btn btn-success">
						<i class="fa fa-check" aria-hidden="true"></i>
						<span>Agregar Militante</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</form>

<script>
	$('#dataRegister').on('hidden.bs.modal', function (e) {
		// do something...
		$('#formNew').get(0).reset();
		$('div.iradio_square-blue').removeClass('checked');
		//despliega('modulo/almacen/producto.php','contenido');
	});
	$(document).ready(function(){
		//UPLOAD FILES
		'use strict';
	    // Initialize the jQuery File Upload widget:
	    $('#formNew').fileupload({
	        // Uncomment the following to send cross-domain cookies:
	        //xhrFields: {withCredentials: true},
	        url: '../../modulo/repuesto/uploads/',
	        disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator && navigator.userAgent),
	        imageMaxWidth: 1200,
	        //imageMaxHeight: 800,
	        imageCrop: false, // Force cropped images
	        //maxFileSize: 999,
	        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
	        limitMultiFileUploads: 5,
            maxNumberOfFiles: 5
	    });
	    $('#formNew').bind('fileuploadcompleted', function (e, data) {
	        $.each(data.files, function (index, file) {
	        //console.log('Added file: ' + file.name);
	        	saveImg('repuesto', file.name, file.size);
                //loadImg('repuesto', 'auxImgEmp');
	        });
	    })

	    $('#formNew').addClass('fileupload-processing');
                $.ajax({
                    // Uncomment the following to send cross-domain cookies:
                    //xhrFields: {withCredentials: true},
                    url: $('#formNew').fileupload('option', 'url'),
                    dataType: 'json',
                    //async:false,
                    context: $('#formNew')[0]
                }).always(function () {
                    $(this).removeClass('fileupload-processing');
                }).done(function (result) {

                      // console.log(result);

                      // loadImages('repuesto',id_repuesto);

                        /*$(this).fileupload('option', 'done')
                            .call(this, $.Event('done'), {result: result});*/
                });
	})
</script>
