<?php
DarDeBaja($_GET['DNI']);

function DarDeBaja($DNI)
{
	include './database/conexion.php';

	$sentencia1="UPDATE `clientes` SET `idEstado` = '2' WHERE `clientes`.`DNI` = $DNI";

	$conexion->query($sentencia1) or die ("ERROR AL DAR DE BAJA".mysqli_error($conexion));

	echo "<script>history.go(-1);</script>"; 
}
?>