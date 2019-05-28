<?php

$id=(isset($_POST['id']))?$_POST['id']:"";
$claver=(isset($_POST['claver']))?$_POST['claver']:"";
$ip=(isset($_POST['ip']))?$_POST['ip']:"";
$mac=(isset($_POST['mac']))?$_POST['mac']:"";
$model=(isset($_POST['model']))?$_POST['model']:"";
$marc=(isset($_POST['marc']))?$_POST['marc']:"";
$so=(isset($_POST['so']))?$_POST['so']:"";
$express=(isset($_POST['express']))?$_POST['express']:"";
$tag=(isset($_POST['tag']))?$_POST['tag']:"";
$estado=(isset($_POST['estado']))?$_POST['estado']:"";
$img=(isset($_FILES['img']["name"]))?$_FILES['img']["name"]:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

$error=array();

$accionAgregar="";
$accionEditar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal=false;

include ("crud.php");

switch ($accion) {
	case 'btnAgregar':

			if ($claver=="") {
				$error['claver']="Por Favor, Escriba la Clave UAEM";
			}

			if ($ip=="") {
				$error['ip']="Por Favor, Escriba La Dirección IP";
			}

			if ($mac=="") {
				$error['mac']="Por Favor, Escriba MAC Address";
			}
			if ($model=="") {
				$error['model']="Por Favor, Escriba Su Modelo";
			}

			if ($marc=="") {
				$error['marc']="Por Favor, Escriba Su Marca";
			}

			if ($express=="") {
				$error['express']="Por Favor, Escriba El Código Express Service";
			}

			if ($tag=="") {
				$error['tag']="Por Favor, Escriba El Código Service Tag";
			}


			if ($estado=="") {
				$error['estado']="Por Favor, Seleccione el estado del equipo";
			}


			if(count($error)>0){
				$mostrarModal=true;
				break;
			}





		$sentencia=$pdo->prepare("INSERT INTO pc(claver,ip,mac,model,marc,so,express,tag,estado,img) VALUES (:claver,:ip,:mac,:model,:marc,:so,:express,:tag,:estado,:img)");

		$sentencia->bindParam(':claver',$claver);
		$sentencia->bindParam(':ip',$ip);
		$sentencia->bindParam(':mac',$mac);
		$sentencia->bindParam(':model',$model);
		$sentencia->bindParam(':marc',$marc);
		$sentencia->bindParam(':so',$so);
		$sentencia->bindParam(':express',$express);
		$sentencia->bindParam(':tag',$tag);
		$sentencia->bindParam(':estado',$estado);

		//Para Insertar Imagen En Una Carpeta
		$Fecha= new DateTime();
		$nombreArchivo=($img!="")?$Fecha->getTimestamp()."_".$_FILES["img"]["name"]:"imagen.jpg";

		$tmpimg=$_FILES["img"]["tmp_name"];

		if ($img!="") {
			move_uploaded_file($tmpimg,"imagenes/".$nombreArchivo);
		}

		$sentencia->bindParam(':img',$nombreArchivo);
		$sentencia->execute();

		header('Location: adminPC.php');

		break;

	case 'btnEditar':
		$sentencia=$pdo->prepare("UPDATE pc SET
			claver=:claver,
			ip=:ip,
			mac=:mac,
			model=:model,
			marc=:marc,
			so=:so,
			express=:express,
			tag=:tag,
			estado=:estado WHERE id=:id");

		$sentencia->bindParam(':claver',$claver);
		$sentencia->bindParam(':ip',$ip);
		$sentencia->bindParam(':mac',$mac);
		$sentencia->bindParam(':model',$model);
		$sentencia->bindParam(':marc',$marc);
		$sentencia->bindParam(':so',$so);
		$sentencia->bindParam(':express',$express);
		$sentencia->bindParam(':tag',$tag);
		$sentencia->bindParam(':estado',$estado);
		$sentencia->bindParam(':id',$id);
		$sentencia->execute();

		$Fecha= new DateTime();
		$nombreArchivo=($img!="")?$Fecha->getTimestamp()."_".$_FILES["img"]["name"]:"imagen.jpg";

		$tmpimg=$_FILES["img"]["tmp_name"];

		if ($img!="") {
			move_uploaded_file($tmpimg,"imagenes/".$nombreArchivo);

			//Eliminar Imagen y También Donde Se guardó En Una Carpeta Mientras Se Cambia De Imagen
		$sentencia=$pdo->prepare("SELECT img FROM pc WHERE id=:id");
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
		$sentencia=$pdo->prepare("UPDATE pc SET
		img=:img WHERE id=:id");

		$sentencia->bindParam(':img',$nombreArchivo);
		$sentencia->bindParam(':id',$id);
		$sentencia->execute();
		}

		header('Location: adminPC.php');
		break;

	case 'btnEliminar':
		//Eliminar Imagen y También Donde Se guardó En Una Carpeta
		$sentencia=$pdo->prepare("SELECT img FROM pc WHERE id=:id");
		$sentencia->bindParam(':id',$id);
		$sentencia->execute();
		$PC=$sentencia->fetch(PDO::FETCH_LAZY);

		if (isset($PC["img"])&&($PC['img']!="imagen.jpg")) {
			if (file_exists("imagenes/".$PC["img"])) {
				unlink("imagenes/".$PC["img"]);
			}
		}

		$sentencia=$pdo->prepare("DELETE FROM pc WHERE id=:id");
		$sentencia->bindParam(':id',$id);
		$sentencia->execute();

		header('Location: adminPC.php');
		break;

	case 'btnCancelar':
		header('Location: adminPC.php');
		break;

	case 'Editar':
		$accionAgregar="disabled";
		$accionEditar=$accionEliminar=$accionCancelar="";
		$mostrarModal=true;

		$sentencia=$pdo->prepare("SELECT * FROM pc WHERE id=:id");
		$sentencia->bindParam(':id',$id);
		$sentencia->execute();
		$PC=$sentencia->fetch(PDO::FETCH_LAZY);

		$claver=$PC['claver'];
		$ip=$PC['ip'];
		$mac=$PC['mac'];
		$model=$PC['model'];
		$marc=$PC['marc'];
		$so=$PC['so'];
		$express=$PC['express'];
		$tag=$PC['tag'];
		$estado=$PC['estado'];
		$img=$PC['img'];
		break;
}

		$sentencia= $pdo->prepare("SELECT * FROM pc WHERE 1");
		$sentencia->execute();

		$listaPC=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>CRUD - PHP - MYSQL -HTML5 - BOOTSTRAP</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h1>CRUD - PHP - MYSQL -HTML5 - BOOTSTRAP</h1>
		<form action="" method="POST" enctype="multipart/form-data">

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabadminPC="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 			 <div class="modal-dialog modal-lg" role="document">
    			<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Datos PC</h5>
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        			</button>
      			</div>
      			<div class="modal-body">
        			<div class="form-row">
        				<input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id;?>" require>
						<div class="form-group col-lg-4">
							<label for="">Clave UAEM:</label>
							<input type="text" class="form-control <?php echo (isset($error['claver']))?"is-invalid":"";?>" name="claver" id="claver" value="<?php echo $claver;?>">
							<div class="invalid-feedback">
								<?php echo (isset($error['claver']))?$error['claver']:"";?>
							</div>
						</div>
						<div class="form-group col-lg-4">
							<label for="">IP:</label>
							<input type="text" class="form-control <?php echo (isset($error['ip']))?"is-invalid":"";?>" name="ip" id="ip" value="<?php echo $ip;?>">
							<div class="invalid-feedback">
								<?php echo (isset($error['ip']))?$error['ip']:"";?>
							</div>
						</div>
						<div class="form-group col-lg-4">
							<label for="">MAC:</label>
							<input type="text" class="form-control <?php echo (isset($error['mac']))?"is-invalid":"";?>" name="mac" id="mac" value="<?php echo $mac;?>">
							<div class="invalid-feedback">
								<?php echo (isset($error['mac']))?$error['mac']:"";?>
							</div>
						</div>
						<div class="form-group col-lg-4">
							<label for="">Modelo:</label>
							<input type="text" class="form-control <?php echo (isset($error['model']))?"is-invalid":"";?>" name="model" id="model" value="<?php echo $model;?>">
							<div class="invalid-feedback">
								<?php echo (isset($error['model']))?$error['model']:"";?>
							</div>
						</div>
						<div class="form-group col-lg-4">
							<label for="">Marca:</label>
							<input type="text" class="form-control <?php echo (isset($error['marc']))?"is-invalid":"";?>" name="marc" id="marc" value="<?php echo $marc;?>">
							<div class="invalid-feedback">
								<?php echo (isset($error['marc']))?$error['marc']:"";?>
							</div>
						</div>
						<div class="form-group col-lg-4">
							<label for="">Sistema Operativo:</label>
							<select class="form-control" name="so" id="so" value="<?php echo $so;?>">
              				<option>Windows 7 x32</option>
              				<option selected>Windows 8 x32</option>
              				<option>Windows 10 x32</option>
              				<option>Linux x32</option>
              				<option disabled="disabled">----</option>
              				<option>Windows 7</option>
              				<option>Windows 10</option>
              				<option>Linux</option>
              				<option>Macintosh</option>
              				<option>Otro</option>
              				
             				</select>
						</div>
						<div class="form-group col-lg-4">
							<label for="">Express Service Code:</label>
							<input type="text" class="form-control <?php echo (isset($error['express']))?"is-invalid":"";?>" name="express" id="express" value="<?php echo $express;?>">
							<div class="invalid-feedback">
								<?php echo (isset($error['express']))?$error['express']:"";?>
							</div>
						</div>
						<div class="form-group col-lg-4">
							<label for="">Service Tag:</label>
							<input type="text" class="form-control <?php echo (isset($error['tag']))?"is-invalid":"";?>" name="tag" id="tag" value="<?php echo $tag;?>">
							<div class="invalid-feedback">
								<?php echo (isset($error['tag']))?$error['tag']:"";?>
							</div>
						</div>
						<div class="form-group col-lg-8">
							<label for="<?php echo (isset($error['estado']))?"is-invalid":"";?>">Estado:</label>
							<label style="color:green;"><input type="radio" name="estado" id="estado" value="Bueno">Bueno </label>
            				<label style="color:orange;"><input type="radio" name="estado" id="estado" value="Regular">Regular </label>
            				<label style="color:red;"><input type="radio" name="estado" id="estado" value="Malo">Malo </label>
            				<div class="invalid-feedback">
								<?php echo (isset($error['estado']))?$error['estado']:"";?>
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
			<button class="btn btn-primary" <?php echo $accionCancelar;?> value="btnCancelar" type="submit" name="accion">Cancelar</button>
      		</div>
    	</div>
  	</div>
</div>

			<!-- Button trigger modal -->
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
  			Agregar Datos +
			</button>
			
		</form>

<br>
		<div class="row">
			<table class="table table-hover text-center">
				<thead class="thead-dark text-center">
					<tr>
						<th>Imagen PC</th>
						<th>Clave UAEM</th>
						<th>IP</th>
						<th>MAC</th>
						<th>Modelo</th>
						<th>Marca</th>
						<th>S.O.</th>
						<th>Express Service</th>
						<th>Service Tag</th>
						<th>Estado</th>
						<th colspan="2">Acciones</th>
					</tr>
				</thead>

				<?php foreach($listaPC as $PC){?>
					<tr>
						<td><img class="img-thumbnail" onerror="this.style.display='none'" width="150px" src="imagenes/<?php echo $PC['img'];?>"></td>
						<td><?php echo $PC['claver'];?></td>
						<td><?php echo $PC['ip'];?></td>
						<td><?php echo $PC['mac'];?></td>
						<td><?php echo $PC['model'];?></td>
						<td><?php echo $PC['marc'];?></td>
						<td><?php echo $PC['so'];?></td>
						<td><?php echo $PC['express'];?></td>
						<td><?php echo $PC['tag'];?></td>
						<td><?php echo $PC['estado'];?></td>

						<td><form action="" method="POST">

							<input type="hidden" name="id" value="<?php echo $PC['id'];?>">
							<input class="btn btn-warning" type="submit" value="Editar" name="accion">
							<button class="btn btn-danger" onclick="return Confirmar('¿Estás Seguro de Eliminar Sus Datos?');" value="btnEliminar" type="submit" name="accion">Borrar</button>
						</form>
						<td>
					</tr>
				<?php }?>
			</table>
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

	</div>
</body>
</html>