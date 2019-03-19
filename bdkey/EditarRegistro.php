<?php
	session_start();
	include_once('dbconexion.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$serial=$_POST['serials'];
			$marc=$_POST['marc'];
			$model=$_POST['model'];
			$estado=$_POST['estado'];

			$sql = "UPDATE keyboard SET serials = '$serials', marc = '$marc', model = '$model', estado = '$estado' WHERE id = '$id'";
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

	header('location: consulta_key.php');

?>