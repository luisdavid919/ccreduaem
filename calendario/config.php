<?php
$servidor='localhost';
$usuario='root';
$pass='';
$bd='sistema_inventario_bd';


$conexion = new mysqli($servidor, $usuario, $pass, $bd);	


$conexion->set_charset('utf8');


if ($conexion->connect_errno) {
	echo "Error al conectar la base de datos {$conexion->connect_errno}";
}


$base_url="http://localhost/ccreduaem/calendario/";

?>
