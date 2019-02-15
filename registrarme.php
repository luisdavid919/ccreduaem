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

<div class="container">
  <div class="row justify-content-center">
    <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-8 d-block d-sm-block d-md-block">
        <h2>Registrarme</h2>
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
            <br>
      </form>
        <p class="form-text text-center"><strong>Si Usted No Está Registrado, Por Favor Regístrese de Acuerdo a su servicio</p></strong>
        <p class="text-center"><strong><a href="registrarme.php">¡Registrarme!</a></strong></p>
    </div>
  </div>
</div>
                                  <!--*****************Finaliza Formulario*****************-->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>
