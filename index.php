<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: admin.php");
    exit;
}

// Include config file
require_once "conexion.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["usuario"]))){
        $username_err = "Porfavor ingresa el usuario.";
    } else{
        $username = trim($_POST["usuario"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingresa el password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, usuario, password FROM login WHERE usuario = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["usuario"] = $username;

                            // Redirect user to welcome page
                            header("location: admin.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "El password es inválido";
                        }
                    }
                } else{
                    // Mensaje en Caso de que no exista el usuario
                    $username_err = "¡Usted No Está Registrado!";
                }
            } else{
                echo "Oops! Algo falló";
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

<div class="container">
  <div class="row justify-content-center">
    <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-8 d-block d-sm-block d-md-block mt-5">
        <h2>Iniciar Sesión</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="form-group row justify-content-center <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-center mt-2">
              <label><strong>Usuario:</strong></label>
              <input type="text" name="usuario" class="form-control text-center" placeholder="Usuario" required value="<?php echo $username; ?>">
              <span class="help-block"><?php echo $username_err; ?></span>
            </div>
          </div>
            <div class="form-group row justify-content-center <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-center mt-2">
                <label><strong>Contraseña:</strong></label>
                <input type="password" name="password" class="form-control text-center" placeholder="Contraseña" required>
                <span class="help-block"><?php echo $password_err; ?></span>
              </div>
            </div>
              <div class="form-group row justify-content-center">
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-center">
                <input type="submit" class="btn btn-success" value="Iniciar Sesión">
              </div>
            </div>
      </form>
      <p class="form-text text-center"><strong>Si Usted No Está Registrado, Por Favor Regístrese de Acuerdo a su servicio</strong></p>
      <p class="form-text text-center"></p>
    </div>
  </div>
</div>
                                  <!--*****************Finaliza Formulario*****************-->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>
