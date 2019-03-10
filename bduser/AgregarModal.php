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
                             <select id="period" class="form-control" name="period" required>
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
                             <label class="control-label" for="sem">Semestre:</label>
                             <select id="sem" class="form-control" name="sem" required>
                                <option selected>4° Semestre</option>
                                <option>5° Semestre</option>
                                <option>6° Semestre</option>
                                <option>7° Semestre</option>
                                <option>8° Semestre</option>
                                <option>Egresado</option>
                                </select>
                        </div>
                        <div class="form-group">
                             <label class="control-label" for="turn">Turno:</label>
                             <select id="turn" class="form-control" name="turn" required>
                                <option selected>Matutino</option>
                                <option>Vespertino</option>
                                </select>
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