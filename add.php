<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<!--
Project      : Datos de empleados con PHP, MySQLi y Bootstrap CRUD  (Create, read, Update, Delete) 
Author		 : Obed Alvarado
Website		 : http://www.obedalvarado.pw
Blog         : http://obedalvarado.pw/blog/
Email	 	 : info@obedalvarado.pw
-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Latihan MySQLi</title>
 
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet">
	<style>
		.content {
			margin-top: 80px;
		}
	</style>
 
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="container">
		<div class="content">
			<h2>Agregar Usuario</h2>
			<hr />
 
			<?php
			if(isset($_POST['add'])){
				$name		     = mysqli_real_escape_string($con,(strip_tags($_POST["name"],ENT_QUOTES)));//Escanpando caracteres 
				$lastname	 = mysqli_real_escape_string($con,(strip_tags($_POST["lastname"],ENT_QUOTES)));//Escanpando caracteres 
				$age	 = mysqli_real_escape_string($con,(strip_tags($_POST["age"],ENT_QUOTES)));//Escanpando caracteres 
				$profession	     = mysqli_real_escape_string($con,(strip_tags($_POST["profession"],ENT_QUOTES)));//Escanpando caracteres 
				$period		 = mysqli_real_escape_string($con,(strip_tags($_POST["period"],ENT_QUOTES)));//Escanpando caracteres 
				$turn		 = mysqli_real_escape_string($con,(strip_tags($_POST["turn"],ENT_QUOTES)));//Escanpando caracteres 
				
			
 
				$cek = mysqli_query($con, "SELECT * FROM consult WHERE id='$name'");
				if(mysqli_num_rows($cek) == 0){
						$insert = mysqli_query($con, "INSERT INTO consult(name, lastname, age, profession, period, turn)
															VALUES('$name','$lastname', '$age', '$profession', '$period', '$turn')") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
							header("location: consulta_admin.php");
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
						}
					 
				}else{
					//echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. código existente!</div>';
				}
			}
			?>
 
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombre:</label>
					<div class="col-sm-4">
						<input type="text" name="name" class="form-control" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Apellidos:</label>
					<div class="col-sm-4">
						<input type="text" name="lastname" class="form-control" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Edad:</label>
					<div class="col-sm-4">
						<input type="text" name="age" class="form-control" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Profesión:</label>
					<div class="col-sm-4">
						<input type="text" name="profession" class="form-control" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Periodo:</label>
					<div class="col-sm-3">
						<input type="text" name="period" class="form-control" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Turno:</label>
					<div class="col-sm-3">
						<input type="text" name="turn" class="form-control" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="consulta_admin.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>
 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
</body>
</html>