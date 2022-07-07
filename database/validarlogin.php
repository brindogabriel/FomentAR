<?php
session_start();

$usuario = $_POST['nombre'];
$password = $_POST['password'];

$_SESSION['usuario'] = $usuario;

include "./conexion.php";

$pass = md5($password);
$consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$pass'";

$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_num_rows($resultado);

if ($filas > 0) {
	header("location: ../pagina_principal");
} else {
	header("location: ../errors/error_login");
}

mysqli_free_result($resultado);
mysqli_close($conexion);