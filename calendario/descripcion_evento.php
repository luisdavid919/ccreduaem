<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
    }

    include '../calendario/config.php'; 

    include '../calendario/funciones.php';

    $id  = evaluar($_GET['id']);

    $bd  = $conexion->query("SELECT * FROM eventos WHERE id=$id");


    $row = $bd->fetch_assoc();


    $titulo=$row['title'];

    $evento=$row['body'];

    $inicio=$row['inicio_normal'];

    $final=$row['final_normal'];

if (isset($_POST['eliminar_evento'])) 
{
    $id  = evaluar($_GET['id']);
    $sql = "DELETE FROM eventos WHERE id = $id";
    if ($conexion->query($sql)) 
    {
        echo       
             '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/ccreduaem/calendario/calendario.php">
            <script language="javascript">
                alert("Evento Eliminado");
            </script>';
    }
    else
    {
        echo '<script language="javascript">alert("Algo Falló, Intentelo Más Tarde.");</script>';
    }
}
 ?>

<!DOCTYPE html>
<html lang="en">
<center>

<head>
	<meta charset="UTF-8">
	<title>Centro De Cómputo Redes FCAeI - Eventos</title>
   <link rel="shortcut icon" type="image/x-icon" href="../images/fcaei.ico">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<style>
    body {
  background-color: #b6d7a8;
  }
 h2{
    font-size: 300%;
    color: #085394;
    font-family:italic;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    }

    h3 {
  font-size: 220%;
  color: #2b78e4;
  font-family:italic;
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
  }
</style>

<body>
        <!--*****************LOGOS PRINCIPALES*****************-->
<div class="container-fluid">
<div class="row justify-content-between">
<div class="col col-md-2 align-self-start d-none d-xs-none d-sm-none d-md-none d-lg-block d-xl-block">
<img class="img img-fluid" src="../images\fcaei_logo.png"/>
</div>
<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-8 align-self-center d-none d-xs-none d-sm-none d-md-block d-lg-block d-xl-block text-center">
<h2>Fechas Programadas</h2>
</div>
<div class="col col-md-2 d-none d-xs-none d-sm-none d-md-none d-lg-block d-xl-block mt-3">
<img class="img img-fluid" src="../images\uaem_logo.png"/>
</div>
</div>
</div>
    <h2>Evento:</h2>
	 <h3><font color="3B3B3B"><?=$titulo?></font></h3>
     <br>
      <h3>Descripción del Evento:</h3>
     <p><font size="6" face="arial"><?=$evento?></font></p>
	 <hr>
     <h3>Fecha Programada:</h3>
     <b>Fecha Inicial:</b><font size="5" color="blue" face="arial"> <?=$inicio?></font>
     <br>
     <br>
     <h3>Finaliza:</h3>
     <b>Fecha Final:</b><font size="5" color="red" face="arial"> <?=$final?></font>
</body>
<br>
<br>
<form action="" method="post">
    <button type="submit" class="btn btn-danger" name="eliminar_evento">Eliminar</button>

</form>
<br>
<form action="http://localhost/ccreduaem/calendario/calendario.php" method="post">
    <button type="submit" class="btn btn-success" >Volver</button>
    
</form>
<br>
</center>
</html>
