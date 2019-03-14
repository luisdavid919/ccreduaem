<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        	<div class="modal-header">                      
                        <h4 class="modal-title" id="myModalLabel">Agregar Datos</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
            <div class="modal-body">
			<form method="POST" action="AgregarNuevo.php">
				<div class="form-group">
                            <label class="control-label" for="name">Serial:</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="lastname">Marca:</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="age">Modelo:</label>
                            <input type="text" class="form-control" name="age" id="age" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="profession">Carrera:</label>
                            <input type="text" class="form-control" name="profession" id="profession" required>
                        </div>
                        <div class="form-group">
                        <label for="estado" class="control-label">Estado:</label>
                        <label style="color:green;"><input type="radio" name="estado" id="estado" value="Bueno" onclick="show1();" />Bueno</label>
                        <label style="color:orange;"><input type="radio" name="estado" id="estado" value="Regular" onclick="show2();" />Regular</label>
                        <label style="color:red;"><input type="radio" name="estado" id="estado" value="Malo" onclick="show3();" />Malo</label>
                            <div id="div1" class="hide">
                            <label>Explique su situacion con ese Monitor:</label>
                            <textarea name="textarea" cols="60" id="descrip" name="descrip">&nbsp;</textarea>
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