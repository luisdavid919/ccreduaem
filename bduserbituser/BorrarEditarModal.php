<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">                      
                        <h4 class="modal-title" id="myModalLabel">Agregar Salida y Actividad</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
            <div class="modal-body">
            <form method="POST" action="EditarRegistro.php?id=<?php echo $row['id']; ?>">
                <div class="row">
                         <div class="form-group col-lg-4">
                            <label class="control-label" for="dias">Fecha:</label>
                            <input type="date" class="form-control" name="dias" id="dias" disabled value="<?php echo $row['dias']; ?>">
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="control-label" for="entrada">Entrada:</label>
                            <input type="time" class="form-control" name="entrada" id="entrada" disabled value="<?php echo $row['entrada']; ?>">
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="control-label" for="salida">Salida:</label>
                            <input type="time" class="form-control" name="salida" id="salida" value="<?php echo $row['salida']; ?>">
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="control-label" for="activ">Actividades:</label>
                            <textarea type="text" class="form-control" name="activ" id="activ"><?php echo $row['activ']; ?></textarea>
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
                <p class="text-center">Aviso: Se borrarán los datos de manera permanente.</p>
                <h4 class="text-center"><?php echo $row['dias']; ?></h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                <a href="BorrarRegistro.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Eliminar</a>
            </div>

        </div>
    </div>
</div>