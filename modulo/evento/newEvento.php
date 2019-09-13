<form id="formNew" action="javascript:saveForm('formNew','save.php')" class="form-horizontal" autocomplete="off" >
	<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">Nuevo Evento</h4>
				</div>
				<div class="modal-body">
					<div id="datos_ajax"></div>
					<input id="tabla" name="tabla" type="hidden" value="evento">
					<div class="form-group">
						<label for="name" class="control-label col-md-2">Nombre Evento:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="Nuevo Evento"
								   data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<label for="site" class="control-label col-md-2">Lugar del Evento:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="site" name="site" placeholder="Lugar del Evento" data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<label for="obser" class="control-label col-md-2">Observaciones:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="obser" name="obser" placeholder="Observaciones" data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<label for="date" class="control-label col-md-2 col-xs-11">Fecha Evento:</label>
						<div class="col-md-4 col-xs-4">
							<div class="form-group">
				                <div class='input-group date' id='datepicker'>
				                    <input type='text' class="form-control" id="date" name="date" data-validation="required date" data-validation-error-msg-container="#errorDate" />
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
				                </div>
				                <div id="errorDate"></div>
				            </div>
						</div>
					</div>
					<div class="form-group">
						<label for="time" class="control-label col-md-2 col-xs-11">Hora Evento:</label>
						<div class="col-md-4 col-xs-4">
							<div class="form-group">
				                <div class='input-group date' id='time'>
				                    <input type='text' class="form-control" id="time" name="time" data-validation="required time" data-validation-error-msg-container="#errorTime" />
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-time"></span>
				                    </span>
				                </div>
				                <div id="errorTime"></div>
				            </div>
						</div>
					</div>

					<div class="form-group">
						<label for="cargo" class="control-label col-md-2">Estado:</label>
						<div class="col-md-4 col-xs-4">
							<select name="status" class="form-control" id="status" data-validation="required" >
								<option value="Activo">Activo</option>
								<option value="Terminado">Terminado</option>
								<option value="Suspendido">Suspendido</option>
							</select>
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
						<span>Agregar Evento</span>
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

        $('#datepicker').datetimepicker({
        	locale: 'es',
        	format: 'YYYY-MM-DD'
        });
        $('#time').datetimepicker({
        	format: 'HH:mm'
        });

	})
</script>
<style>
	div#errorTime, #errorDate{
		margin-left: 15px;
	}

</style>
