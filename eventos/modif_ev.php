<?php
include '../database/conexion.php';

$nombre = $_POST["nombre"];
$fecha_inicio = $_POST["fecha_inicio"];
$fecha_fin = $_POST["fecha_fin"];
$importe = $_POST["importe"];

$idevento = $_POST["idevento"];

$sql = "UPDATE `eventos` SET `nombre` = '$nombre', `fecha_inicio` = '$fecha_inicio', `fecha_fin` = '$fecha_fin', `importe` = '$importe' WHERE `eventos`.`idevento` = '$idevento'";

$conexion->query($sql) or die("Error al actualizar evento" . mysqli_error($conexion));

echo "<script>history.go(-2);</script>";