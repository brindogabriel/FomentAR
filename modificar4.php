<?php

ModificarProducto($_POST['id'], $_POST['nombre'],$_POST['password'],$_POST['tipo']);

function ModificarProducto($id, $usuario, $password,$tipo)
{
	include 'conexion.php';
	echo $sentencia="UPDATE usuarios SET id='".$id."', usuario='".$usuario."', password='".$password."', tipo='".$tipo."' WHERE id='".$id."' ";
	$conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
	header("location: ./gestion_usuarios");
}
?>