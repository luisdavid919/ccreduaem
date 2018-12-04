<?php
// Initialize the session
session_start();
//If session variable is not set it will redirect to login page
if(!isset($_SESSION['Usuario']) || empty($_SESSION['Usuario'])){
header("location: principal.php");
exit; }
?>


<!doctype html>

<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Centro De Cómputo Redes FCAeI</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <div class="container-fluid">
<!---LOGOS PRINCIPALES----------->
    <div class="row">
  <div class="col-4">
    <img class='imglogo img-fluid' src="images\fcaei_logo.png"/>
      </div>
      <div class="col-4">
      <img class= 'imglogos img-fluid' src="images\uaem_logo.png"/>
      </div>
  <!--Título Principal y Cuerpo de la Página Por Toni R -->
  <div class="col-12">
      <h1 class="display-12">Centro De Cómputo Redes FCAeI</h1>
  </div>
  <!---INICIO PRINCIPAL PARA EL ADMINISTRADOR----------->
</div>
    </div>
    <div class='fijo'>
    <div class="col-4">
    <img class= 'imglogo1 img-fluid' src="images\monitor.png"/>
    </div>
    <div class='boton' >
      <a class="btn btn-primary1" href="http://localhost/ccreduaem/admin_equipos.html" role="button">Equipos</a>
      </div>
    <div class="col-4">
    <img class= 'imglogo2 img-fluid' src="images\printer.png"/>
    </div>
    <div class='boton' >
      <a class="btn btn-primary2" href="http://localhost/ccreduaem/admin_dispositivos.html" role="button">Dispositivos</a>
      </div>
    <div class="col-4">
    <img class= 'imglogo3 img-fluid' src="images\user.png"/>
    </div>
    <div class='boton' >
      <a class="btn btn-primary3" href="http://localhost/ccreduaem/admin_admin.html" role="button">Usuarios</a>
      </div>
    <div class="col-4">
    <img class= 'imglogo4 img-fluid' src="images\bitacora.png"/>
    </div>
    <div class='boton' >
      <a class="btn btn-primary4" href="http://localhost/ccreduaem/admin_bitacora.html" role="button">Bitácora</a>
      </div>
      <div class="col-4">
      <img class= 'imglogo5 img-fluid' src="images\out.png"/>
      </div>
    <div class='boton' >
      <button type="submit" class="btn btn-primary5" >Cerrar Sesión</button>
      </div>
    </div>

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>
</body>

</html>
