<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="utf-8">
<title>Centro De Cómputo De Redes FCAeI</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/estilos.css">
<link rel="stylesheet" href="../css/fontello.css">
<link rel="shortcut icon" type="image/x-icon" href="../images/fcaei.ico">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	textarea {
  resize: none;
}
</style>
</head>
<body>
	 <!--*****************LOGOS PRINCIPALES*****************-->
  <div class="container-fluid">
    <div class="row justify-content-between">
      <div class="col col-md-2 align-self-start d-none d-xs-none d-sm-none d-md-none d-lg-block d-xl-block">
        <img class="img img-fluid" src="../images\fcaei_logo.png"/>
    </div>
    <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-8 align-self-center d-none d-xs-none d-sm-none d-md-block d-lg-block d-xl-block text-center">
      <h1>Centro De Cómputo De Redes FCAeI</h1>
    </div>
    <div class="col col-md-2 d-none d-xs-none d-sm-none d-md-none d-lg-block d-xl-block mt-3">
      <img class="img img-fluid" src="../images\uaem_logo.png"/>
    </div>
  </div>
 </div>

<div class="container">
    <div class="row justify-content-center">
      <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-8 align-self-center d-block d-sm-block d-md-block text-center">
      	<h3>Bitácora</h3>
      	<h5>Realice Su Control De Asistencia y Actividades De Acuerdo A Su Servicio</h5>
	</div>
    </div>
  </div>

  <div class="container">
  	<div class="row">
  		<div class="col">
  			<a href="#addnew" class="btn btn-success m-1" data-toggle="modal"><i class="fas fa-plus-square"></i> Agregar Entrada</a>
  			<a href="#addnew" class="btn btn-secondary m-1" data-toggle="modal"><i class="fas fa-print"></i> Imprimir Formato</a>
  		<?php 
	if(isset($_SESSION['message'])){
		?>
		<div class="alert alert-warning text-center alert-dismissible fade show mt-3" role="alert" id="mensaje">
  		<strong><?php echo $_SESSION['message']; ?></strong>
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
			</div>
		<?php

		unset($_SESSION['message']);
	}
?>
</div>
  	</div>
  </div>
<div class="container">
        <div class="row">
          <div class="col mt-2 table-responsive">
        <table class="table table-striped table-secondary table-hover text-center">
            <thead class="bg-light">
		<th>Fecha</th>
		<th>Entrada</th>
		<th>Actividad</th>
		<th>Salida</th>
		<th colspan="2">Acciones</th>
	</thead>
	<tbody>
		<?php
			//incluimos el fichero de conexion
			include_once('dbconexion.php');

			$database = new Connection();
			$db = $database->open();
			try{	
				$sql = 'SELECT * FROM bitadmin';
				foreach ($db->query($sql) as $row) {
					?>
					<tr>
						<td><?php echo $row['dias']; ?></td>
						<td><?php echo $row['entrada']; ?></td>
						<td><?php echo $row['activ']; ?></td>
						<td><?php echo $row['salida']; ?></td>
						<td>
							<a href="#edit_<?php echo $row['id']; ?>" data-toggle="modal"><i class="far fa-edit m-2 btn btn-warning" style="color:black;" data-toggle="tooltip" title="Agregar Salida"></i></a>
							</td>
							<td>
							<a href="#delete_<?php echo $row['id']; ?>" data-toggle="modal"><i class="fas fa-trash-alt m-2 btn bg-danger" style='color:black;' data-toggle="tooltip" title="Eliminar Datos"></i></a>
						</td>
						<?php include('BorrarEditarModal.php'); ?>
					</tr>
					<?php 
				}
			}
			catch(PDOException $e){
				echo "Hubo un problema en la conexión: " . $e->getMessage();
			}

			//Cerrar la Conexion
			$database->close();

		?>
				</tbody>
			</table>
		</div>
	</div>
</div>

			<!--*****************Regresar*****************-->
			<div class="container-fluid fixed-bottom">
			  <div class="row m-5">
			    <div class="col">
			      <a href="http://localhost/ccreduaem/admin.php" data-toggle="tooltip" data-placement="right" title="Regresar"><i class="fas fa-chevron-left fa-2x" style="color:black;"></i></a>
			    </div>
			  </div>
			</div>

<?php include('AgregarModal.php'); ?>
<script>
setTimeout(function() {
    $('#mensaje').fadeOut('fast');
}, 3000);
</script>

	<script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body.>
</html>