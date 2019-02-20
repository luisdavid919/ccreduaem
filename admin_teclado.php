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

  <!--*****************INICIO PRINCIPAL TECLADOS*****************-->

  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-8 align-self-center d-block d-sm-block d-md-block text-center">
        <h3>Teclados</h3>
      </div>
    </div>
  </div>

  <!--*****************FORMULARIO*****************-->
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
        <form action="">
          <div class="form-group">
            <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <label for="serial">Serial:</label>
              <input type="text" class="form-control" name="serial" id="serial">
              </div>
              <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <label for="marca">Marca:</label>
                <input type="text" class="form-control" name="marca" id="marca">
              </div>
              <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" name="modelo" id="modelo">
              </div>
              <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <label for="estado">Estado:</label>
                <input type="text" class="form-control" name="estado" id="estado">
              </div>
          </div>
        </form>
      </div>
        <!--*****************BOTONES*****************-->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 align-self-center">
              <div class="form-group row justify-content-center">
                <div class="col col-xs-2 col-sm-4 col-md-4 col-lg-4 col-xl-4 m-2">
                  <a class="btn btn-success btn-lg w-100" href="" role="button">Dar Alta</a>
                </div>
                <div class="col col-xs-2 col-sm-4 col-md-4 col-lg-4 col-xl-4 m-2">
                  <a class="btn btn-danger btn-lg w-100" href="" role="button">Dar Baja</a>
                </div>
                <div class="col col-xs-2 col-sm-4 col-md-4 col-lg-4 col-xl-4 m-2">
                  <a class="btn btn-secondary btn-lg w-100" href="" role="button">Modificar</a>
                </div>
                <div class="col col-xs-2 col-sm-4 col-md-4 col-lg-4 col-xl-4 m-2">
                  <a class="btn btn-warning btn-lg w-100" href="" role="button">Eliminar</a>
                </div>
                <div class="col col-xs-2 col-sm-4 col-md-4 col-lg-4 col-xl-4 m-2">
                  <a class="btn btn-danger btn-lg w-100" href="" role="button">Borrar Todo</a>
                </div>
              </div>
            </div>

            <!--*****************BOTONES INFERIORES*****************-->
            <div class="col-xs-4 col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <div class="form-group row justify-content-center">
                <div class="col col-xs-8 col-sm-4 col-md-2 col-lg-2 col-xl-2 m-2">
                  <a class="btn btn-primary btn-lg w-100" href="http://localhost/ccreduaem/admin_equipos.php" role="button">CPU</a>
                </div>
                <div class="col col-xs-2 col-sm-4 col-md-2 col-lg-2 col-xl-2 m-2">
                  <a class="btn btn-primary btn-lg w-100" href="http://localhost/ccreduaem/admin_monitor.php" role="button">Monitores</a>
                </div>
                <div class="col col-xs-2 col-sm-4 col-md-2 col-lg-2 col-xl-2 m-2">
                  <a class="btn btn-primary btn-lg w-100" href="http://localhost/ccreduaem/admin_teclado.php" role="button">Teclados</a>
                </div>
                <div class="col col-xs-2 col-sm-4 col-md-2 col-lg-2 col-xl-2 m-2">
                  <a class="btn btn-primary btn-lg w-100" href="http://localhost/ccreduaem/admin_mouse.php"  role="button">Mouse's</a>
                </div>
              </div>
            </div>
  <!--*****************Regresar*****************-->
  <div class="container-fluid">
    <div class="row justify-content-start mt-3">
      <div class="col align-self-center">
        <a href="http://localhost/ccreduaem/consulta_cpuad.php" data-toggle="tooltip" data-placement="right" title="Regresar"><i class="icon-back"></i></a>
      </div>
    </div>
  </div>

<!--*****************Finaliza Formulario*****************-->

      <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
