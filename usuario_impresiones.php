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
  <link rel="shortcut icon" type="image/x-icon" href="images/fcaei.ico">
</head>

<body>
  <!--*****************LOGOS PRINCIPALES*****************-->
<div class="container-fluid">
<div class="row justify-content-between">
<div class="col col-md-2 align-self-start d-none d-xs-none d-sm-none d-md-none d-lg-block d-xl-block">
<img class="img img-fluid" src="images\fcaei_logo.png"/>
</div>
<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-8 align-self-center d-none d-xs-none d-sm-none d-md-block d-lg-block d-xl-block text-center">
<h1>Centro De Cómputo De Redes FCAeI</h1>
</div>
<div class="col col-md-2 d-none d-xs-none d-sm-none d-md-none d-lg-block d-xl-block mt-3">
<img class="img img-fluid" src="images\uaem_logo.png"/>
</div>
</div>
</div>

  <!--*****************INICIO PRINCIPAL IMPRESIONES*****************-->

  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-8 align-self-center d-block d-sm-block d-md-block text-center">
        <h3>Impresiones</h3>
      </div>
    </div>
  </div>

<!--*****************FORMULARIO*****************-->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-8 d-block d-sm-block d-md-block">
        <form action="">
          <div class="form-group row mt-2">
            <div class="col col-6">
              <label for="equipo">Equipo:</label>
              <input type="text" class="form-control" name="equipo" id="equipo">
            </div>
            <div class="col col-6">
              <label for="ipequipo">IP Equipo</label>
              <input type="text" class="form-control" name="ipequipo" id="ipequipo">
            </div>
            <div class="col col-6 mt-2">
              <label for="archivo">Nombre del Archivo:</label>
              <input type="text" class="form-control" name="archivo" id="archivo">
            </div>
            <div class="col col-6 mt-2">
              <label for="formato">Formato:</label>
              <input type="text" class="form-control" name="formato" id="formato">
            </div>
            <div class="col col-6 mt-2">
              <label for="hojas">Número De Hojas:</label>
              <input type="text" class="form-control" name="hojas" id="hojas">
            </div>
            <div class="col col-6 mt-2">
              <label for="hora">Hora de Impresión:</label>
              <input type="text" class="form-control" name="hora" id="hora">
            </div>
        </form>
      </div>
      </div>
      </div>
    </div>
  </div>

  <!--*****************BOTONES*****************-->
<div class="container">
  <div class="row justify-content-center mt-2">
    <div class="col col-xs-1 col-sm-3 col-md-2 m-2">
      <a class="btn btn-info btn-lg" href="" role="button">Guardar</a>
    </div>
    <div class="col col-xs-1 col-sm-3 col-md-2 m-2">
      <a class="btn btn-success btn-lg" href="" role="button">Imprimir</a>
    </div>
    <div class="col col-sm-3 col-md-2 m-2">
      <a class="btn btn-danger btn-lg" href="" role="button">Cancelar</a>
    </div>
  </div>
</div>


<!--*****************Regresar*****************-->
<div class="container-fluid">
  <div class="row justify-content-start mt-3">
    <div class="col align-self-center">
      <a href="http://localhost/ccreduaem/usuario.php" data-toggle="tooltip" data-placement="right" title="Regresar"><i class="icon-back"></i></a>
    </div>
  </div>
</div>

<!--*****************Finaliza Formulario*****************-->
      <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
