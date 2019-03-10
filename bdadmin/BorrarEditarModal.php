<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">                      
                        <h4 class="modal-title" id="myModalLabel">Agregar Datos</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
            <div class="modal-body">
			<form method="POST" action="EditarRegistro.php?id=<?php echo $row['id']; ?>">
				<div class="form-group">
                            <label class="control-label" for="name">Nombre:</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
                        </div>
				<div class="form-group">
                            <label class="control-label" for="lastname">Apellidos:</label>
                            <input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname']; ?>">
                        </div>
                <div class="form-group">
                            <label class="control-label" for="age">Edad:</label>
                            <input type="text" class="form-control" name="age" value="<?php echo $row['age']; ?>">
                        </div>
                <div class="form-group">
                            <label class="control-label" for="profession">Profesión:</label>
                            <input type="text" class="form-control" name="profession" value="<?php echo $row['profession']; ?>">
                        </div>
                <div class="form-group">
                             <label class="control-label" for="period">Periodo:</label>
                             <select id="period" class="form-control" name="period" value="<?php echo $row['period']; ?>">
                                <option selected>Enero-Junio 2019</option>
                                <option>Agosto-Diciembre 2019</option>
                                <option>Enero-Junio 2020</option>
                                <option>Agosto-Diciembre 2020</option>
                                <option>Enero-Junio 2021</option>
                                <option>Agosto-Diciembre 2021</option>
                                <option>Enero-Junio 2022</option>
                                <option>Agosto-Diciembre 2022</option>
                                <option>Enero-Junio 2023</option>
                                </select>
                        </div>
                <div class="form-group">
                             <label class="control-label" for="turn">Turno:</label>
                             <select id="turn" class="form-control" name="turn" value="<?php echo $row['turn']; ?>">
                                <option selected>Matutino</option>
                                <option>Vespertino</option>
                                </select>
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
				<h4 class="text-center"><?php echo $row['name']; ?></h4>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                <a href="BorrarRegistro.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Eliminar</a>
            </div>

        </div>
    </div>
</div>