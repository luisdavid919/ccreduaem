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

  <!--*****************INICIO PRINCIPAL USUARIOS*****************-->

  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-8 align-self-center d-block d-sm-block d-md-block text-center">
        <h3>Registro de Usuarios</h3>
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
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="name" id="nombre">
              </div>
              <div class="col col-6">
                <label for="apellidos">Apellidos:</label>
                <input type="text" class="form-control" name="apellidos" id="apellidos">
              </div>
              <div class="col col-6 mt-2">
                <label for="edad">Edad:</label>
                <input type="text" class="form-control" name="edad" id="edad">
              </div>
              <div class="col col-6 mt-2">
                <label for="carrera">Carrera:</label>
                <input type="text" class="form-control" name="carrera" id="carrera">
              </div>
              <div class="col col-6 mt-2">
                <label for="matricula">Matrícula:</label>
                <input type="text" class="form-control" name="matricula" id="matricula">
              </div>
              <div class="col col-6 mt-2">
                <label for="periodo">Periodo:</label>
                <input type="text" class="form-control" name="periodo" id="periodo">
              </div>
              <div class="col col-6 mt-2">
                <label for="semestre">Semestre:</label>
                <input type="text" class="form-control" name="semestre" id="semestre">
              </div>
              <div class="col col-6 mt-2">
                <label for="turno">Turno:</label>
                <input type="text" class="form-control" name="profesion" id="profesion">
              </div>
              <div class="col col-6 mt-2">
                <label for="username">Usuario:</label>
                <input type="text" class="form-control" name="username" id="username">
              </div>
              <div class="col col-6 mt-2">
                <label for="password">Contraseña:</label>
                <input type="text" class="form-control" name="password" id="password">
              </div>
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
  </div>

  <!--*****************Regresar*****************-->
  <div class="container-fluid">
    <div class="row justify-content-start ml-3 mb-3">
      <div class="col col-4 col-sm-4 col-md-2 col-lg-2">
        <a href="http://localhost/ccreduaem/admin_admin.php" data-toggle="tooltip" data-placement="right" title="Regresar"><i class="icon-back"></i></a>
      </div>
    </div>
  </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
  </html>
