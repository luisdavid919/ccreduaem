<?php
if (isset($_SESSION['usuario'])) {
  header('location:admin.php')
}

$errores = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
  $password = $_POST['password'];
  $password = hash('sha512', $password);

//CREANDO LA LÓGICA AL INICIO DE SESIÓN
  try {
    //Conectar a la base de datos para identificar al usuario registrado
    $conexion = new PDO('mysql:host=localhost;dbname:login', 'root', '');
  }
  catch (PDOException $e) {
    echo "Error:" . $e->getMessage();;
          }
//VERIFICANDO SI EL USUARIO ESTÁ REGISTRADO O DE LO CONTRARIO SE REGISTARÁ Y DARÁ ACCESO AL LOGEAR
    $statement $conexion->prepare('
    SELECT * FROM login WHERE usuario= .$usuario AND password= .$password'
  );
    $statement->execute(array(
      ':usuario'=> $usuario,
      ':password'=> $password
  ));

  $resultado = $statement->();
  if ($resultado !==false) {
    $_SESSION['usuario'] = $usuario;
    header('location: admin.php');
  } else {
        $errores .= 'Usted No Está Registrado, Consulte Con El Administrador De Su Servicio';
  }
}

require 'principal.php';

 ?>
