<?php

$pass = md5($_POST['password']);

ModificarUsuario($_POST['nombre'], $pass, $_POST['tipo'], $_POST['Usuario']);

function ModificarUsuario($nombre, $password, $tipo, $Usuario)
{
	include '../database/conexion.php';
	$sentencia = "UPDATE `usuario` SET `Nombre` = '$nombre', `clave` = '$password', `idRoles` = '$tipo'  WHERE Nombre='" . $Usuario . "' ";
	$conexion->query($sentencia) or die("Error al actualizar datos " . mysqli_error($conexion));
	echo "<script>history.go(-2);</script>";
}