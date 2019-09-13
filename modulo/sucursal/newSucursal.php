<?PHP
$sql = "TRUNCATE TABLE aux_img ";
$strQ = $db->Execute($sql);
$fecha = $op->ToDay();
$hora = $op->Time();

$sql ="SELECT * FROM sucursal";
$query = $db->Execute($sql);
?>
<form id="formNew" action="javascript:saveForm('formNew','save.php')" class="form-horizontal" autocomplete="off" >
	<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">Nueva Sucursal</h4>
				</div>
				<div class="modal-body">
					<div id="datos_ajax"></div>

					<div class="form-group">
						<label for="fecha" class="control-label col-md-2">Fecha:</label>
						<div class="col-md-4">
							<input id="fecha" name="fecha" type="text" class="form-control" value="<?=$fecha;?> <?=$hora;?>" disabled="disabled" />
						</div>
						<input id="date" name="date" type="hidden" value="<?=$fecha;?> <?=$hora;?>" />
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
						<span>Agregar Sucursal</span>
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
</script>