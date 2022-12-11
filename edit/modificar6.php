<?php

ModificarCliente($_POST['nombre'], $_POST['apellido'], $_POST['domicilio'], $_POST['DNI'], $_POST['fecha_nacimiento'], $_POST['fecha_ingreso'], $_POST['socio']);

function ModificarCliente($nombre, $apellido, $domicilio, $dni, $fecha_nacimiento, $fecha_ingreso, $num_socio)
{
    include '../database/conexion.php';
    $Edad = strtotime($fecha_ingreso) - strtotime($fecha_nacimiento);
    $diferencia_anios = intval($Edad / 60 / 60 / 24 / 365.25);
    $sentencia = "UPDATE `clientes` SET `nombre` = '$nombre', `apellido` = '$apellido', `edad` = '$edad', `id_genero` = '$id_genero', `domicilio` = '$domicilio', `num_domicilio` = '$num_domicilio, `telefono` = '$telefono', `DNI` = '$dni', `fecha_nacimiento` = '$fecha_nacimiento', `fecha_ingreso` = '$fecha_ingreso' WHERE `clientes`.`id_cliente` = $id_cliente";
    $conexion->query($sentencia) or die("Error al actualizar datos" . mysqli_error($conexion));
    echo "<script>history.go(-2);</script>";
}

?>