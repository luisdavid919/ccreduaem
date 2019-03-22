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
      	<h3>Reportes</h3>
      	<h5>Se recibirá reportes para dar mantenimiento de cualquier equipo de acuerdo a su experiencia.</h5>
	</div>
    </div>
  </div>

  <div class="container">
  	<div class="row">
  		<div class="col">
  			<a href="http://localhost/ccreduaem/bduserreportes/vista_reportes.php" class="btn btn-success m-1"><i class="fas fa-sync-alt"></i> Actualizar Datos</a>
  			<a href="#" class="btn btn-secondary m-1"><i class="fas fa-print"></i> Imprimir Reportes</a>
  		<?php 
	if(isset($_SESSION['message'])){
		?>
		<div class="alert text-center alert-warning alert-dismissible fade show mt-3" role="alert" id="mensaje">
  		<strong ><?php echo $_SESSION['message']; ?></strong>
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
        <table class="table table-striped table-info table-hover text-center">
            <thead class="bg-info">
		<th>Equipo</th>
		<th>Clave/Serial</th>
		<th>IP</th>
		<th>MAC</th>
		<th>Marca</th>
		<th>Modelo</th>
		<th>Descripción</th>
		<th colspan="2">Acciones</th>
	</thead>
	<tbody>
		<?php
			//incluimos el fichero de conexion
			include_once('dbconexion.php');

			$database = new Connection();
			$db = $database->open();
			try{	
				$sql = 'SELECT * FROM report';
				foreach ($db->query($sql) as $row) {
					?>
					<tr>
						<td><?php echo $row['equipo']; ?></td>
						<td><?php echo $row['claser']; ?></td>
						<td><?php echo $row['ip']; ?></td>
						<td><?php echo $row['mac']; ?></td>
						<td><?php echo $row['marc']; ?></td>
						<td><?php echo $row['model']; ?></td>
						<td><?php echo $row['describ']; ?></td>
							<td>
							<a href="#" data-toggle="modal"><i class="fas fa-print m-2 btn bg-success" style='color:black;' data-toggle="tooltip" title="Descargar reporte"></i></a>
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
			      <a href="http://localhost/ccreduaem/usuario.php" data-toggle="tooltip" data-placement="right" title="Regresar"><i class="fas fa-chevron-left fa-2x" style="color:black;"></i></a>
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