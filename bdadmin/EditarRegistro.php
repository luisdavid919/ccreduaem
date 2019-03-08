<?php
	session_start();
	include_once('dbconect.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$name=$_POST['name'];
			$lastname=$_POST['lastname'];
			$age=$_POST['age'];
			$profession=$_POST['profession'];
			$period=$_POST['period'];
			$turn=$_POST['turn'];

			$sql = "UPDATE consult SET name = '$name', lastname = '$lastname', age = '$age', profession = '$profession', period = '$period', turn = '$turn' WHERE id = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? '¡Datos Actualizados Correctamente!' : 'No se puso actualizar empleado';

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

	header('location: consulta_admin.php');

?>