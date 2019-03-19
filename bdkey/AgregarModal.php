<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="modal-header">                      
                        <h4 class="modal-title" id="myModalLabel">Agregar Datos Del Teclado</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
            <div class="modal-body">
			<form method="POST" action="AgregarNuevo.php">
			             <div class="form-group">
                            <label class="control-label" for="serials">Serial:</label>
                            <input type="text" class="form-control" name="serials" id="serials" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="marc">Marca:</label>
                            <input type="text" class="form-control" name="marc" id="marc" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="model">Modelo:</label>
                            <input type="text" class="form-control" name="model" id="model" required>
                        </div>
                        <div class="form-group">
                        <label for="estado" class="control-label">Estado:</label>
                        <label style="color:green;"><input type="radio" name="estado" id="estado" value="Bueno">Bueno</label>
                        <label style="color:orange;"><input type="radio" name="estado" id="estado" value="Regular">Regular</label>
                        <label style="color:red;"><input type="radio" name="estado" id="estado" value="Malo">Malo</label>
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