<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="modal-header">                      
                        <h4 class="modal-title" id="myModalLabel">Agregar Datos Del CPU</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
            <div class="modal-body">
			<form method="POST" action="AgregarNuevo.php">
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
                        <div class="form-group col-lg-6">
                        <label for="estado" class="control-label">Estado:</label>
                        <label style="color:green;"><input type="radio" name="estado" id="estado" value="Bueno" onclick="show1();" />Bueno</label>
                        <label style="color:orange;"><input type="radio" name="estado" id="estado" value="Regular" onclick="show2();" />Regular</label>
                        <label style="color:red;"><input type="radio" name="estado" id="estado" value="Malo" onclick="show3();" />Malo</label>
                            <div id="div1" class="hide">
                            <label>Explique su situacion con ese Equipo:</label>
                            <textarea name="textarea" cols="100" id="descrip" name="descrip">&nbsp;</textarea>
                            </div>
                        </div>
                    </div>
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" name="agregar" class="btn btn-success">Agregar</button>
			</form>
            </div>

        </div>
    </div>
</div>