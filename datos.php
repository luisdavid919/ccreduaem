<?php

require_once("conexion.php");
// Initialize the session
session_start();
if(!isset($_SESSION['usuario']) || empty($_SESSION['usuario'])){
  header("location: index.php");
    exit;
  }

// 1. Create a database connection
$connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
$connection->set_charset("utf8");
if (!$connection) {
    die("Error en la conexión " . mysqli_error());
}

mysqli_select_db($connection,"login");
if(isset($_REQUEST['Registrarme']))
{

  $control = $_REQUEST["control"];
  $email = $_REQUEST['correo'];
  $username = $_REQUEST['usuario'];
  $password = $_REQUEST['password'];

$query="insert into login (control,correo,usuario,password) values ('$control','$email', '$username','$password')";
$dato=mysqli_query($connection,$query);
if(!$dato)
	echo "No se registró, Por favor Intente de nuevo más tarde";
else
mysqli_close($connection);
echo '<script type="text/javascript">
alert("Gracias Por Registrarse, Por Favor Inicie Sesión");
window.location.href="index.php";
</script>';
}
  ?>
