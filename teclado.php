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

mysqli_select_db($connection,"teclado");
if(isset($_REQUEST['iniciar']))
{

  $ID=$_REQUEST["ID"];
  $Serial = $_REQUEST["Serial"];
  $Modelo = $_REQUEST["Modelo"];
  $Marca = $_REQUEST["Marca"];
  $Estado = $_REQUEST["Estado"];

$query="insert into teclado (ID,Serial,Modelo,Marca,Estado) values ('$ID','$Serial','$Modelo','$Marca','$Estado')";
$dato=mysqli_query($connection,$query);
if(!$dato)
	echo "No se insertaron los datos";
else
mysqli_close($connection);
echo '<script type="text/javascript">
alert("Información enviada correctamente");
window.location.href="teclado.php";
</script>';
}
  ?>
