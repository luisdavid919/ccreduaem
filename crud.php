<?php

$server="mysql:dbname=sistema_inventario_bd;host=localhost";
$user="root";
$clave="";

try {

	$pdo = new PDO($server,$user,$clave,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
	
} catch (PDOException $e) {
	echo "Ups! Algó Falló, Intentalo Más Tarde".$e->getMessage();
}


?>