<?php
session_start();
include_once('dbconexion.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO estudiante (name, lastname, age, profession, enroll, period, sem, turn) VALUES (:name, :lastname, :age, :profession, :enroll, :period, :sem, :turn)");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array(':name' => $_POST['name'] , ':lastname' => $_POST['lastname'] , ':age' => $_POST['age'], ':profession' => $_POST['profession'], ':enroll' => $_POST['enroll'], ':period' => $_POST['period'], ':sem' => $_POST['sem'], ':turn' => $_POST['turn'])) ) ? '¡Datos Agregados Correctamente!' : 'Algo salió mal. No se puede agregar datos';	
	
	}
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();
}

else{
	$_SESSION['message'] = 'Llene el formulario';
}

header('location: consulta_users.php');
	
?>