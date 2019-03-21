<?php
session_start();
include_once('dbconexion.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO bitadmin (dias, entrada, activ, salida) VALUES (:dias, :entrada, :activ, :salida)");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array(':dias' => $_POST['dias'] , ':entrada' => $_POST['entrada'], ':activ' => $_POST['activ'], ':salida' => $_POST['salida'])) ) ? '¡Datos Agregados Correctamente!' : 'Algo salió mal. No se puede agregar datos';	
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

header('location: consulta_bitadmin.php');
	
?>