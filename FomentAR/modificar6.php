<?php




ModificarCliente($_POST['Nombre'],$_POST['apellido'],$_POST['domicilio'],$_POST['DNI'],$_POST['fecha_nacimiento'],$_POST['fecha_ingreso'],$_POST['socio']);

function ModificarCliente($nombre,$apellido,$domicilio,$dni,$fecha_nacimiento,$fecha_ingreso,$socio)
{
	include 'conexion.php';
	$Edad = strtotime ($fecha_ingreso) - strtotime ($fecha_nacimiento);
	$diferencia_anios = intval($Edad/60/60/24/365.25);
	$sentencia="UPDATE `clientes` SET `Nombre` = '$nombre', `Apellido` = '$apellido', `Domicilio` = '$domicilio', `DNI` = '$dni', `Fecha_nacimiento` = '$fecha_nacimiento', `Fecha_ingreso` = '$fecha_ingreso', `idParametro_Socio` = '$socio'  WHERE DNI = $dni";
	$conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
	echo "<script>history.go(-2);</script>"; 
}
?>