<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

$id=(isset($_POST['id']))?$_POST['id']:"";
$name=(isset($_POST['name']))?$_POST['name']:"";
$lastname=(isset($_POST['lastname']))?$_POST['lastname']:"";
$age=(isset($_POST['age']))?$_POST['age']:"";
$profession=(isset($_POST['profession']))?$_POST['profession']:"";
$period=(isset($_POST['period']))?$_POST['period']:"";
$turn=(isset($_POST['turn']))?$_POST['turn']:"";
$enroll=(isset($_POST['enroll']))?$_POST['enroll']:"";
$img=(isset($_FILES['img']["name"]))?$_FILES['img']["name"]:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

$error=array();

$accionAgregar="";
$accionEditar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal=false;

include ("crud.php");

switch ($accion) {
	case 'btnAgregar':

			if ($name=="") {
				$error['name']="Por Favor, Escriba Su Nombre";
			}

			if ($lastname=="") {
				$error['lastname']="Por Favor, Escriba Sus Apellidos";
			}
			if ($age=="") {
				$error['age']="Por Favor, Escriba Su Edad";
			}

			if ($profession=="") {
				$error['profession']="Por Favor, Escriba Su Carrera";
			}

			if ($enroll=="") {
				$error['enroll']="Por Favor, Escriba Su Control de Trabajo";
			}


			if(count($error)>0){
				$mostrarModal=true;
				break;
			}





		$sentencia=$pdo->prepare("INSERT INTO consult(name,lastname,age,profession,period,turn,enroll,img) VALUES (:name,:lastname,:age,:profession,:period,:turn,:enroll,:img)");

		$sentencia->bindParam(':name',$name);
		$sentencia->bindParam(':lastname',$lastname);
		$sentencia->bindParam(':age',$age);
		$sentencia->bindParam(':profession',$profession);
		$sentencia->bindParam(':period',$period);
		$sentencia->bindParam(':turn',$turn);
		$sentencia->bindParam(':enroll',$enroll);

		//Para Insertar Imagen En Una Carpeta
		$Fecha= new DateTime();
		$nombreArchivo=($img!="")?$Fecha->getTimestamp()."_".$_FILES["img"]["name"]:"imagen.jpg";

		$tmpimg=$_FILES["img"]["tmp_name"];

		if ($img!="") {
			move_uploaded_file($tmpimg,"imagenes/".$nombreArchivo);
		}

		$sentencia->bindParam(':img',$nombreArchivo);
		$sentencia->execute();

		header('Location: adminDAT.php');

		break;

	case 'btnEditar':
		$sentencia=$pdo->prepare("UPDATE consult SET
			name=:name,
			lastname=:lastname,
			age=:age,
			profession=:profession,
			period=:period,
			turn=:turn,
			enroll=:enroll WHERE id=:id");

		$sentencia->bindParam(':name',$name);
		$sentencia->bindParam(':lastname',$lastname);
		$sentencia->bindParam(':age',$age);
		$sentencia->bindParam(':profession',$profession);
		$sentencia->bindParam(':period',$period);
		$sentencia->bindParam(':turn',$turn);
		$sentencia->bindParam(':enroll',$enroll);
		$sentencia->bindParam(':id',$id);
		$sentencia->execute();

		$Fecha= new DateTime();
		$nombreArchivo=($img!="")?$Fecha->getTimestamp()."_".$_FILES["img"]["name"]:"imagen.jpg";

		$tmpimg=$_FILES["img"]["tmp_name"];

		if ($img!="") {
			move_uploaded_file($tmpimg,"imagenes/".$nombreArchivo);

			//Eliminar Imagen y También Donde Se guardó En Una Carpeta Mientras Se Cambia De Imagen
		$sentencia=$pdo->prepare("SELECT img FROM consult WHERE id=:id");
		$sentencia->bindParam(':id',$id);
		$sentencia->execute();
		$PC=$sentencia->fetch(PDO::FETCH_LAZY);

		if (isset($PC["img"])) {
			if (file_exists("imagenes/".$PC["img"])) {
				if ($PC['img']!="imagen.jpg") {
				unlink("imagenes/".$PC["img"]);
				}
			}
		}

			//Para Insertar Imagen En Una Carpeta Al Mismo Tiempo Modificando La Imagen
		$sentencia=$pdo->prepare("UPDATE consult SET
		img=:img WHERE id=:id");

		$sentencia->bindParam(':img',$nombreArchivo);
		$sentencia->bindParam(':id',$id);
		$sentencia->execute();
		}

		header('Location: adminDAT.php');
		break;

	case 'btnEliminar':
		//Eliminar Imagen y También Donde Se guardó En Una Carpeta
		$sentencia=$pdo->prepare("SELECT img FROM consult WHERE id=:id");
		$sentencia->bindParam(':id',$id);
		$sentencia->execute();
		$PC=$sentencia->fetch(PDO::FETCH_LAZY);

		if (isset($PC["img"])&&($PC['img']!="imagen.jpg")) {
			if (file_exists("imagenes/".$PC["img"])) {
				unlink("imagenes/".$PC["img"]);
			}
		}

		$sentencia=$pdo->prepare("DELETE FROM consult WHERE id=:id");
		$sentencia->bindParam(':id',$id);
		$sentencia->execute();

		header('Location: adminDAT.php');
		break;

	case 'btnCancelar':
		header('Location: adminDAT.php');
		break;

	case 'Editar':
		$accionAgregar="disabled";
		$accionEditar=$accionEliminar=$accionCancelar="";
		$mostrarModal=true;

		$sentencia=$pdo->prepare("SELECT * FROM consult WHERE id=:id");
		$sentencia->bindParam(':id',$id);
		$sentencia->execute();
		$PC=$sentencia->fetch(PDO::FETCH_LAZY);

		$name=$PC['name'];
		$lastname=$PC['lastname'];
		$age=$PC['age'];
		$profession=$PC['profession'];
		$period=$PC['period'];
		$turn=$PC['turn'];
		$enroll=$PC['enroll'];
		$img=$PC['img'];
		break;
}

		$sentencia= $pdo->prepare("SELECT * FROM consult WHERE 1");
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
      	<h3>Administradores</h3>
      	<h5>Encargados de Acuerdo a Su Área de Trabajo.</h5>
	</div>
    </div>
  </div>

  <div class="container">
  	<div class="row">
  		<div class="col">
  			<!-- Button trigger modal -->
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-square"></i> Agregar Datos </button>
  			<a href="http://localhost/ccreduaem/adminUSERDAT.php" class="btn btn-info m-1" role="button"><i class="fas fa-users"></i> Ver Usuarios</a>
 		</div>
  	</div>
  </div>

	<div class="container">
		<form action="" method="POST" enctype="multipart/form-data">

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 			 <div class="modal-dialog modal-lg" role="document">
    			<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Datos Administrador</h5>
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        			</button>
      			</div>
      			<div class="modal-body">
        			<div class="form-row">
        				<input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id;?>" require>
						<div class="form-group col-lg-4">
							<label for="">Nombre:</label>
							<input type="text" class="form-control <?php echo (isset($error['name']))?"is-invalid":"";?>" name="name" id="name" value="<?php echo $name;?>">
							<div class="invalid-feedback">
								<?php echo (isset($error['name']))?$error['name']:"";?>
							</div>
						</div>
						<div class="form-group col-lg-4">
							<label for="">Apellidos:</label>
							<input type="text" class="form-control <?php echo (isset($error['lastname']))?"is-invalid":"";?>" name="lastname" id="lastname" value="<?php echo $lastname;?>">
							<div class="invalid-feedback">
								<?php echo (isset($error['lastname']))?$error['lastname']:"";?>
							</div>
						</div>
						<div class="form-group col-lg-4">
							<label for="">Edad:</label>
							<input type="text" class="form-control <?php echo (isset($error['age']))?"is-invalid":"";?>" name="age" id="age" value="<?php echo $age;?>">
							<div class="invalid-feedback">
								<?php echo (isset($error['age']))?$error['age']:"";?>
							</div>
						</div>
						<div class="form-group col-lg-4">
							<label for="">Carrera:</label>
							<input type="text" class="form-control <?php echo (isset($error['profession']))?"is-invalid":"";?>" name="profession" id="profession" value="<?php echo $profession;?>">
							<div class="invalid-feedback">
								<?php echo (isset($error['profession']))?$error['profession']:"";?>
							</div>
						</div>
						<div class="form-group col-lg-4">
							<label for="">Periodo:</label>
							<select class="form-control" name="period" id="period" value="<?php echo $period;?>">
                                <option>Agosto-Diciembre 2019</option>
                                <option>Enero-Junio 2020</option>
                                <option>Agosto-Diciembre 2020</option>
                                <option selected>Enero-Junio 2021</option>
                                <option>Agosto-Diciembre 2021</option>
                                <option>Enero-Junio 2022</option>
                                <option>Agosto-Diciembre 2022</option>
                                <option>Enero-Junio 2023</option>
                                <option>Agosto-Diciembre 2023</option>
                             </select>
						</div>
						<div class="form-group col-lg-4">
							<label for="">Turno:</label>
							<select class="form-control" name="turn" id="turn" value="<?php echo $turn;?>">
                                <option>Matutino</option>
                                <option>Vespertino</option>
                             </select>
						</div>
						<div class="form-group col-lg-4">
							<label for="">Control Matrícula:</label>
							<input type="text" class="form-control <?php echo (isset($error['enroll']))?"is-invalid":"";?>" name="enroll" id="enroll" value="<?php echo $enroll;?>">
							<div class="invalid-feedback">
								<?php echo (isset($error['enroll']))?$error['enroll']:"";?>
							</div>
						</div>
						<div class="form-group col-lg-12">
							<label for="">Imagen:</label>
							<?php if($img!=""){?>
								<img class="img-thumbnail rounded mx-auto d-block" width="150px" src="imagenes/<?php echo $img;?>">
							<?php }?>
							<input type ="file" accept="image/*" name="img" id="img" value="<?php echo $img;?>">
						</div>
        			</div>
      			</div>
      		<div class="modal-footer">
        	<button class="btn btn-success" <?php echo $accionAgregar;?> value="btnAgregar" type="submit" name="accion">Agregar</button>
			<button class="btn btn-warning" <?php echo $accionEditar;?>  value="btnEditar" type="submit" name="accion">Editar</button>
			<button class="btn btn-danger" <?php echo $accionEliminar;?> onclick="return Confirmar('¿Estás Seguro de Eliminar Sus Datos?');" value="btnEliminar" type="submit" name="accion">Eliminar</button>
			<button class="btn btn-info" <?php echo $accionCancelar;?> value="btnCancelar" type="submit" name="accion">Cancelar</button>
      		</div>
    	</div>
  	</div>
</div>			
		</form>

<br>
	<div class="container">
        <div class="row">
          	<div class="col mt-2">
        		<table class="table table-striped table-info table-hover text-center">
            <thead class="thead-dark">
					<tr>
						<th>Imagen</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Edad</th>
						<th>Profesión</th>
						<th>Periodo</th>
						<th>Turno</th>
						<th>Control Matrícula</th>
						<th colspan="2">Acciones</th>
					</tr>
				</thead>

				<?php foreach($listaPC as $PC){?>
					<tr>
						<td><img class="img-thumbnail" onerror="this.style.display='none'" width="200px" src="imagenes/<?php echo $PC['img'];?>"></td>
						<td><?php echo $PC['name'];?></td>
						<td><?php echo $PC['lastname'];?></td>
						<td><?php echo $PC['age'];?></td>
						<td><?php echo $PC['profession'];?></td>
						<td><?php echo $PC['period'];?></td>
						<td><?php echo $PC['turn'];?></td>
						<td><?php echo $PC['enroll'];?></td>

						<td><form action="" method="POST">

							<input type="hidden" name="id" value="<?php echo $PC['id'];?>">
							<input class="btn btn-warning" type="submit" value="Editar" name="accion">
							<button class="btn btn-danger m-1" onclick="return Confirmar('¿Estás Seguro de Eliminar Sus Datos?');" value="btnEliminar" type="submit" name="accion">Borrar</button>
						</form>
						<td>
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
			      <a href="http://localhost/ccreduaem/admin.php" data-toggle="tooltip" data-placement="right" title="Regresar"><i class="fas fa-chevron-left fa-2x" style="color:black;"></i></a>
			    </div>
			  </div>
			</div>

		<?php if($mostrarModal){?>
			<script>
				$('#exampleModal').modal('show');
			</script>

		<?php }?>

		<script>
			function Confirmar(Mensaje){
						return(confirm(Mensaje))?true:false;
			} 
		</script>

	<!--*****************Finaliza Formulario*****************-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>