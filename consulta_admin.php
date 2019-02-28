<?php
include("conexion.php");
$filter="";
session_start();
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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
        <h3>Consulta de Administradores</h3>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="content">
      <form class="form-inline m-3" role="search" id="buscar">
      <div class="form-group">
        <input type="text" name="s" class="form-control" placeholder="Buscar">
      </div>
      <button type="submit" class="btn btn-secondary ml-2 mr-2 ">&nbsp;<i class="fas fa-search"></i>&nbsp;</button>
  <a href="http://localhost/ccreduaem/add.php" class="btn btn-info">Agregar</a>
    </form>
 
      <?php
      if(isset($_GET['aksi']) == 'delete'){
        // escaping, additionally removing everything that could be (html/javascript-) code
        $nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
        $cek = mysqli_query($con, "SELECT * FROM consult WHERE id='$nik'");
        if(mysqli_num_rows($cek) == 0){
          //echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
        }else{
          $delete = mysqli_query($con, "DELETE FROM consult WHERE id='$nik'");
          if($delete){
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
          }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
          }
        }
      }
      ?>
 
      <div class="table-responsive">
      <table class="table table-striped table-success table-hover text-center">
        <thead class="thead-dark">
          <th>#</th>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Edad</th>
          <th>Profesión</th>
          <th>Periodo</th>
          <th>Turno</th>
          <th></th>
        </thead>
        <?php
        if($filter){
          $sql = mysqli_query($con, "SELECT * FROM consult WHERE id='$filter' ORDER BY id ASC");
        }else{
          $sql = mysqli_query($con, "SELECT * FROM consult ORDER BY id ASC");
        }
        if(mysqli_num_rows($sql) == 0){
          echo '<tr><td colspan="8">No hay datos.</td></tr>';
        }else{
          $no = 1;
          while($row = mysqli_fetch_assoc($sql)){
            echo '
            <tr>
              <td>'.$no.'</td>
              <td>'.$row['name'].'</td>
              <td>'.$row['lastname'].'</td>
              <td>'.$row['age'].'</td>
              <td>'.$row['profession'].'</td>
              <td>'.$row['period'].'</td>
              <td>'.$row['turn'].'</td>
              </td>
              <td>
 
                <a href="edit.php?nik='.$row['id'].'" title="Editar" class="btn btn-secondary"><span class="glyphicon glyphicon-edit" aria-hidden="true"><i class="fas fa-edit"></i></span></a>
                <a href="index.php?aksi=delete&nik='.$row['id'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['name'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"><i class="fas fa-trash-alt"></i></span></a>
              </td>
            </tr>
            ';
            $no++;
          }
        }
        ?>
      </table>
      </div>
    </div>
  </div>

  <!--*****************BOTONES*****************-->
        <div class="col-xs-4 col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <div class="form-group row justify-content-center">
                <div class="col col-xs-2 col-sm-4 col-md-4 col-lg-2 col-xl-2 m-2">
                  <a class="btn btn-info btn-lg w-100" href="http://localhost/ccreduaem/consulta_usuarios.php" role="button">Ir a Usuarios</a>
                </div>
                <div class="col col-xs-2 col-sm-4 col-md-4 col-lg-2 col-xl-2 m-2">
                  <a class="btn btn-info btn-lg w-100" href="http://localhost/ccreduaem/add.php" role="button">Agregar</a>
                </div>
              </div>
            </div>

  <!--*****************Regresar*****************-->
<div class="container">
  <div class="row justify-content-start mt-5">
    <div class="col align-self-center">
      <a href="http://localhost/ccreduaem/admin.php" data-toggle="tooltip" data-placement="right" title="Regresar"><i class="icon-back"></i></a>
    </div>
  </div>
</div>
<!--*****************Finaliza Formulario*****************-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>