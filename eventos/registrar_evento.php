<?php
include '../database/conexion.php';

$nombre = $_POST["nombre"];
$fecha_inicio = $_POST["fecha_inicio"];
$fecha_fin = $_POST["fecha_fin"];
$importe = $_POST["importe"];
$estado = 1;

$sql = "INSERT INTO `eventos` (`nombre`, `fecha_inicio`, `fecha_fin`,`importe`, `estado`) VALUES ('$nombre', '$fecha_inicio', '$fecha_fin', '$importe', '$estado')";

$conexion->query($sql) or die("Error al registrar evento" . mysqli_error($conexion));
echo "<script>history.go(-1);</script>";