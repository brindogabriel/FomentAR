<?php

require_once('../database/conexion.php');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "<script> alert('Error: No data to save.'); location.replace('./') </script>";
    $conexion->close();
    exit;
}

extract($_POST);
$allday = isset($allday);

if ($color == "#dc3545") {
    $priority = "alta";
} else {
    $priority = "normal";
}

if (empty($id)) {
    $sql = "INSERT INTO `eventos` (`title`,`description`,`start_datetime`,`end_datetime`,`priority`, `color`) VALUES ('$title','$description','$start_datetime','$end_datetime','$priority', '$color' )";
} else {
    $sql = "UPDATE `eventos` set `title` = '{$title}', `description` = '{$description}', `start_datetime` = '{$start_datetime}', `end_datetime` = '{$end_datetime}', `priority` = '{$priority}', `color` = '{$color}' WHERE `id` = '{$id}'";
}

$save = $conexion->query($sql);

if ($save) {
    echo "<script> alert('Evento guardado exitosamente!'); location.replace('./') </script>";
} else {
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: " . $conexion->error . "<br>";
    echo "SQL: " . $sql . "<br>";
    echo "</pre>";
}

$conexion->close();
?>