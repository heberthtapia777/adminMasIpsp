<?PHP
$sql = "TRUNCATE TABLE aux_img ";
$strQ = $db->Execute($sql);
$fecha = $op->ToDay();
$hora = $op->Time();
?>
<form id="formUpdate" action="javascript:updateForm('formUpdate','update.php')" class="form-horizontal" autocomplete="off" >
	<div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">Modificar Repuesto</h4>
				</div>
				<div class="modal-body">
					<div id="datos_ajax_update"></div>

					<div class="form-group">
						<label for="fecha" class="control-label col-md-2">Fecha:</label>
						<div class="col-md-4">
							<input id="fecha" name="fecha" type="text" class="form-control" value="<?=$fecha;?> <?=$hora;?>" disabled="disabled" />
						</div>
						<input id="date" name="date" type="hidden" value="<?=$fecha;?> <?=$hora;?>" />
						<input id="idSuc" name="idSuc" type="hidden" value="">
						<input id="tabla" name="tabla" type="hidden" value="sucursal">
					</div>
					<div class="form-group">
						<label for="name" class="control-label col-md-2">Nombre Sucursal:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="Nombre Scursal" data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<label for="fromRep" class="control-label col-md-2">Dirección:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="address" name="address" placeholder="Dirección" data-validation="required">
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
						<span>Modificar Sucursal</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</form>

<script>

	$('#dataUpdate').on('hidden.bs.modal', function (e) {
		// do something...
		$('#form').get(0).reset();
	});

	$('#dataUpdate').on('show.bs.modal', function (event) {

		var button  	= $(event.relatedTarget); // Botón que activó el modal
		var idSuc		= button.data('idsuc'); // Extraer la información de atributos de datos
		var nameSuc		= button.data('namesuc'); // Extraer la información de atributos de datos
		var address  	= button.data('address'); // Extraer la información de atributos de datos

		var modal = $(this);
		modal.find('.modal-title').text('Modificar Sucursal: '+nameSuc);
		modal.find('.modal-body #idSuc').val(idSuc);
		modal.find('.modal-body #name').val(nameSuc);
		modal.find('.modal-body #address').val(address);

		$('input#suc'+idSuc).iCheck('check');
	});

</script>