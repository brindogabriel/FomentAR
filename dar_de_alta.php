<?php
DarDeAlta($_GET['DNI']);

function DarDeAlta($DNI)
{
	include 'conexion.php';

	$sentencia1="UPDATE `clientes` SET `idEstado` = '1' WHERE `clientes`.`DNI` = $DNI";

	$conexion->query($sentencia1) or die ("ERROR AL DAR DE ALTA".mysqli_error($conexion));

	echo "<script>history.go(-1);</script>"; 
}
?>