<?php
session_start();

$usuario = $_POST['nombre'];
$pass = $_POST['pass'];

$_SESSION['usuario'] = $usuario;

include "./conexion.php";

$pass = md5($pass);
$consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND pass='$pass'";

$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_num_rows($resultado);

if ($filas > 0) {
	header("location: ../pagina_principal");
} else {
	header("location: ../errors/error_login");
}

mysqli_free_result($resultado);
mysqli_close($conexion);