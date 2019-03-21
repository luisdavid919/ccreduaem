<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="modal-header">                      
                        <h4 class="modal-title" id="myModalLabel">Agregar Entrada</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
            <div class="modal-body">
			<form method="POST" action="AgregarNuevo.php">
                <div class="row">
			             <div class="form-group col-lg-4">
                            <label class="control-label" for="dias">Fecha:</label>
                            <input type="date" class="form-control" name="dias" id="dias" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="control-label" for="entrada">Entrada:</label>
                            <input type="time" class="form-control" name="entrada" id="entrada" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="control-label" for="salida">Salida:</label>
                            <input type="date" class="form-control" name="salida" id="salida" disabled>
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="control-label" for="activ">Actividades:</label>
                            <textarea type="time" class="form-control" name="activ" id="activ" disabled></textarea>
                            <p class="text-center"><strong>Nota: Solamente inserte su fecha y hora de entrada de su servicio. Al finalizar su servicio, en el icono "Agregar Salida" podrá confirmar su salida y agregar sus actividades del servicio.</strong></p>
                        </div>

                </div>
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-danger bg-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" name="agregar" class="btn btn-success">Agregar</button>
			</form>
            </div>

        </div>
    </div>
</div>