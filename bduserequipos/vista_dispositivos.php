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
      	<h3>EQUIPOS</h3>
      	<h2>Dispositivos</h2>
	</div>
    </div>
  </div>

  <div class="container">
  	<div class="row">
  		<div class="col">
  			<a href="http://localhost/ccreduaem/bduserequipos/vista_equipos.php" class="btn btn-info bg-primary m-1" role="button"><i class="fas fa-hdd"></i> CPU</a>
  			<a href="http://localhost/ccreduaem/bduserequipos/vista_monitor.php" class="btn btn-dark m-1" role="button"><i class="fas fa-desktop"></i> Monitores</a>
  			<a href="http://localhost/ccreduaem/bduserequipos/vista_teclado.php" class="btn btn-light m-1" role="button"><i class="fas fa-keyboard"></i> Teclados</a>
  			<a href="http://localhost/ccreduaem/bduserequipos/vista_mouse.php" class="btn btn-secondary m-1"><i class="fas fa-mouse-pointer"></i> Mouse</a>
</div>
  	</div>
  </div>
<div class="container">
        <div class="row">
          <div class="col mt-2 table-responsive">
        <table class="table table-striped table-info table-hover text-center">
            <thead class="bg-secondary text-light">
		<th>Dispositivo</th>
		<th>IP</th>
		<th>MAC</th>
		<th>Modelo</th>
		<th>Marca</th>
		<th>Estado</th>
	</thead>
	<tbody>
		<?php
			//incluimos el fichero de conexion
			include_once('dbconexion.php');

			$database = new Connection();
			$db = $database->open();
			try{	
				$sql = 'SELECT * FROM dispositivos';
				foreach ($db->query($sql) as $row) {
					?>
					<tr>
						<td><?php echo $row['disp']; ?></td>
						<td><?php echo $row['ip']; ?></td>
						<td><?php echo $row['mac']; ?></td>
						<td><?php echo $row['model']; ?></td>
						<td><?php echo $row['marc']; ?></td>
						<td><?php echo $row['estado']; ?></td>
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

	<script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body.>
</html>