<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">                      
                        <h4 class="modal-title" id="myModalLabel">Editar Datos CPU</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
            <div class="modal-body">
			<form method="POST" action="EditarRegistro.php?id=<?php echo $row['id']; ?>">
				<div class="form-group">
                            <label class="control-label" for="clave">Clave:</label>
                            <input type="text" class="form-control" name="clave" id="clave" value="<?php echo $row['clave']; ?>">
                        </div>
				<div class="form-group">
                            <label class="control-label" for="ip">IP:</label>
                            <input type="text" class="form-control" name="ip" id="ip" value="<?php echo $row['ip']; ?>">
                        </div>
                <div class="form-group">
                            <label class="control-label" for="mac">MAC:</label>
                            <input type="text" class="form-control" name="mac" id="mac" value="<?php echo $row['mac']; ?>">
                        </div>
                <div class="form-group">
                            <label class="control-label" for="model">Modelo:</label>
                            <input type="text" class="form-control" name="model" id="model" value="<?php echo $row['model']; ?>">
                        </div>
                <div class="form-group">
                            <label class="control-label" for="marc">Marca:</label>
                            <input type="text" class="form-control" name="marc" id="marc" value="<?php echo $row['marc']; ?>">
                        </div>
                <div class="form-group">
                             <label class="control-label" for="so">S.O.:</label>
                             <select id="so" class="form-control" name="so" value="<?php echo $row['so']; ?>">
                                <option selected>Windows 7</option>
                                <option>Windows 8</option>
                                <option>Windows 10</option>
                                </select>
                        </div> 
                <div class="form-group">
                            <label class="control-label" for="express">Express Service Code:</label>
                            <input type="text" class="form-control" name="express" id="express" value="<?php echo $row['express']; ?>">
                        </div>
                <div class="form-group">
                             <label class="control-label" for="tag">Service Tag:</label>
                            <input type="text" class="form-control" name="tag" id="tag" value="<?php echo $row['tag']; ?>">
                        </div>
                <div class="form-group">
                             <label class="control-label" for="estado">Estado: </label>
                        <div class="form-check">
                                <input class="form-check-input" type="radio" name="estado" id="estado" value="Bueno" value="<?php echo $row['estado']; ?>">
                                <label class="form-check-label" for="estado">Bueno</label>
                        </div>
                        <div class="form-check">
                                <input class="form-check-input" type="radio" name="estado" id="estado" value="Regular" value="<?php echo $row['estado']; ?>">
                                <label class="form-check-label" for="estado">Regular</label>
                        </div>
                        <div class="form-check">
                                <input class="form-check-input" type="radio" name="estado" id="estado" value="Malo" value="<?php echo $row['estado']; ?>">
                                <label class="form-check-label" for="estado">Malo</label>
                        </div>
                        </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                <button type="submit" name="editar" class="btn btn-warning">Editar</a>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">                      
                        <h4 class="modal-title" id="myModalLabel">Eliminar Datos</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
            <div class="modal-body">	
            	<p class="text-center">¿Esta seguro de Borrar este registro?</p>
                <p>Aviso: Se borrarán los datos de manera permanente.</p>
				<h4 class="text-center"><?php echo $row['clave']; ?></h4>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                <a href="BorrarRegistro.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Eliminar</a>
            </div>

        </div>
    </div>
</div>