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
  <link rel="stylesheet" href="css/fontello.css">
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

  <!--*****************INICIO*****************-->

  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-8 align-self-center d-block d-sm-block d-md-block text-center">
        <h3>Control de Equipos</h3>
      </div>
    </div>
  </div>

  <!--*****************BOTONES*****************-->
<div class="container">
  <div class="row mt-5">
    <div class="col col-xs-8 flex-last">
      <a class="btn btn-primary btn-sm" href="http://localhost/ccreduaem/usuario_equipos.html" role="button">Equipos</a>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col col-xs-8">
      <a class="btn btn-primary btn-sm" href="http://localhost/ccreduaem/usuario_monitor.html" role="button">Monitor</a>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col col-xs-8">
      <a class="btn btn-primary btn-sm" href="http://localhost/ccreduaem/usuario_teclado.html" role="button">Teclado</a>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col col-xs-8">
      <a class="btn btn-primary btn-sm" href="http://localhost/ccreduaem/usuario_mouse.html" role="button">Mouse</a>
    </div>
  </div>
    </div>
  </div>
</div>

 <!--*****************Regresar*****************-->
 <div class="container-fluid">
   <div class="row justify-content-start fixed-bottom ml-3 mb-3">
     <div class="col col-4 col-sm-4 col-md-2 col-lg-2">
       <a class="btn btn-danger btn-sm" href="http://localhost/ccreduaem/usuario.html" role="button">Regresar</a>
       <img class= "imglogo imglogo2 img-fluid" src="images\back.png"/>
     </div>
   </div>
 </div>

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>
</body>

</html>
