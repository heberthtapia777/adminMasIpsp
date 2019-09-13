<form id="formUpdate" action="javascript:updateForm('formUpdate','update.php')" class="form-horizontal" autocomplete="off" >
	<div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">Editar Evento</h4>
				</div>
				<div class="modal-body">
					<div id="datos_ajax_update"></div>
					<input id="tabla" name="tabla" type="hidden" value="evento">
					<input id="idEvento" name="idEvento" type="hidden">
					<div class="form-group">
						<label for="name" class="control-label col-md-2">Nombre Evento:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="nameU" name="nameU" placeholder="Nuevo Evento"
								   data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<label for="site" class="control-label col-md-2">Lugar del Evento:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="siteU" name="siteU" placeholder="Lugar del Evento" data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<label for="obser" class="control-label col-md-2">Observaciones:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="obserU" name="obserU" placeholder="Observaciones" data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<label for="date" class="control-label col-md-2 col-xs-11">Fecha Evento:</label>
						<div class="col-md-4 col-xs-4">
							<div class="form-group">
				                <div class='input-group date' id='datepicker1'>
				                    <input type='text' class="form-control" id="date1" name="date1" data-validation="required date" data-validation-error-msg-container="#errorDate" />
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
				                <div class='input-group date' id='time1'>
				                    <input type='text' class="form-control" id="time1" name="time1" data-validation="required time" data-validation-error-msg-container="#errorTime" />
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
							<select name="statusU" class="form-control" id="statusU" data-validation="required" >
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
	$('#dataUpdate').on('hidden.bs.modal', function (e) {
		// do something...
		$('#formUpdate').get(0).reset();
	});
	$(document).ready(function(){

		$('#dataUpdate').on('show.bs.modal', function (event) {

			var button   = $(event.relatedTarget); // Botón que activó el modal
			var idEvento = button.data('idevento'); // Extraer la información de atributos de datos
			var name     = button.data('name'); // Extraer la información de atributos de datos
			var site     = button.data('site'); // Extraer la información de atributos de datos
			var obser    = button.data('obser'); // Extraer la información de atributos de datos
			var date     = button.data('date'); // Extraer la información de atributos de datos
			var time     = button.data('time'); // Extraer la información de atributos de datos
			var status   = button.data('status');

	        var modal = $(this);
	        //modal.find('.modal-title').text('Modificar Empleado: '+nombre+' '+apP);
	        modal.find('.modal-body #idEvento').val(idEvento);
	        modal.find('.modal-body #nameU').val(name);
	        modal.find('.modal-body #siteU').val(site);
	        modal.find('.modal-body #obserU').val(obser);
	        modal.find('.modal-body #date1').val(date);
	        modal.find('.modal-body #time1').val(time);
	        modal.find('.modal-body #statusU').val(status);

	    });

        $('#datepicker1').datetimepicker({
        	locale: 'es',
        	format: 'YYYY-MM-DD'
        });
        $('#time1').datetimepicker({
        	format: 'HH:mm'
        });

	})
</script>
<style>
	div#errorTime, #errorDate{
		margin-left: 15px;
	}

</style>
