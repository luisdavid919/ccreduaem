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

mysqli_select_db($connection,"administrador");
if(isset($_REQUEST['iniciar']))
{

  $ID=$_REQUEST["ID"];
  $Nombre = $_REQUEST["Nombre"];
  $Apellidos = $_REQUEST["Apellidos"];
  $Edad = $_REQUEST["Edad"];
  $Profesion = $_REQUEST["Profesion"];
  $Periodo = $_REQUEST["Periodo"];
  $Turno = $_REQUEST["Turno"];
  $usuario = $_REQUEST["Usuario"];
  $Password = $_REQUEST["Password"];
  $Permisos = $_REQUEST["Permisos"];

$query="insert into administrador (ID,Nombre,Apellidos,Edad,Profesion,Periodo,Turno,Permisos,Usuario,Contraseña) values ('$ID','$Nombre','$Apellidos','$Edad','$Profesion','$Periodo','$Turno','$Usuario','$Password','$Permisos')";
$dato=mysqli_query($connection,$query);
if(!$dato)
	echo "No se insertaron los datos";
else
mysqli_close($connection);
echo '<script type="text/javascript">
alert("Información enviada correctamente");
window.location.href="admin_admin.php";
</script>';
}
  ?>
