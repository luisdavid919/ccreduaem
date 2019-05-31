<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

include ("crud.php");

		$sentencia= $pdo->prepare("SELECT * FROM mouse WHERE 1");
		$sentencia->execute();

		$listaPC=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Centro De Cómputo Redes FCAeI</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
  	<link rel="stylesheet" href="css/estilos.css">
  	<link rel="stylesheet" href="css/fontello.css">
  	<link rel="shortcut icon" type="image/x-icon" href="images/fcaei.ico">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>

	 <!--*****************LOGOS PRINCIPALES*****************-->
  <div class="container-fluid">
    <div class="row justify-content-between">
      <div class="col col-md-2 align-self-start d-none d-xs-none d-sm-none d-md-none d-lg-block d-xl-block">
        <img class="img img-fluid" src="images\fcaei_logo.png"/>
    </div>
    <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-8 align-self-center d-none d-xs-none d-sm-none d-md-block d-lg-block d-xl-block text-center">
      <h1>Centro De Cómputo De Redes FCAeI</h1>
    </div>
    <div class="col col-md-2 d-none d-xs-none d-sm-none d-md-none d-lg-block d-xl-block mt-3">
      <img class="img img-fluid" src="images\uaem_logo.png"/>
    </div>
  </div>
 </div>

<div class="container">
    <div class="row justify-content-center">
      <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-8 align-self-center d-block d-sm-block d-md-block text-center">
      	<h3>EQUIPOS</h3>
      	<h2>Mouse's</h2>
	</div>
    </div>
  </div>

  <div class="container">
  	<div class="row">
  		<div class="col">
  			<a href="http://localhost/ccreduaem/userPC.php" class="btn btn-info bg-primary m-1" role="button"><i class="fas fa-hdd"></i> CPU</a>
  			<a href="http://localhost/ccreduaem/userMON.php" class="btn btn-dark m-1" role="button"><i class="fas fa-desktop"></i> Monitores</a>
  			<a href="http://localhost/ccreduaem/userKEY.php" class="btn btn-light m-1" role="button"><i class="fas fa-keyboard"></i> Teclados</a>
  			<a href="http://localhost/ccreduaem/userDISP.php" class="btn btn-secondary m-1"><i class="fas fa-print"></i> Otros Dispositivos</a>
 		</div>
  	</div>
  </div>

<br>
	<div class="container">
        <div class="row">
          	<div class="col mt-2">
        		<table class="table table-striped table-info table-hover text-center">
            <thead class="bg-success text-light">
					<tr>
						<th>Imagen Mouse</th>
						<th>Serial</th>
						<th>Marca</th>
						<th>Modelo</th>
						<th>Estado</th>
					</tr>
				</thead>

				<?php foreach($listaPC as $PC){?>
					<tr>
						<td><img class="img-thumbnail" onerror="this.style.display='none'" width="120px" src="imagenes/<?php echo $PC['img'];?>"></td>
						<td><?php echo $PC['serials'];?></td>
						<td><?php echo $PC['marc'];?></td>
						<td><?php echo $PC['model'];?></td>
						<td><?php echo $PC['estado'];?></td>
					</tr>
				<?php }?>
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

	<!--*****************Finaliza Formulario*****************-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>