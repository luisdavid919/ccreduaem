<?php
// Include config file
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
        $sql = "SELECT id FROM users WHERE username = ?";

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

    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Ingresa Password";
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password debe contener al menos 6 caracteres";
    } else{
        $password = trim($_POST['password']);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Reingresa el password';
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'El Password no coincide';
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

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
</head>



<body>
                    <!--*****************LOGOS PRINCIPALES*****************-->
<div class="container-fluid">
  <div class="row justify-content-between">
    <div class="col col-md-2 align-self-start d-none d-xs-none d-sm-none d-md-none d-lg-block d-xl-block">
      <img class="img img-fluid" src="images\fcaei_logo.png"/>
    </div>
    <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-8 align-self-center d-block d-sm-block d-md-block text-center">
      <h1>Centro De Cómputo De Redes FCAeI</h1>
    </div>
    <div class="col col-md-2 d-none d-xs-none d-sm-none d-md-none d-lg-block d-xl-block mt-3">
      <img class="img img-fluid" id"logo" src="images\uaem_logo.png"/>
    </div>
  </div>
</div>

              <!--*****************Inicio Sesión + Formulario*****************-->

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-8 d-block d-sm-block d-md-block">
        <h2>Registrarme</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="form-group row justify-content-center">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-xl-8 m-2">
          <label><strong>Control/Matrícula:</strong></label>
          <input type="text" name="usuario" class="form-control text-center" required>
          <label><strong>Correo:</strong></label>
          <input type="email" name="correo" class="form-control text-center" placeholder="Correo" required>
          <label><strong>Usuario:</strong></label>
          <input type="text" name="" class="form-control text-center" placeholder="Usuario" required>
          <label><strong>Contraseña:</strong></label>
          <input type="password" name="password" id="password" class="form-control text-center" placeholder="Contraseña" required>
          <label><strong>Confirmar Contraseña:</strong></label>
          <input type="password" name="confirmar" id="confirmar" class="form-control text-center" placeholder="Confirmar Contraseña" required>
            <span id="mensaje"></span>
        </div>
      </div>
      <div class="form-group row justify-content-center">
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-12 col-xl-12 text-center">
      <input type="submit" class="btn btn-success" value="Iniciar Sesión">
      </div>
    </div>
      </form>
        <p class="form-text text-center"><strong>Si Usted Está Registrado, Por Favor Inicie Sesión</p></strong>
        <p class="text-center"><a href="index.php">Iniciar Sesión</a></p>
    </div>
  </div>
</div>
                                  <!--*****************Finaliza Formulario*****************-->
                                  <script>
                                  var check = function() {
                                    if (document.getElementById('password').value ==
                                      document.getElementById('confirmar').value) {
                                      document.getElementById('mensaje').style.color = 'green';
                                      document.getElementById('mensaje').innerHTML = 'Coincide';
                                    } else {
                                      document.getElementById('mensaje').style.color = 'red';
                                      document.getElementById('mensaje').innerHTML = 'No coincide';
                                    }
                                  }
                                  </script>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>
