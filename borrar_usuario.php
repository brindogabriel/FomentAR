<?php
EliminarCliente($_GET['Usuario']);

function EliminarCliente($Usuario)
{
	include 'conexion.php';
	$sentencia="DELETE FROM usuarios WHERE usuario='".$Usuario."' ";
	$conexion->query($sentencia) or die ("Error al eliminar".mysqli_error($conexion));
	echo "<script>history.go(-1);</script>"; 

}
?>