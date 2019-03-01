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
        <h3>Datos Administradores</h3>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="content">

      <!--*****************BUSCADOR*****************-->
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="form-group">
                <form class="form-inline" id="search" role="search" name="buscador" method="post" action="search.php"> 
                 <input id="search" name="buscar" type="search" placeholder="Buscar aquí..." autofocus >
                <button type="submit" class="btn btn-secondary ml-3" id="search" name="search">&nbsp;<i class="fas fa-search"></i>&nbsp;</i></button>
                <a href="http://localhost/ccreduaem/consulta_usuarios.php" class="btn btn-success ml-3 mr-3">Usuarios</a>
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#agregar">Agregar</button>
              </form>
            </div>
          </div>
        </div>
      </div>

             <!--*****************MODAL "AGREGAR"*****************-->
<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Administrador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <div class="form-group">
          <label for="name">Nombre:</label>
          <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="lastname">Apellidos:</label>
          <input type="text" name="lastname" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="age">Edad:</label>
          <input type="text" name="age" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="profession">Profesión:</label>
          <input type="text" name="profession" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="period">Periodo:</label>
          <input type="text" name="period" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="turn">Turno:</label>
          <input type="text" name="turn" class="form-control" required>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">&nbsp;</label>
          <div class="modal-footer">
            <input type="submit" name="add" class="btn btn-sm btn-success" value="Guardar datos">
            <a href="consulta_admin.php" class="btn btn-sm btn-warning">Cancelar</a>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

<!--*****************MODAL "EDITAR"*****************-->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <div class="form-group">
          <label for="name">Nombre:</label>
          <input type="text" name="name" value="<?php echo $row ['name']; ?>" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="lastname">Apellidos:</label>
          <input type="text" name="lastname" value="<?php echo $row ['lastname']; ?>" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="age">Edad:</label>
          <input type="text" name="age" value="<?php echo $row ['age']; ?>" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="profession">Profesión:</label>
          <input type="text" name="profession" value="<?php echo $row ['profession']; ?>" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="period">Periodo:</label>
          <input type="text" name="period" value="<?php echo $row ['period']; ?>" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="turn">Turno:</label>
          <input type="text" name="turn" value="<?php echo $row ['turn']; ?>" class="form-control" required>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">&nbsp;</label>
          <div class="modal-footer">
            <input type="submit" name="save" class="btn btn-sm btn-success" value="Guardar datos">
            <a href="consulta_admin.php" class="btn btn-sm btn-warning">Cancelar</a>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>


    <!--*****************BORRAR DATOS*****************-->
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
            echo '<div class="alert bg-warning alert-dismissable text-center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Datos Eliminados Correctamente</strong></div>';
          }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
          }
        }
      }
      ?>

        <!--*****************INSERTAR DATOS*****************-->
      <?php
      if(isset($_POST['add'])){
        $name        = mysqli_real_escape_string($con,(strip_tags($_POST["name"],ENT_QUOTES)));//Escanpando caracteres 
        $lastname  = mysqli_real_escape_string($con,(strip_tags($_POST["lastname"],ENT_QUOTES)));//Escanpando caracteres 
        $age   = mysqli_real_escape_string($con,(strip_tags($_POST["age"],ENT_QUOTES)));//Escanpando caracteres 
        $profession      = mysqli_real_escape_string($con,(strip_tags($_POST["profession"],ENT_QUOTES)));//Escanpando caracteres 
        $period    = mysqli_real_escape_string($con,(strip_tags($_POST["period"],ENT_QUOTES)));//Escanpando caracteres 
        $turn    = mysqli_real_escape_string($con,(strip_tags($_POST["turn"],ENT_QUOTES)));//Escanpando caracteres 
        
      
 
        $cek = mysqli_query($con, "SELECT * FROM consult WHERE id='$name'");
        if(mysqli_num_rows($cek) == 0){
            $insert = mysqli_query($con, "INSERT INTO consult(name, lastname, age, profession, period, turn)
                              VALUES('$name','$lastname', '$age', '$profession', '$period', '$turn')") or die(mysqli_error());
            if($insert){
            echo '<div class="alert bg-warning alert-dismissable text-center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Datos Almacenados Correctamente</strong></div>';
            
            }else{
              echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
            }
           
        }else{
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. código existente!</div>';
        }
      }
      ?>
       

                                  <!--*****************TABLA*****************-->
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
 
                <a href="edit.php?nik='.$row['id'].'" title="Editar" name="editar" class="btn btn-warning"><span aria-hidden="true"><i class="fas fa-edit"></i></span></a>

                <a href="consulta_admin.php?aksi=delete&nik='.$row['id'].'" title="Eliminar" onclick="return confirm(\'¿Desea borrar los datos '.$row['name'].'?\')"  class="btn btn-danger btn-sm"><span aria-hidden="true"><i class="fas fa-trash-alt"></i></span></a>
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

  <!--*****************Regresar*****************-->
<div class="container fixed-bottom">
  <div class="row justify-content-start mt-5">
    <div class="col align-self-center">
      <a href="http://localhost/ccreduaem/admin.php" data-toggle="tooltip" data-placement="right" title="Regresar"><i class="fas fa-chevron-left"></i></a>
    </div>
  </div>
</div>
<!--*****************Finaliza Formulario*****************-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>