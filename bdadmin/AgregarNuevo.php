<?php
session_start();
include_once('dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO consult (name, lastname, age, profession, period, turn) VALUES (:name, :lastname, :age, :profession, :period, :turn)");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array(':name' => $_POST['name'] , ':lastname' => $_POST['lastname'] , ':age' => $_POST['age'], ':profession' => $_POST['profession'], ':period' => $_POST['period'], ':turn' => $_POST['turn'])) ) ? '¡Datos Agregados Correctamente!' : 'Algo salió mal. No se puede agregar datos';	
	
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

header('location: consulta_admin.php');
	
?>