<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">                      
                        <h4 class="modal-title" id="myModalLabel">Editar Datos CPU</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
            <div class="modal-body">
            <form method="POST" action="EditarRegistro.php?id=<?php echo $row['id']; ?>">
                <div class="row">
                         <div class="form-group col-lg-6">
                             <label class="control-label" for="disp">Dispositivos:</label>
                             <select id="disp" class="form-control" name="disp" value="<?php echo $row['disp']; ?>">
                                <option>Impresora</option>
                                <option>Proyector</option>
                                <option selected>Switch</option>
                                </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label" for="ip">IP:</label>
                            <input type="text" class="form-control" name="ip" id="ip" value="<?php echo $row['ip']; ?>">
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label" for="mac">MAC:</label>
                            <input type="text" class="form-control" name="mac" id="mac" value="<?php echo $row['mac']; ?>">
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label" for="model">Modelo:</label>
                            <input type="text" class="form-control" name="model" id="model" value="<?php echo $row['model']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label" for="marc">Marca:</label>
                            <input type="text" class="form-control" name="marc" id="marc" value="<?php echo $row['marc']; ?>">
                        </div>
                        <div class="form-group col-lg-6">
                        <label for="estado" class="control-label">Estado:</label>
                        <label style="color:green;"><input type="radio" name="estado" id="estado" value="Bueno" value="<?php echo $row['estado']; ?>">Bueno</label>
                        <label style="color:orange;"><input type="radio" name="estado" id="estado" value="Regular" value="<?php echo $row['estado']; ?>">Regular</label>
                        <label style="color:red;"><input type="radio" name="estado" id="estado" value="Malo" value="<?php echo $row['estado']; ?>">Malo</label>
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
                <h4 class="text-center"><?php echo $row['disp']; ?></h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                <a href="BorrarRegistro.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Eliminar</a>
            </div>

        </div>
    </div>
</div>