<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="modal-header">                      
                        <h4 class="modal-title" id="myModalLabel">Solicitar Reporte</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
            <div class="modal-body">
			<form method="POST" action="AgregarNuevo.php">
			             <div class="form-group">
                             <label class="control-label" for="so">Equipo que desea verificar:</label>
                             <select id="so" class="form-control" name="so" required>
                                <option>CPU</option>
                                <option>Monitor</option>
                                <option>Teclado</option>
                                <option selected>Mouse</option>
                                <option>Impresora</option>
                                <option>Proyector</option>
                                <option>Switch</option>
                                </select>
                        </div>
                         <div class="form-group">
                            <label class="control-label" for="serials">Clave/Serial:</label>
                            <input type="text" class="form-control" name="serials" id="serials" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="marc">IP:</label>
                            <input type="text" class="form-control" name="marc" id="marc" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="marc">MAC:</label>
                            <input type="text" class="form-control" name="marc" id="marc" required>
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
                            <label class="control-label" for="activ">Describa el problema del equipo:</label>
                            <textarea type="time" class="form-control" name="activ" id="activ"></textarea>
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