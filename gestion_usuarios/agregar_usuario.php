<?php

$nombre = $_POST["nombre"];
$pass = md5($_POST["password"]);
$tipo = $_POST["tipo"];

include "../database/conexion.php";

$sql = "INSERT INTO `usuario` (`Nombre`, `clave`, `idRoles`) VALUES ('$nombre', '$pass', '$tipo')";

$conexion->query($sql) or die("Error al actualizar datos " . mysqli_error($conexion));
echo "<script>history.go(-1);</script>";