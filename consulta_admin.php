<?php
include("conexion.php");
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
<title>Centro De Cómputo De Redes FCAeI</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/estilos.css">
<link rel="stylesheet" href="css/fontello.css">
<link rel="shortcut icon" type="image/x-icon" href="images/fcaei.ico">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
        <h3>Administradores</h3>
      </div>
    </div>
  </div>

    <div class="container">
                <div class="row">
                    <div class="col">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add"><i class="fas fa-plus-square">  Agregar Datos</i></button>
                    </div> 
                    <!--CREAR ALERTA CON PHP-->
            <?php if(isset($_SESSION['response'])){ ?>
                <div class="alert text-center alert-<?= $_SESSION['res_type']; ?> alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?= $_SESSION['response']; ?>
                </div>
            <?php } unset($_SESSION['response']); ?>                
                </div>
            </div>

                                <!--*****************TABLA*****************-->
    <div class="container">
        <div class="row">
          <div class="col mt-3">
        <div class="table-responsive">
        <table class="table table-striped table-success table-hover text-center">
            <thead class="thead-dark">

                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Edad</th>
                    <th>Profesión</th>
                    <th>Periodo</th>
                    <th>Turno</th>
                    <th>Action</th>
                </tr>

            </thead>
            <?php foreach ($conn->query('SELECT * FROM consult') as $row){ ?> 
                    <tr>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['lastname'] ?></td>
                        <td><?php echo $row['age'] ?></td>
                        <td><?php echo $row['profession'] ?></td>
                        <td><?php echo $row['period'] ?></td>
                        <td><?php echo $row['turn'] ?></td>
                        <td>
                            <a href='#edit' id="edit" class='edit' data-toggle='modal'><i class='far fa-edit m-2 btn btn-warning' style='color:black;' data-toggle='tooltip' title='Editar Datos'></i></a>
                            <a href='#delete' id="delete" class='delete' data-toggle='modal'><i class='fas fa-trash-alt m-2 btn bg-danger' style='color:black;' data-toggle='tooltip' title='Eliminar Datos'></i></a>
                        </td>
                    </tr>
            <?php
                    }
                ?>
            </table>
    </div>
</div>
</div>
</div>
                                    <!--*****************FORMULARIOS + MODALES*****************-->
    <!-- Add Modal HTML -->
    <div id="add" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="action.php" method="POST">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Agregar Datos</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Apellidos:</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" required>
                        </div>
                        <div class="form-group">
                            <label for="age">Edad:</label>
                            <input type="text" class="form-control" name="age" id="age" required>
                        </div>
                        <div class="form-group">
                            <label for="profession">Profesión:</label>
                            <input type="text" class="form-control" name="profession" id="profession" required>
                        </div>
                        <div class="form-group">
                            <label for="period">Periodo:</label>
                            <input type="text" class="form-control" name="period" id="period" required>
                        </div>
                        <div class="form-group">
                            <label for="turn">Turno</label>
                            <input type="text" class="form-control" name="turn" id="turn" required>
                        </div>                  
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-info" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-success" name="adding" value="Agregar">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal HTML -->
    <div id="edit" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="action.php" method="POST">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Editar Datos</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Apellidos:</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Edad:</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Profesión:</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Periodo:</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Turno</label>
                            <input type="text" class="form-control" required>
                        </div>                  
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-info" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-success" value="Actualizar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Delete Modal HTML -->
    <div id="delete" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="delete" action="delete.php">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Eliminar Datos</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <p>¿Estás Seguro de Eliminar Esos Datos?</p>
                        <p class="text-danger"><small>Se Borrarán Los Datos De Manera Permanente</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-info" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-danger" value="Eliminar">
                    </div>
                </form>
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

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>