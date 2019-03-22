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
                <div class="row">
			             <div class="form-group col-lg-6">
                             <label class="control-label" for="equipo">Equipo que desea verificar:</label>
                             <select id="equipo" class="form-control" name="equipo" required>
                                <option>CPU</option>
                                <option>Monitor</option>
                                <option>Teclado</option>
                                <option selected>Mouse</option>
                                <option>Impresora</option>
                                <option>Proyector</option>
                                <option>Switch</option>
                                </select>
                        </div>
                         <div class="form-group col-lg-6">
                            <label class="control-label" for="claser">Clave/Serial:</label>
                            <input type="text" class="form-control" name="claser" id="claser" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label" for="ip">IP:</label>
                            <input type="text" class="form-control" name="ip" id="ip">
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label" for="mac">MAC:</label>
                            <input type="text" class="form-control" name="mac" id="mac">
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label" for="marc">Marca:</label>
                            <input type="text" class="form-control" name="marc" id="marc" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label" for="model">Modelo:</label>
                            <input type="text" class="form-control" name="model" id="model" required>
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="control-label" for="describ">Describa el problema del equipo:</label>
                            <textarea type="time" class="form-control" name="describ" id="describ"></textarea>
                            <p class="text-center"><strong>Nota: En caso de reportar sobre el monitor, teclado o mouse; deje en blanco la casilla IP y MAC. </strong></p>
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