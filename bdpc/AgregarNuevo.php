<?php
session_start();
include_once('dbconexion.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO pc (clave, ip, mac, model, marc, so, express, tag, estado) VALUES (:clave, :ip, :mac, :model, :marc, :so, :express, :tag, :estado)");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array(':clave' => $_POST['clave'] , ':ip' => $_POST['ip'] , ':mac' => $_POST['mac'], ':model' => $_POST['model'], ':marc' => $_POST['marc'], ':so' => $_POST['so'], ':express' => $_POST['express'], ':tag' => $_POST['tag'], ':estado' => $_POST['estado'])) ) ? '¡Datos Agregados Correctamente!' : 'Algo salió mal. No se puede agregar datos';	
	
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

header('location: consulta_pc.php');
	
?>