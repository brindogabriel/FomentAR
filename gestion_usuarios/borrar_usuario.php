<?php
EliminarCliente($_GET['Nombre']);

function EliminarCliente($Nombre)
{
	include '../database/conexion.php';
	$sentencia="DELETE FROM usuario WHERE Nombre='".$Nombre."' ";
	$conexion->query($sentencia) or die ("Error al eliminar".mysqli_error($conexion));
	echo "<script>history.go(-1);</script>"; 

}