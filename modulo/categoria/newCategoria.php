<?PHP
$fecha = $op->ToDay();
$hora = $op->Time();
?>

<script>
	$(document).ready(function(e) {

		$.validate({
          lang: 'es',
          modules : 'security, modules/logic'
      	});

      	$('#dataRegister').on('show.bs.modal', function() {
			//Must wait until the render of the modal appear, thats why we use the resizeMap and NOT resizingMap!! ;-)
			$('#foto').html('<img class="thumb" src="../../thumb/phpThumb.php?src=../modulo/categoria/uploads/sin_imagen.jpg&amp;w=120&amp;h=75&amp;far=1&amp;bg=FFFFFF&amp;hash=361c2f150d825e79283a1dcc44502a76" alt="">');
		});

		$('#dataRegister').on('hidden.bs.modal', function (e) {
			// do something...
			$('#formNew').get(0).reset();
			$('#foto').html('<img class="thumb" src="../../thumb/phpThumb.php?src=../modulo/categoria/uploads/sin_imagen.jpg&amp;w=120&amp;h=75&amp;far=1&amp;bg=FFFFFF&amp;hash=361c2f150d825e79283a1dcc44502a76" alt="">');
		});
		//UPLOAD FILES
		'use strict';
	    // Initialize the jQuery File Upload widget:
	    $('#formNew').fileupload({
	        // Uncomment the following to send cross-domain cookies:
	        //xhrFields: {withCredentials: true},
	        url: '../../modulo/categoria/uploads/',
	        disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator && navigator.userAgent),
	        imageMaxWidth: 1200,
	        //imageMaxHeight: 800,
	        imageCrop: false, // Force cropped images
	        //maxFileSize: 999,
	        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
	        limitMultiFileUploads: 1,
            maxNumberOfFiles: 1
	    });
	    $('#formNew').bind('fileuploadcompleted', function (e, data) {
	        $.each(data.files, function (index, file) {
	        //console.log('Added file: ' + file.name);
	        	saveImg('categoria', file.name, file.size);
                //loadImg('categoria', 'auxImg');
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
               	//loadImages('categoria',id_categoria);
                /*$(this).fileupload('option', 'done')
                    .call(this, $.Event('done'), {result: result});*/
            });
	});

</script>

<form id="formNew" action="javascript:saveForm('formNew','save.php')" class="form-horizontal" autocomplete="off" >
	<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">Nueva Categoria</h4>
				</div>
				<div class="modal-body">
					<div id="datos_ajax"></div>

					<div class="form-group">
						<label for="fecha" class="control-label col-md-2">Fecha:</label>
						<div class="col-md-4">
							<input id="fecha" name="fecha" type="text" class="form-control" value="<?=$fecha;?> <?=$hora;?>" disabled="disabled" />
						</div>
						<input id="date" name="date" type="hidden" value="<?=$fecha;?> <?=$hora;?>" />
						<input id="tabla" name="tabla" type="hidden" value="categoria">
					</div>
					<div class="form-group">
						<label for="name" class="control-label col-md-2">Nombre Categoria:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="Categoria" data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<label for="detail" class="control-label col-md-2">Detalle:</label>
						<div class="col-md-10">
							<textarea class="form-control" id="detail" name="detail" data-validation="required" placeholder="Detalle" rows="3"></textarea>
						</div>
					</div>
					<div class="row">
					<div class="col-md-12">

					        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
					        <div class="row fileupload-buttonbar">
					            <div class="col-lg-7">
					                <!-- The fileinput-button span is used to style the file input field as button -->
					                <span class="btn btn-success btn-sm fileinput-button">
					                    <i class="fa fa-folder-open-o" aria-hidden="true"></i>
					                    <span>Examinar...</span>
					                    <input type="file" id="files" name="files[]">
					                </span>
					                <button type="submit" class="btn btn-primary btn-sm start">
					                    <i class="fa fa-upload"></i>
					                    <span>Iniciar Subida</span>
					                </button>
					                <button type="reset" class="btn btn-warning btn-sm cancel">
					                    <i class="fa fa-ban"></i>
					                    <span>Cancelar</span>
					                </button>
					                <button type="button" class="btn btn-danger btn-sm delete">
					                    <i class="fa fa-trash-o"></i>
					                    <span>Borrar</span>
					                </button>
					                <input type="checkbox" class="toggle">
					                <!-- The global file processing state -->
					                <span class="fileupload-process"></span>
					            </div>
					            <!-- The global progress state -->
					            <div class="col-lg-5 fileupload-progress fade">
					                <!-- The global progress bar -->
					                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
					                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
					                </div>
					                <!-- The extended global progress state -->
					                <div class="progress-extended">&nbsp;</div>
					            </div>
					        </div>
					        <div class="file-preview">
					        	<div class="file-drop-zone-title">
					        		Arrastre y suelte aquí los archivos …
					        	</div>
					        	<div class="file-drop-zone">
						        	<!-- The table listing the files available for upload/download -->
						        	<table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
					        	</div>
					        </div>
					</div>
				</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal">
						<i class="fa fa-close" aria-hidden="true"></i>
						<span>Cancelar</span>
					</button>
					<button type="submit" id="save" class="btn btn-success">
						<i class="fa fa-check" aria-hidden="true"></i>
						<span>Agregar Categoria</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</form>