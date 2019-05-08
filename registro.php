<?php  
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: admin.php");
    exit;
}

require_once 'conexion.php';

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Porfavor ingresa un nombre de usuario";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM login WHERE usuario = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Este nombre de usuario ya existe";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Algo falló. Por favor intenta de nuevo";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validando Contraseña
    if(empty(trim($_POST['password']))){
        $password_err = "Ingresa Password";
    } elseif(strlen(trim($_POST['password'])) < 8){
        $password_err = "Password debe contener al menos 6 caracteres";
    } else{
        $password = trim($_POST['password']);
    }

    // Confirmando Contraseña
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Reingresa el password';
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'La Contraseña No Coincide';
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO login (usuario, clave) VALUES (?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: index.php");
            } else{
                echo "Oops! Algo falló. Por favor intenta de nuevo";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
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
    <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-8 align-self-center d-xs-block d-sm-block d-md-none d-lg-none d-xl-none text-center">
      <h1><small>Centro De Cómputo De Redes FCAeI</small></h1>
    </div>
    <div class="col col-md-2 d-none d-xs-none d-sm-none d-md-none d-lg-block d-xl-block mt-3">
      <img class="img img-fluid" id="logo" src="images\uaem_logo.png"/>
    </div>
  </div>
</div>

              <!--*****************Inicio Sesión + Formulario*****************-->

<div class="container">
  <div class="row justify-content-center">
    <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-8 d-block d-sm-block d-md-block mt-5">
        <h2>Registrarme</h2>
        <?php 
  if(isset($_SESSION['message'])){
    ?>
    <div class="alert alert-info text-center alert-dismissible fade show mt-3" role="alert" id="mensaje">
      <strong><?php echo $_SESSION['message']; ?></strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>
    <?php

    unset($_SESSION['message']);
  }
?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="form-group row justify-content-center <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-6 text-center mt-2">
              <label><strong>Agregar Usuario:</strong></label>
              <input type="text" name="username" class="form-control text-center" required value="<?php echo $username; ?>">
              <span class="help-block"><?php echo $username_err; ?></span>
            </div>
          </div>
            <div class="form-group row justify-content-center <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
              <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-6 text-center mt-2">
                <label><strong>Agregar Contraseña:</strong></label>
                <input type="password" name="password" class="form-control text-center" required value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
              </div>
            </div>
            <div class="form-group row justify-content-center <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
              <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-6 text-center mt-2">
                <label><strong>Confirmar Contraseña:</strong></label>
                <input type="password" name="confirm_password" class="form-control" required value="<?php echo $confirm_password; ?>">
                      <span class="help-block alerta"><?php echo $confirm_password_err; ?></span>
              </div>
            </div>

              <div class="form-group row justify-content-center">
              <div class="col-xs-12 col-sm-8 col-md-8 col-lg-12 col-xl-12 text-center">
              <input type="submit" class="btn btn-success" value="Registrarme">
              </div>
            </div>
            <br>
      </form>
        <p class="form-text text-center"><strong>¿Tiene Cuenta?</p></strong>
        <p class="text-center"><strong><a href="index.php">Iniciar Sesión</a></strong></p>
    </div>
  </div>
</div>
                                  <!--*****************Finaliza Formulario*****************-->

                                  <footer class="page-footer font-small">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">
    <br><br>© 2019 Universidad Autónoma Del Estado De Morelos.
  </div>
  <!-- Copyright -->

</footer>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>