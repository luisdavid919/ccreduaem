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

  <!--*****************INICIO PRINCIPAL BITÁCORA*****************-->

  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-8 align-self-center d-block d-sm-block d-md-block text-center">
        <h3>Bitácora</h3>
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
              <label for="fecha">Fecha:</label>
              <input type="text" class="form-control" name="fecha" id="fecha">
            </div>
            <div class="col col-6">
              <label for="entrada">Hora De Entrada:</label>
              <input type="text" class="form-control" name="entrada" id="entrada">
            </div>
            <div class="col col-6 mt-2">
              <label for="actividad">Actividades:</label>
              <input type="text" class="form-control" name="actividad" id="activida">
            </div>
            <div class="col col-6 mt-2">
              <label for="horas">Hora De Salida:</label>
              <input type="text" class="form-control" name="hora" id="horas">
            </div>
            <div class="col col-6 mt-2">
              <label for="total">Número De Horas:</label>
              <input type="text" class="form-control" name="total" id="total">
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
      <a class="btn btn-info btn-lg" href="" role="button">Agregar</a>
    </div>
    <div class="col col-xs-1 col-sm-3 col-md-2 m-2">
      <a class="btn btn-success btn-lg" href="" role="button">Dar Alta</a>
    </div>
    <div class="col col-sm-3 col-md-2 m-2">
      <a class="btn btn-danger btn-lg" href="" role="button">Dar Baja</a>
    </div>
  </div>
  <div class="row justify-content-center mt-2">
    <div class="col col-xs-1 col-sm-3 col-md-2 m-2">
      <a class="btn btn-secondary btn-lg" href="" role="button">Modificar</a>
    </div>
    <div class="col col-xs-1 col-sm-3 col-md-2 m-2">
      <a class="btn btn-warning btn-lg" href="" role="button">Eliminar</a>
    </div>
    <div class="col col-xs-1 col-sm-3 col-md-2 m-2">
      <a class="btn btn-danger btn-lg" href="" role="button">Borrar Todo</a>
    </div>
  </div>
  <div class="row justify-content-center mt-3 mb-3">
    <div class="col col-sm-12 col-md-2">
      <a class="btn btn-primary btn-lg" href="" role="button">Imprimir</a>
    </div>
  </div>
</div>


<!--*****************Regresar*****************-->
<div class="container-fluid">
  <div class="row justify-content-start">
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
