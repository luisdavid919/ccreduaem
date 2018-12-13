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

mysqli_select_db($connection,"equipos");
if(isset($_REQUEST['iniciar']))
{

  $ID=$_REQUEST["ID"];
  $Clave_UAEM=$_REQUEST["Clave UAEM"];
  $IP = $_REQUEST["IP"];
  $IP_Server = $_REQUEST["IP Server"];
  $Express_Service_Code = $_REQUEST["Express Service Code"];
  $MAC = $_REQUEST["MAC"];
  $Mac_Server = $_REQUEST["Mac Server"];
  $Estado = $_REQUEST["Estado"];
  $Modelo = $_REQUEST["Modelo"];
  $Marca = $_REQUEST["Marca"];
  $Sistema_Operativo = $_REQUEST["Sistema Operativo"];
  $Service_Tag = $_REQUEST["Service Tag"];

$query="insert into equipos (ID,,Clave UAEM,IP,IP Server,Express Service Code,MAC,Mac Server,Estado,Modelo,Marca,Sistema Operativo,Service Tag) values ('$ID','$IP','$IP_Server','$Express_Service_Code','$MAC','$Mac_Server','$Estado','$Modelo','$Marca','$Sistema_Operativo','$Service_Tag')";
$dato=mysqli_query($connection,$query);
if(!$dato)
	echo "No se insertaron los datos";
else
mysqli_close($connection);
echo '<script type="text/javascript">
alert("Información enviada correctamente");
window.location.href="equipos.php";
</script>';
}
  ?>
