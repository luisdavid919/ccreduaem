<?php
	session_start();
	include_once('dbconexion.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$dias=$_POST['dias'];
			$entrada=$_POST['entrada'];
			$activ=$_POST['activ'];
			$salida=$_POST['salida'];

			$sql = "UPDATE bitadmin SET activ = '$activ', salida = '$salida' WHERE id = '$id'";
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

	header('location: consulta_bitadmin.php');

?>