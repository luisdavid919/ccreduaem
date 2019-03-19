<?php
session_start();
include_once('dbconexion.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO mouse (serials, marc, model, estado) VALUES (:serials, :marc, :model, :estado)");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array(':serials' => $_POST['serials'] , ':marc' => $_POST['marc'] , ':model' => $_POST['model'], ':estado' => $_POST['estado'])) ) ? '¡Datos Agregados Correctamente!' : 'Algo salió mal. No se puede agregar datos';	
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

header('location: consulta_mouse.php');
	
?>