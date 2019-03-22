<?php
session_start();
include_once('dbconexion.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO report (equipo, claser, ip, mac, marc, model, describ) VALUES (:equipo, :claser, :ip, :mac, :marc, :model, :describ)");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array(':equipo' => $_POST['equipo'] , ':claser' => $_POST['claser'] , ':ip' => $_POST['ip'], ':mac' => $_POST['mac'], ':marc' => $_POST['marc'], ':model' => $_POST['model'], ':describ' => $_POST['describ'])) ) ? '¡Reporte Enviado Correctamente!' : 'Algo salió mal. No se puede enviar reporte';	
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

header('location: consulta_reporte.php');
	
?>