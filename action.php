<?php
include('conexion.php');
if (isset($_POST['submit'])) {

$name=$_POST['name'];
$lastname=$_POST['lastname'];
$age=$_POST['age'];
$profession=$_POST['profession'];
$period=$_POST['period'];
$turn=$_POST['turn'];

$stmt = $conn->prepare("INSERT INTO consult (name,lastname,age,profession,period,turn) 
							VALUES (?, ?, ?, ?, ? ,?)");
$stmt->bind_param("ssssss", $name,$lastname,$age,$profession,$period,$turn);
$stmt->execute();
$stmt->close();
$conn->close();


				header("location:consulta_admin.php");
				$_SESSION['response']="Se Agregaron Los Datos Correctamente";
				$_SESSION['res_type']="success";
}
?>