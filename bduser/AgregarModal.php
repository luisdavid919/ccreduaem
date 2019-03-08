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
                            <label class="control-label" for="name">Nombre:</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="lastname">Apellidos:</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="age">Edad:</label>
                            <input type="text" class="form-control" name="age" id="age" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="profession">Carrera:</label>
                            <input type="text" class="form-control" name="profession" id="profession" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="enroll">Matrícula:</label>
                            <input type="text" class="form-control" name="enroll" id="enroll" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="period">Periodo:</label>
                            <input type="text" class="form-control" name="period" id="period" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="sem">Semestre:</label>
                            <input type="text" class="form-control" name="sem" id="sem" required>
                        </div> 
				<div class="form-group">
                            <label class="control-label" for="turn">Turno:</label>
                            <input type="text" class="form-control" name="turn" id="turn" required>
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