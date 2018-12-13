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

mysqli_select_db($connection,"usuario");
if(isset($_REQUEST['iniciar']))
{

  $ID=$_REQUEST["ID"];
  $Nombre = $_REQUEST["Nombre"];
  $Apellidos = $_REQUEST["Apellidos"];
  $Edad = $_REQUEST["Edad"];
  $Carrera = $_REQUEST["Carrera"];
  $Matrícula = $_REQUEST["Matricula"];
  $Periodo = $_REQUEST["Periodo"];
  $Semestre = $_REQUEST["Semestre"];
  $Turno = $_REQUEST["Turno"];
  $Usuario = $_REQUEST["Usuario"];
  $Password = $_REQUEST["Password"];

$query="insert into usuario (ID,Nombre,Apellidos,Edad,Carrera,Matricula,Periodo,Semestre,Turno,Usuario,Password) values ('$ID','$Nombre','$Apellidos','$Edad','$Carrera','$Matricula','$Periodo','$Semestre','$Turno','$Usuario','$Password')";
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
