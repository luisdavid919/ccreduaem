<?php
	session_start();
	include_once('dbconexion.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$clave=$_POST['clave'];
			$ip=$_POST['ip'];
			$mac=$_POST['mac'];
			$model=$_POST['model'];
			$marc=$_POST['marc'];
			$so=$_POST['so'];
			$express=$_POST['express'];
			$tag=$_POST['tag'];
			$estado=$_POST['estado'];
			$descrip=$_POST['descrip'];

			$sql = "UPDATE pc SET clave = '$clave', ip = '$ip', mac = '$mac', model = '$model', marc = '$marc', so = '$so', express = '$express', tag = '$tag', estado = '$estado', descrip = '$descrip' WHERE id = '$id'";
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

	header('location: consulta_pc.php');

?>