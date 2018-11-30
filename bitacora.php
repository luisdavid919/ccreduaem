<?php

require_once("config.php");
// Initialize the session
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: admin.php");
    exit;
  }

// 1. Create a database connection
$connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
$connection->set_charset("utf8");
if (!$connection) {
    die("Error en la conexión" . mysqli_error());
}

mysqli_select_db($connection,"bitacora");
if(isset($_REQUEST['iniciar']))
{

  $ID=$_REQUEST["ID"];
  $Fecha = $_REQUEST["Fecha"];
  $Entrada = $_REQUEST["Entrada"];
  $Actividad = $_REQUEST["Actividad"];
  $Salida = $_REQUEST["Salida"];
  $Horas = $_REQUEST["Horas"];

$query="insert into bitacora (ID,Fecha,Entrada,Actividad,Salida,Horas) values ('$ID','$Fecha', '$Entrada','$Actividad','$Salida','$Horas')";
$dato=mysqli_query($connection,$query);
if(!$dato)
	echo "No se insertaron los datos";
else
mysqli_close($connection);
echo '<script type="text/javascript">
alert("Información enviada correctamente");
window.location.href="admin_usuario.php";
</script>';
}
  ?>
