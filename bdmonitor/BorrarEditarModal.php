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
                            <div id="div2" class="show">
                            <label>Explique su situacion con ese Monitor:</label>
                            <textarea name="textarea" cols="60" id="descrip" name="descrip">&nbsp;</textarea>
                            </div>
                        </div>
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
                            <label class="control-label" for="enroll">Matrícula:</label>
                            <input type="text" class="form-control" name="enroll" value="<?php echo $row['enroll']; ?>">
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
                             <label class="control-label" for="sem">Semestre:</label>
                             <select id="sem" class="form-control" name="sem" value="<?php echo $row['sem']; ?>">
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