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
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "<span style=\"color: #FF0000\"><strong>Por Favor, Ingrese su Usuario.</strong></span>";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = "<span style=\"color: #FF0000\"><strong>Por Favor, Ingrese su Contraseña.</strong></span>";
    } else{
        $password = trim($_POST['password']);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT usuario, clave FROM login WHERE usuario = ?";

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
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["usuario"] = $username;

                            // Redirect user to welcome page
                            header("location: admin.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "<span style=\"color: #FF0000\"><strong>La Contraseña que ingresaste no es válida.</strong></span>";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "<span style=\"color: #FF0000\"><strong>Esta Cuenta NO Existe.</strong></span>";
                }
            } else{
                echo "Oops! Algo salió mal, porfavor intenta de nuevo";
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
        <h2>Iniciar Sesión</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="form-group row justify-content-center <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-6 text-center mt-2">
              <label><strong>Usuario:</strong></label>
              <input type="text" name="username" class="form-control text-center" placeholder="Usuario" required value="<?php echo $username; ?>">
              <span class="help-block"><?php echo $username_err; ?></span>
            </div>
          </div>
            <div class="form-group row justify-content-center <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
              <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-6 text-center mt-2">
                <label><strong>Contraseña:</strong></label>
                <input type="password" name="password" class="form-control text-center" placeholder="Contraseña" required>
                <span class="help-block"><?php echo $password_err; ?></span>
              </div>
            </div>
              <div class="form-group row justify-content-center">
              <div class="col-xs-12 col-sm-8 col-md-8 col-lg-12 col-xl-12 text-center">
              <input type="submit" class="btn btn-success" value="Iniciar Sesión">
              </div>
            </div>
            <br>
      </form>
        <p class="form-text text-center"><strong>Si Usted No Está Registrado, Por Favor Regístrese de Acuerdo a su servicio</p></strong>
        <p class="text-center"><strong><a href="registro.php">¡Registrarme!</a></strong></p>
    </div>
  </div>
</div>
                                  <!--*****************Finaliza Formulario*****************-->

                                  <footer class="page-footer font-small mt-2">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">
    © 2019 Universidad Autónoma Del Estado De Morelos.
    <br>Desarrollador: Antonio de Jesús
    <br>Idea Original: Luis David
  </div>
  <!-- Copyright -->

</footer>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>