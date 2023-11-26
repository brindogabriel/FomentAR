<?php
EliminarCliente($_GET['username']);

function EliminarCliente($username)
{
    include '../database/conexion.php';
    $sentencia = "DELETE FROM usuarios WHERE username='" . $username . "' ";
    $conexion->query($sentencia) or die("Error al eliminar" . mysqli_error($conexion));
    echo "<script>history.go(-1);</script>";

}