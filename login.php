<?php session_start();
   if (isset($_SESSION['usuario'])){
     header('location:index.php');
   }
   $error = '';
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
     $username = $_POST['usuario'];
     $password = $_POST['password'];
     $password = hash('sha512', $password);

     try{
       $conexion = new PDO('mysql:host=localhost;dbname=sistema_inventario_bd', 'root', '');
     } catch(PDOException $prueba_error){
       echo "Error: " . $prueba_error->getMessage();
     }

     $statement = $conexion-> prepare('
     SELECT * FROM login WHERE usuario = :usuario AND password = :password'
        );

        $statement->execute(array(
          ':usuario' => $username,
          ':password' => $password
        ));

        $resultado = $statement->fetch();

        if($resultado !==false){
          $_SESSION['usuario'] = $username;
          header('location:admin.php');
        } else {
          $error .= '¡No Estás Registrado! <br> Consulta con el administrador de tu servicio';
        }
   }
?>
