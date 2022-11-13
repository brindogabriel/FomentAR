<?php
session_start();

$usuario = $_POST['username'];
$password = $_POST['password'];

include "./conexion.php";

$password = md5($password);

$consulta = "SELECT * FROM usuario WHERE Nombre='$usuarios' AND Clave='$password'";

$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_fetch_array($resultado);

if ($filas > 0) {
	$_SESSION['usuarios'] = $usuario;
	$_SESSION['roles'] = $filas['id_rol'];

	$usuariologueado = $_SESSION['usuarios'];
	$rollogueado = $_SESSION['id_rol'];

	header("location: ../pagina_principal");
} else {
	header("location: ../errors/error_login");
}

mysqli_free_result($resultado);
mysqli_close($conexion);