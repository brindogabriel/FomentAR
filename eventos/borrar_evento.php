<?php
EliminarEvento($_GET['idevento']);

function EliminarEvento($idevento)
{
    include '../database/conexion.php';
    $sentencia = "DELETE FROM eventos WHERE idevento='" . $idevento . "' ";
    $conexion->query($sentencia) or die("Error al eliminar" . mysqli_error($conexion));
    echo "<script>history.go(-1);</script>";
}