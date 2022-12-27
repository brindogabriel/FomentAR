<?php

include '../database/conexion.php';

$tipo = $_POST['tipo'];
$id_user = $_POST['id_user'];


$sentencia = "UPDATE `usuarios` SET `id_rol` = '$tipo'  WHERE id_user='" . $id_user . "' ";
$conexion->query($sentencia) or die("Error al actualizar datos " . mysqli_error($conexion));
echo "<script>history.go(-2);</script>";