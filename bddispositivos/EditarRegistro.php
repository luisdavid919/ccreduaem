<?php
	session_start();
	include_once('dbconexion.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$disp=$_POST['disp'];
			$ip=$_POST['ip'];
			$mac=$_POST['mac'];
			$model=$_POST['model'];
			$marc=$_POST['marc'];
			$estado=$_POST['estado'];

			$sql = "UPDATE dispositivos SET disp = '$disp', ip = '$ip', mac = '$mac', model = '$model', marc = '$marc', estado = '$estado' WHERE id = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? '¡Datos Actualizados Correctamente!' : 'No se Actualizaron Los Datos';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Complete el formulario de edición';
	}

	header('location: consulta_dispositivos.php');

?>