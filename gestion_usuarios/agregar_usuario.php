<?php

$nombre = $_POST["nombre"];
$pass = md5($_POST["password"]);
$tipo = $_POST["tipo"];

include "../database/conexion.php";

$sql = "INSERT INTO `usuarios` (`username`, `password`, `id_rol`) VALUES ('$nombre', '$pass', '$tipo')";

$conexion->query($sql) or die("Error al actualizar datos " . mysqli_error($conexion));
echo "<script>history.go(-1);</script>";