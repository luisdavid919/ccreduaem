<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="modal-header">                      
                        <h4 class="modal-title" id="myModalLabel">Agregar Datos Del CPU</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
            <div class="modal-body">
			<form method="POST" action="AgregarNuevo.php" enctype="multipart/form-data">
                <div class="row">
			             <div class="form-group col-lg-6">
                            <label class="control-label" for="clave">Clave:</label>
                            <input type="text" class="form-control" name="clave" id="clave" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label" for="ip">IP:</label>
                            <input type="text" class="form-control" name="ip" id="ip" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label" for="mac">MAC:</label>
                            <input type="text" class="form-control" name="mac" id="mac" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label" for="model">Modelo:</label>
                            <input type="text" class="form-control" name="model" id="model" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label" for="marc">Marca:</label>
                            <input type="text" class="form-control" name="marc" id="marc" required>
                        </div>
                        <div class="form-group col-lg-6">
                             <label class="control-label" for="so">S.O.:</label>
                             <select id="so" class="form-control" name="so" required>
                                <option>Windows 7 x32</option>
                                <option>Windows 8 x32</option>
                                <option>Windows 10 x32</option>
                                <option selected>Windows 7</option>
                                <option>Windows 8</option>
                                <option>Windows 10</option>
                                <option >Linux</option>
                                <option >Mac</option>
                                <option >Ubuntu</option>
                                </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label" for="express">Express Service Code:</label>
                            <input type="text" class="form-control" name="express" id="express" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label" for="tag">Service Tag:</label>
                            <input type="text" class="form-control" name="tag" id="tag" required>
                        </div>
                        <div class="form-group col-lg-12">
                        <label for="estado" class="control-label">Estado:</label>
                        <label style="color:green;"><input type="radio" name="estado" id="estado" value="Bueno">Bueno</label>
                        <label style="color:orange;"><input type="radio" name="estado" id="estado" value="Regular">Regular</label>
                        <label style="color:red;"><input type="radio" name="estado" id="estado" value="Malo">Malo</label>
                        <p class="text-center"><strong>Si el CPU se encuentra en mal estado por favor solicite su reporte.</strong></p>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label" for="img">Agregar Imagen:</label>
                            <input type="file" name="img" id="img" required>
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