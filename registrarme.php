<?php
// Include config file
require_once 'conexion.php';

// Define variables and initialize with empty values
$control = $control_err = "";
$email = $email_err = "";
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  // Validate control
    if(empty(trim($_POST['control']))){
        $control_err = "Por Favor Ingrese Su Matrícula";
    } elseif(strlen(trim($_POST['control'])) > 12  ){
        $control_err = "Su Matrícula Debe Ser Mínimo 12 Dígitos";
    } else{
        $control = trim($_POST['control']);
    }

  // Validate email
    if(empty(trim($_POST['correo']))){
        $email_err = "Por Favor Ingrese Su Correo";
    } elseif(filter_var($email_err, FILTER_VALIDATE_EMAIL)){
        $email_err = "Por Favor Ingrese Su Correo Válido";
    } else{
        $email = trim($_POST['correo']);
    }
    // Validate email
    if(empty(trim($_POST["correo"]))){
        $email_err = "Por Favor Ingrese Su Correo";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID FROM login WHERE correo = ?";

        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email= trim($_POST["correo"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "Este correo ya existe, por favor inserte otro nuevo correo";
                } else{
                    $email = trim($_POST["correo"]);
                      }
                  } else{
                echo "Oops! Algo falló. Por favor intenta de nuevo";
                  }
        }

                // Close statement
                mysqli_stmt_close($stmt);
            }

    // Validate username
    if(empty(trim($_POST["usuario"]))){
        $username_err = "Por favor ingresa un nombre de usuario";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID FROM login WHERE usuario = ?";

        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["usuario"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Este nombre de usuario ya existe";
                } else{
                    $username = trim($_POST["usuario"]);
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
    } elseif(strlen(trim($_POST['password'])) < 8){
        $password_err = "Password debe contener al máximo 8 caracteres";
    } else{
        $password = trim($_POST['password']);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirmar"]))){
        $confirm_password_err = 'Reingresa el password';
    } else{
        $confirm_password = trim($_POST['confirmar']);
        if($password != $confirm_password){
            $confirm_password_err = 'El Password no coincide con el anterior';
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO login (control, correo, usuario, password) VALUES (?,?,?,?)";

        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_control, $param_email, $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_control= $control;
            $param_email= $email;
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
    mysqli_close($con);
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

          <div class="form-group <?php echo (!empty($control_err)) ? 'has-error' : ''; ?>">
              <label><strong>Control/Matrícula:<strong></label>
              <input type="text" name="control"class="form-control text-center" value="<?php echo $control; ?>">
              <span class="help-block alerta"><?php echo $control_err; ?></span>
          </div>

          <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
              <label><strong>Correo:<strong></label>
              <input type="email" name="correo"class="form-control text-center" placeholder="Hotmail, Gmail..." value="<?php echo $email; ?>">
              <span class="help-block alerta"><?php echo $email_err; ?></span>
          </div>

          <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
              <label><strong>Nombre de Usuario:<strong></label>
              <input type="text" name="usuario"class="form-control text-center" placeholder="Usuario" value="<?php echo $username; ?>">
              <span class="help-block alerta"><?php echo $username_err; ?></span>
          </div>

          <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
              <label>Password:</label>
              <input type="password" name="password" id="password" class="form-control text-center" placeholder="Contraseña" value="<?php echo $password; ?>">
              <span class="help-block alerta"><?php echo $password_err; ?></span>
          </div>

          <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
              <label>Confirma tu Password:</label>
              <input type="password" name="confirmar" id= "confirmar" class="form-control text-center" placeholder="Confirmar Contraseña" value="<?php echo $confirm_password; ?>">
              <span class="help-block alerta"><?php echo $confirm_password_err; ?></span>
              <span id="mensaje"></span>
          </div>
        </div>
      </div>
      <div class="form-group row justify-content-center">
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-12 col-xl-12 text-center">
      <input type="submit" class="btn btn-success" value="Registrarme">
      </div>
    </div>
      </form>
        <p class="form-text text-center"><strong>Si Usted Está Registrado, Por Favor Inicie Sesión</p></strong>
        <p class="text-center"><a href="index.php">Iniciar Sesión</a></p>
    </div>
  </div>
</div>
<!--*****************Finaliza Formulario*****************-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
