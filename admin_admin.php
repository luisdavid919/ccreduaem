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
    <div class="col-xs-4 col-sm-12 col-md-4 col-lg-5 col-xl-5">
      <form action="">
        <div class="form-group">
          <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <label for="Nombre">Nombre:</label>
              <input type="text" class="form-control" name="Nombre" id="Nombre">
            </div>
            <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <label for="Apellidos">Apellidos:</label>
              <input type="text" class="form-control" name="Apellidos" id="Apellidos">
            </div>
            <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <label for="Edad">Edad:</label>
              <input type="text" class="form-control" name="edad" id="Edad">
            </div>
            <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <label for="Profesion">Profesión:</label>
              <input type="text" class="form-control" name="Profesion" id="Profesion">
            </div>
        </div>
      </form>
    </div>
    <div class="col-xs-4 col-sm-12 col-md-4 col-lg-5 col-xl-5">
      <form action="">
        <div class="form-group">
        <div class="col col-xs-8 col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <label for="Periodo">Periodo:</label>
              <input type="text" class="form-control" name="Periodo" id="Periodo">
            </div>
            <div class="col col-xs-8 col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <label for="Turno">Turno:</label>
              <input type="text" class="form-control" name="Turno" id="Turno">
            </div>
            <div class="col col-xs-8 col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <label for="Usuario">Usuario:</label>
              <input type="text" class="form-control" name="Usuario" id="Usuario">
            </div>
            <div class="col col-xs-8 col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <label for="Password">Contraseña:</label>
              <input type="text" class="form-control" name="Password" id="Password">
            </div>
          </div>
        </form>
      </div>
                        <!--*****************BOTONES*****************-->
    <div class="col-xs-4 col-sm-12 col-md-4 col-lg-2 col-xl-2">
      <div class="form-group row justify-content-center">
          <div class="col col-xs-8 col-sm-4 col-md-8 col-lg-12 col-xl-12 m-2">
            <a class="btn btn-info btn-lg w-100" href="" role="button">Agregar</a>
          </div>
          <div class="col col-xs-2 col-sm-4 col-md-8 col-lg-12 col-xl-12 m-2">
            <a class="btn btn-success btn-lg w-100" href="" role="button">Dar Alta</a>
          </div>
          <div class="col col-xs-2 col-sm-4 col-md-8 col-lg-12 col-xl-12 m-2">
            <a class="btn btn-danger btn-lg w-100" href="" role="button">Dar Baja</a>
          </div>
          <div class="col col-xs-2 col-sm-4 col-md-8 col-lg-12 col-xl-12 m-2">
            <a class="btn btn-secondary btn-lg w-100" href="" role="button">Modificar</a>
          </div>
          <div class="col col-xs-2 col-sm-4 col-md-8 col-lg-12 col-xl-12 m-2">
            <a class="btn btn-warning btn-lg w-100" href="" role="button">Eliminar</a>
          </div>
          <div class="col col-xs-2 col-sm-4 col-md-8 col-lg-12 col-xl-12 m-2">
            <a class="btn btn-danger btn-lg w-100" href="" role="button">Borrar Todo</a>
            </div>
      </div>
    </div>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-auto">
          <a class="btn btn-primary btn-lg" href="http://localhost/ccreduaem/admin_usuarios.php" role="button">Ir a Usuarios</a>
        </div>
      </div>
    </div>

<!--*****************Regresar*****************-->
<div class="container-fluid">
  <div class="row justify-content-start mt-3">
    <div class="col align-self-center">
      <a href="http://localhost/ccreduaem/admin.php" data-toggle="tooltip" data-placement="right" title="Regresar"><i class="icon-back"></i></a>
    </div>
  </div>
</div>

<!--*****************Finaliza Formulario*****************-->

      <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
