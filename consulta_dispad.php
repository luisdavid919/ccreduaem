
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

  <!--*****************INICIO*****************-->

  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-8 align-self-center d-block d-sm-block d-md-block text-center">
        <h3>Consulta de Dispositivos</h3>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row m-5">
      <!--*****************CONSULTA*****************-->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <div class="form-group row">
                <table class="table table-striped table-success table-hover text-center">
                  <thead class="thead-dark">
                    <th>IP</th>
                    <th>MAC</th>
                    <th>Serial</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Estado</th>
                  </thead>
                  <tr>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                  </tr>
                  <tr>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                  </tr>
                  <tr>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                  </tr>
                  <tr>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                  </tr>
                  <tr>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                  </tr>
                  <tr>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                  </tr>
                  <tr>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                    <td>Prueba Consulta</td>
                  </tr>
                </table>
              </div>
            </div>
<!--*****************BOTONES*****************-->
        <div class="col-xs-4 col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <div class="form-group row justify-content-center">
                <div class="col col-xs-2 col-sm-4 col-md-4 col-lg-2 col-xl-2 m-2">
                  <a class="btn btn-info btn-lg w-100" href="http://localhost/ccreduaem/admin_dispositivos.php" role="button">Agregar</a>
                </div>
              </div>
            </div>


<!--*****************Regresar*****************-->
<div class="container-fluid">
  <div class="row justify-content-start">
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
