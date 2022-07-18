<?php

$name = $_POST["nombre"];
$pass = md5($_POST["password"]);
$type = $_POST["tipo"];

include "../database/conexion.php";

$sql = "INSERT INTO `usuarios` (`Usuario`, `Password`, `idRole`) VALUES ('$name', '$pass', '$type')";

$conexion->query($sql) or die("Error al actualizar datos " . mysqli_error($conexion));
echo "<script>history.go(-1);</script>";