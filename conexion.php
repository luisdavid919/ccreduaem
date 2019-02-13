<?php
try{
  $conexion = new PDO('mysql:host=localhost;dbname=sistema_inventario_bd', 'root', '');
} catch(PDOException $prueba_error){
  echo "Error: " . $prueba_error->getMessage();
}
?>
