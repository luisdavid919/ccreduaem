<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Centro De Cómputo Redes FCAeI</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <!--*****************LOGOS PRINCIPALES*****************-->
<div class="container-fluid">
<div class="row justify-content-between">
<div class="col col-md-2 align-self-start d-none d-xs-none d-sm-none d-md-none d-lg-block d-xl-block">
<img class="img img-fluid" src="images\fcaei_logo.png"/>
</div>
<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-8 align-self-center d-block d-sm-block d-md-block text-center">
<h1>Centro De Cómputo De Redes FCAeI</h1>
</div>
<div class="col col-md-2 d-none d-xs-none d-sm-none d-md-none d-lg-block d-xl-block mt-3">
<img class="img img-fluid" src="images\uaem_logo.png"/>
</div>
</div>
</div>

  <!--*****************INICIO PRINCIPAL ADMINISTRADOR*****************-->

  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-8 align-self-center d-block d-sm-block d-md-block text-center">
        <h3>ADMINISTRADOR</h3>
      </div>
    </div>
  </div>

  <!--*****************FUNCIÓN + BOTÓN*****************-->

  <!--*****************EQUIPOS*****************-->
  <div class="container">
    <div class="row justify-content-around mt-2">
      <div class="col col-4 col-sm-3 col-md-3 col-lg-2">
        <img class= "imglogo img-fluid" src="images\monitor.png"/>
        <div class="col col-8 col-sm-8 col-md-6 col-lg-2">
      <a class="btn btn-primary" href="http://localhost/ccreduaem/admin_equipos.html" role="button">Equipos</a>
      </div>
      </div>
<!--*****************DISPOSITIVOS*****************-->
      <div class="col col-4 col-sm-3 col-md-3 col-lg-2">
        <img class= "imglogo img-fluid" src="images\printer.png"/>
        <div class="col col-8 col-sm-8 col-md-6 col-lg-2">
      <a class="btn btn-primary" href="http://localhost/ccreduaem/admin_dispositivos.html" role="button">Dispositivos</a>
      </div>
      </div>
<!--*****************USUARIOS*****************-->
      <div class="col col-4 col-sm-3 col-md-3 col-lg-2">
        <img class= "imglogo img-fluid" src="images\user.png"/>
        <div class="col col-8 col-sm-8 col-md-6 col-lg-2">
        <a class="btn btn-primary" href="http://localhost/ccreduaem/admin_admin.html" role="button">Usuarios</a>
      </div>
      </div>
<!--*****************BITÁCORA*****************-->
      <div class="col col-4 col-sm-3 col-md-3 col-lg-2">
        <img class= "imglogo img-fluid" src="images\bitacora.png"/>
        <div class="col col-8 col-sm-8 col-md-6 col-lg-2">
        <a class="btn btn-primary" href="http://localhost/ccreduaem/admin_bitacora.html" role="button">Bitácora</a>
      </div>
      </div>
    </div>
  </div>

<!--*****************CERRAR SESIÓN*****************-->
<div class="container-fluid">
  <div class="row justify-content-end fixed-bottom mb-3">
    <div class="col col-4 col-sm-4 col-md-2 col-lg-2">
      <a class="btn btn-danger btn-sm" href="http://localhost/ccreduaem/cerrar.php" role="button">Cerrar Sesión</a>
      <img class= "imglogo1 img-fluid" src="images\out.png"/>
    </div>
  </div>
</div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
