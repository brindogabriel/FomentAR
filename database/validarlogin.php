<?php
session_start();

$usuario = $_POST['nombre'];
$pass = $_POST['pass'];

include "./conexion.php";

$pass = md5($pass);

$consulta = "SELECT * FROM usuario WHERE Nombre='$usuario' AND Clave='$pass'";

$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_fetch_array($resultado);

if ($filas > 0) {
	$_SESSION['usuario'] = $usuario;
	$_SESSION['IdRoles'] = $filas['IdRoles'];

	$usuariologueado = $_SESSION['usuario'];
	$rollogueado = $_SESSION['IdRoles'];

	header("location: ../pagina_principal");
} else {
	header("location: ../errors/error_login");
}

mysqli_free_result($resultado);
mysqli_close($conexion);