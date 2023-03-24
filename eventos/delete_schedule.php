<?php
require_once('../database/conexion.php');

if (!isset($_GET['id'])) {
    echo "<script> alert('Undefined Schedule ID.'); location.replace('./') </script>";
    $conexion->close();
    exit;
}

$delete = $conexion->query("DELETE FROM `eventos` where id = '{$_GET['id']}'");

if ($delete) {
    echo "<script> alert('Evento eliminado correctamente!.'); location.replace('./') </script>";
} else {
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: " . $conexion->error . "<br>";
    echo "SQL: " . $sql . "<br>";
    echo "</pre>";
}

$conexion->close();
?>