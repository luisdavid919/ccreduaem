<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">                      
                        <h4 class="modal-title" id="myModalLabel">Editar Datos Del Monitor</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
            <div class="modal-body">
			<form method="POST" action="EditarRegistro.php?id=<?php echo $row['id']; ?>">
                         <div class="form-group">
                            <label class="control-label" for="serials">Serial:</label>
                            <input type="text" class="form-control" name="serials" id="serials" value="<?php echo $row['serials']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="marc">Marca:</label>
                            <input type="text" class="form-control" name="marc" id="marc" value="<?php echo $row['marc']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="model">Modelo:</label>
                            <input type="text" class="form-control" name="model" id="model" value="<?php echo $row['model']; ?>">
                        </div>
                        <div class="form-group">
                        <label for="estado" class="control-label">Estado:</label>
                        <label style="color:green;"><input type="radio" name="estado" id="estado" value="Bueno" >Bueno</label>
                        <label style="color:orange;"><input type="radio" name="estado" id="estado" value="Regular" >Regular</label>
                        <label style="color:red;"><input type="radio" name="estado" id="estado" value="Malo">Malo</label>
                        <p><strong>Usted afirmó que el estado del monitor es: "<?php echo $row['estado']; ?>"</strong></p>
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
                <p class="text-center">Aviso: Se borrarán los datos de manera permanente.</p>
				<h4 class="text-center"><?php echo $row['serials']; ?></h4>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                <a href="BorrarRegistro.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Eliminar</a>
            </div>

        </div>
    </div>
</div>