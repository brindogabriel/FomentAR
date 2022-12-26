<?php
require_once('../database/conexion.php');

if (!isset($_GET['id'])) {
    echo "<script> alert('Undefined Schedule ID.'); location.replace('./') </script>";
    $conn->close();
    exit;
}

$delete = $conexion->query("DELETE FROM `schedule_list` where id = '{$_GET['id']}'");

if ($delete) {
    echo "<script> alert('Event has deleted successfully.'); location.replace('./') </script>";
} else {
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: " . $conexion->error . "<br>";
    echo "SQL: " . $sql . "<br>";
    echo "</pre>";
}

$conexion->close();
?>