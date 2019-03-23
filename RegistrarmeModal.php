<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        	<div class="modal-header">                      
                        <h4 class="modal-title" id="myModalLabel">Registrarme</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
            <div class="modal-body">
			<form method="POST" action="registro.php">
				<div class="form-group">
                            <label class="control-label" for="usuario">Usuario:</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Contraseña:</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password2">Confirmar Contraseña:</label>
                            <input type="password" class="form-control" name="password2" id="password2" required>
                        </div>
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" name="agregar" class="btn btn-success">Registrar</button>
			</form>
            </div>
        </div>
    </div>
</div>