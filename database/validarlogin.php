<?php
session_start();

$usuario = $_POST['nombre'];
$pass = $_POST['pass'];

include "./conexion.php";

$pass = md5($pass);

$consulta = "SELECT * FROM usuarios WHERE username='$usuario' AND password='$pass'";

$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_fetch_array($resultado);

if ($filas > 0) {
    $_SESSION['usuario'] = $usuario;
    $_SESSION['id_rol'] = $filas['id_rol'];

    $usuariologueado = $_SESSION['usuario'];
    $rollogueado = $_SESSION['id_rol'];

    header("location: ../pagina_principal");
} else {
    header("location: ../errors/error_login");
}

mysqli_free_result($resultado);
mysqli_close($conexion);