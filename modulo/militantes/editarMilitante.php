<form id="formUpdate" action="javascript:updateForm('formUpdate','update.php')" class="form-horizontal" autocomplete="off" >
	<div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
					<h4 class="modal-title" id="exampleModalLabel">Editar Militante1 <?= $id;?></h4>
				</div>
				<div class="modal-body">
					<div id="datos_ajax_update"></div>
					<input id="tabla" name="tabla" type="hidden" value="militante">
					<input id="id" name="id" type="hidden">
					<div class="form-group">
						<label for="name" class="control-label col-md-2">Nombres:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="name" name="name" placeholder=""
								   data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<label for="namec" class="control-label col-md-2">Nombre Corto:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="namec" name="namec" placeholder=""
								   >
						</div>
					</div>
					<div class="form-group">
						<label for="paterno" class="control-label col-md-2">Paterno:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="paterno" name="paterno" placeholder=""
							data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<label for="materno" class="control-label col-md-2">Materno:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="materno" name="materno" placeholder=""
							data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<label for="ci" class="control-label col-md-2">CI:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="ci" name="ci" placeholder="" data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<label for="cargo" class="control-label col-md-2">Cargo:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="cargo" name="cargo" placeholder="" data-validation="required">
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
						<span>Editar Evento</span>
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

			var button  = $(event.relatedTarget); // Botón que activó el modal
			var id      = button.data('id'); // Extraer la información de atributos de datos
			var name    = button.data('name'); // Extraer la información de atributos de datos
			var namec   = button.data('namec'); // Extraer la información de atributos de datos
			var paterno = button.data('paterno'); // Extraer la información de atributos de datos
			var materno = button.data('materno'); // Extraer la información de atributos de datos
			var ci      = button.data('ci'); // Extraer la información de atributos de datos
			var cargo   = button.data('cargo'); // Extraer la información de atributos de datos


	        var modal = $(this);
	        //modal.find('.modal-title').text('Modificar Empleado: '+nombre+' '+apP);
	        modal.find('.modal-body #id').val(id);
	       	modal.find('.modal-body #name').val(name);
	       	modal.find('.modal-body #namec').val(namec);
	        modal.find('.modal-body #paterno').val(paterno);
	        modal.find('.modal-body #materno').val(materno);
	        modal.find('.modal-body #ci').val(ci);
	        modal.find('.modal-body #cargo').val(cargo);
	    });



	})
</script>

