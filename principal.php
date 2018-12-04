<?php
// Include config file
require_once 'config.php';

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Por Favor, Ingresa Tu Usuario';
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Por Favor, Ingresa Tu Contraseña';
    } else{
        $password = trim($_POST['password']);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT Usuario, Password FROM administrador WHERE Usuario = ?";

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
                            session_start();
                            $_SESSION['username'] = $username;
                            header("location: admin.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'El password que ingresaste no es válido';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No existe la cuenta asociada con ese usuario';
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
      <h1>Centro De Cómputo Redes FCAeI</h1>
  </div>
  <div class="col-12 sm-8" style="margin-top:110px;"><h2>Iniciar Sesión</h2></div>
</div>
</div>
<!---FORMULARIO USUARIO----------->
<div class="container-fluid" id="formulario">
  <div class="row">
    <div class="col-12">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label><strong>Usuario:</strong></label>
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                <span class="help-block alerta"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label><strong>Contraseña:</strong></label>
                <input type="password" name="password" class="form-control">
                <span class="help-block alerta"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Iniciar">
            </div>
       </div>
      </div>
    </div>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>
</body>

</html>
