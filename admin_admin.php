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

  <!--*****************INICIO PRINCIPAL ADMINISTRADOR*****************-->

  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-8 align-self-center d-block d-sm-block d-md-block text-center">
        <h3>Registro de Administrador</h3>
      </div>
    </div>
  </div>

<!--*****************FORMULARIO*****************-->


<div class="container">
    <div class="row">
    <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
        <form action="">
          <div class="form-group row">
            <div class="col col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
              <label for="Nombre">Nombre:</label>
              <input type="text" class="form-control" name="Nombre" id="Nombre">
            </div>
            <div class="col col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
              <label for="Apellidos">Apellidos:</label>
              <input type="text" class="form-control" name="Apellidos" id="Apellidos">
            </div>
            <div class="col col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
              <label for="Edad">Edad:</label>
              <input type="text" class="form-control" name="edad" id="Edad">
            </div>
            <div class="col col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
              <label for="Profesion">Profesión:</label>
              <input type="text" class="form-control" name="Profesion" id="Profesion">
            </div>
            <div class="col col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
              <label for="Periodo">Periodo:</label>
              <input type="text" class="form-control" name="Periodo" id="Periodo">
            </div>
            <div class="col col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
              <label for="Turno">Turno:</label>
              <input type="text" class="form-control" name="Turno" id="Turno">
            </div>
            <div class="col col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
              <label for="Usuario">Usuario:</label>
              <input type="text" class="form-control" name="Usuario" id="Usuario">
            </div>
            <div class="col col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
              <label for="Password">Contraseña:</label>
              <input type="text" class="form-control" name="Password" id="Password">
            </div>
            <div class="col col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
              <label for="Permisos">Permisos Asignados:</label>
              <input type="text" class="form-control" name="Permisos" id="Permisos">
            </div>
            </div>
          </form>
        </div>
        <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
          <div class="form-group row justify-content-center">
          <div class="col col-xs-12 col-sm-4 col-md-4 col-lg-10 col-xl-8 m-2">
            <a class="btn btn-info btn-lg w-100" href="" role="button">Agregar</a>
          </div>
          <div class="col col-xs-12 col-sm-4 col-md-4 col-lg-10 col-xl-8 m-2">
            <a class="btn btn-success btn-lg w-100" href="" role="button">Dar Alta</a>
          </div>
          <div class="col col-xs-12 col-sm-4 col-md-4 col-lg-10 col-xl-8 m-2">
            <a class="btn btn-danger btn-lg w-100" href="" role="button">Dar Baja</a>
          </div>
          <div class="col col-xs-12 col-sm-4 col-md-4 col-lg-10 col-xl-8 m-2">
            <a class="btn btn-secondary btn-lg w-100" href="" role="button">Modificar</a>
          </div>
          <div class="col col-xs-12 col-sm-4 col-md-4 col-lg-10 col-xl-8 m-2">
            <a class="btn btn-warning btn-lg w-100" href="" role="button">Eliminar</a>
          </div>
          <div class="col col-xs-12 col-sm-4 col-md-4 col-lg-10 col-xl-8 m-2">
            <a class="btn btn-danger btn-lg w-100" href="" role="button">Borrar Todo</a>
            </div>
          </div>
        </div>
    </div>
  </div>

  <!--*****************BOTONES*****************-->
<!--<div class="container">
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
      <a class="btn btn-primary btn-lg" href="http://localhost/ccreduaem/admin_usuarios.php" role="button">Ir a Usuarios</a>
    </div>
  </div>
</div>-->

<!--*****************Regresar*****************-->
<div class="container">
  <div class="row justify-content-start mb-3">
    <div class="col col-4 col-sm-4 col-md-2 col-lg-2">
      <a href="http://localhost/ccreduaem/admin.php" data-toggle="tooltip" data-placement="right" title="Regresar"><i class="icon-back"></i></a>
    </div>
  </div>
</div>

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>
</body>
</html>
